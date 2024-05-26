<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\ActiveQR;
use App\Models\Attendance;
use App\Models\Holiday;
use App\Models\Leave;
use App\Models\Worktime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

class EmployeeHrController extends Controller
{
    public function dashboard(){
        return view('employee.dashboard');
    }

    public function schedule()
    {
        $worktimes = Worktime::all();
        $holidays = Holiday::all();
        $leaves = Leave::where('employee_id', Auth::guard('employee')->id())->where('status', 'confirmed')->get();
        $absences = Absence::where('employee_id', Auth::guard('employee')->id())->where('reason', 'libur')->where('status', 'confirmed')->get();

        $events = [];

        // Convert holidays to events
        foreach ($holidays as $holiday) {
            $events[] = [
                'title' => $holiday->name,
                'start' => $holiday->start_date,
                'end' => $holiday->end_date,
                'description' => $holiday->desc,
                'color' => 'red'
            ];
        }

        // Convert leaves to events and exclude conflicting worktimes
        foreach ($leaves as $leave) {
            $leaveStart = $leave->start_date;
            $leaveEnd = $leave->end_date;

            $events[] = [
                'title' => 'Cuti',
                'start' => $leaveStart,
                'end' => $leaveEnd,
                'color' => 'yellow'
            ];

            // Remove overlapping worktimes
            $worktimes = $this->removeOverlappingWorktimes($worktimes, $leaveStart, $leaveEnd);
        }

        // Convert absences to events and exclude conflicting worktimes
        foreach ($absences as $absence) {
            if ($absence->reason !== 'libur') {
                continue;
            }

            $absenceStart = $absence->start_date;
            $absenceEnd = $absence->end_date;

            $events[] = [
                'title' => 'Libur',
                'start' => $absenceStart,
                'end' => $absenceEnd,
                'color' => 'orange'
            ];

            // Remove overlapping worktimes
            $worktimes = $this->removeOverlappingWorktimes($worktimes, $absenceStart, $absenceEnd);
        }

        // Add remaining worktimes to events
        foreach ($worktimes as $worktime) {
            $worktimeStart = $this->convertToDateTime($worktime->day, $worktime->start_time);
            $worktimeEnd = $this->convertToDateTime($worktime->day, $worktime->end_time);

            $events[] = [
                'title' => 'Work',
                'start' => $worktimeStart,
                'end' => $worktimeEnd,
                'color' => 'blue'
            ];

            // Adjust rest time events similarly
            if ($worktime->rest_start_time && $worktime->rest_end_time) {
                $restStart = $this->convertToDateTime($worktime->day, $worktime->rest_start_time);
                $restEnd = $this->convertToDateTime($worktime->day, $worktime->rest_end_time);

                if (!$this->isDateWithinAnyHoliday($restStart, $holidays)) {
                    $events[] = [
                        'title' => 'Rest',
                        'start' => $restStart,
                        'end' => $restEnd,
                        'color' => 'green'
                    ];
                }
            }
        }

        return view('employee.schedule.index', compact('events', 'worktimes', 'holidays', 'leaves', 'absences'));
    }

    private function removeOverlappingWorktimes($worktimes, $startDate, $endDate)
    {
        $filteredWorktimes = $worktimes->filter(function ($worktime) use ($startDate, $endDate) {
            $worktimeStart = $this->convertToDateTime($worktime->day, $worktime->start_time);
            $worktimeEnd = $this->convertToDateTime($worktime->day, $worktime->end_time);

            return !($startDate < $worktimeEnd && $endDate > $worktimeStart);
        });

        return $filteredWorktimes;
    }



    private function isTimeOverlapping($start, $end, $compareStart, $compareEnd)
    {
        return $start < $compareEnd && $end > $compareStart;
    }

    private function isDateWithinAnyHoliday($date, $holidays)
    {
        $date = Carbon::parse($date);
        foreach ($holidays as $holiday) {
            $holidayStart = Carbon::parse($holiday->start_date)->startOfDay();
            $holidayEnd = Carbon::parse($holiday->end_date)->endOfDay();

            // Check if the date is within any holiday
            if ($date->between($holidayStart, $holidayEnd)) {
                return true;
            }
        }
        return false;
    }

    private function convertToDateTime($day, $time)
    {
        $date = now()->startOfWeek()->addDays($day - 1);
        return $date->format('Y-m-d') . 'T' . $time;
    }


    public function attendance(){
        $attendances = Attendance::where('employee_id', Auth::guard('employee')->id())->orderBy('created_at', 'desc')->get();
        return view('employee.attendance.index', compact('attendances'));
    }

    public function showScan(){
        return view('employee.attendance.scan');
    }

    public function addConfirm(){
        return view('employee.attendance.form');
    }
    public function storeConfirm(Request $request){
        $request->validate([
            'type' => 'required',
        ]);

        $store = Attendance::create([
            'employee_id' => Auth::guard('employee')->id(),
            'method' => 'confirmation',
            'date' => now()->toDateString(), // Format date as datetime string
            'time' => now()->toTimeString(), // Format time as time string
            'type' => $request->type,
            'status' => 'pending',
        ]);

        if($store){
            return redirect()->back()->with('success', 'Pengajuan Konfirmasi Kehadiran telah Dikirim!');
        }
        return redirect()->back()->with('fail', 'Terjadi Kesalahan!');
    }

    public function addAbsence(){
        $absences = Absence::where('employee_id', Auth::guard('employee')->id())->get();
        return view('employee.attendance.formtidakhadir', compact('absences'));
    }
    public function storeAbsence(Request $request){
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'keterangan' => 'required',
           'reason' => 'required'
        ]);

        $store = Absence::create([
            'employee_id' => Auth::guard('employee')->id(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'reason' => $request->reason,
            'keterangan' => $request->keterangan,
            'status' => 'pending',
        ]);

        if($store){
            return redirect()->back()->with('success', 'Pengajuan Konfirmasi Ketidakhadiran telah Dikirim!');
        }
        return redirect()->back()->with('fail', 'Terjadi Kesalahan!');
    }

    public function indexLeave(){
        $leaves = Leave::where('employee_id', Auth::guard('employee')->id())->get();
        $confirmed_leaves = Leave::where('employee_id', Auth::guard('employee')->id())->where('status', 'confirmed')->get();
        $pending_leaves = Leave::where('employee_id', Auth::guard('employee')->id())->where('status', 'pending')->get();
        $rejected_leaves = Leave::where('employee_id', Auth::guard('employee')->id())->where('status', 'rejected')->get();
        return view('employee.leave.index', compact('leaves', 'confirmed_leaves', 'pending_leaves', 'rejected_leaves'));
    }

    public function addLeave(){
        return view('employee.leave.formcuti');
    }
    public function storeLeave(Request $request){
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required',

        ]);

        $store = Leave::create([
            'employee_id' => Auth::guard('employee')->id(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'reason' => $request->reason,
            'status' => 'pending',
        ]);

        if($store){
            return redirect()->route('employee.leave.index')->with('success', 'Pengajuan Cuti telah Dikirim!');
        }
        return redirect()->route('employee.leave.index')->with('fail', 'Terjadi Kesalahan!');
    }

    public function scan(Request $request){
        $qr = ActiveQR::first();
        if($qr != null){
            if($qr->isActive){
                if($qr->code == $request->decodedText){
                    $attendance = Attendance::create([
                        'employee_id' => Auth::guard('employee')->id(),
                        'method' => 'qr',
                        'date' => Carbon::now()->toDateString(),
                        'time' => Carbon::now()->toTimeString(),
                        'type' => $request->attendanceType,
                        'status' => 'confirmed',
                    ]);
                    $type = ' ';
                    if($request->attendanceType == 'in'){
                        $type = ' Masuk ';
                    }elseif($request->attendanceType == 'out'){
                        $type = ' Pulang ';
                    }
                    if($attendance){
                        return redirect()->back()->with('success', 'Absensi'.$type.' berhasil dicatat!');
                    }else{
                        return redirect()->back()->with('fail', 'Terjadi Kesalahan!');
                    }
                }else{
                    return redirect()->back()->with('fail', 'QR Code Tidak Valid/Kadaluarsa!');
                }
            }else{
                return redirect()->back()->with('fail', 'Tidak Ada Sesi Absensi!');
            }
        }
        return redirect()->back()->with('fail', 'QR Code Tidak Valid!');
    }
}
