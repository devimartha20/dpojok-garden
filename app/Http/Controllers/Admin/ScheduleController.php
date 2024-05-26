<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Leave;
use App\Models\Worktime;
use App\Models\Holiday;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{

    public function index()
    {
        $worktimes = Worktime::all();
        $holidays = Holiday::all();

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

        // Adjust worktime events to remove overlapping time with holidays
        foreach ($worktimes as $worktime) {
            $worktimeStart = $this->convertToDateTime($worktime->day, $worktime->start_time);
            $worktimeEnd = $this->convertToDateTime($worktime->day, $worktime->end_time);

            // Adjust worktime based on holiday
            foreach ($holidays as $holiday) {
                $holidayStart = $holiday->start_date;
                $holidayEnd = $holiday->end_date;
                
                $worktimeIsWithinHoliday = true;
                if ($worktimeStart >= $holidayStart && $worktimeEnd <= $holidayEnd) {
                    $worktimeIsWithinHoliday = true;
                    break;
                }

                // Calculate the intersection of time between worktime and holiday events
                $intersectionStart = max($worktimeStart, $holidayStart);
                $intersectionEnd = min($worktimeEnd, $holidayEnd);

                // If there is an overlap, adjust worktime
                if ($intersectionStart < $intersectionEnd) {
                    $events[] = [
                        'title' => 'Kerja',
                        'start' => $worktimeStart,
                        'end' => $intersectionStart,
                        'color' => 'blue'
                    ];

                    $worktimeStart = $intersectionEnd;
                }
            }

            // Add remaining worktime event
            if ($worktimeStart < $worktimeEnd) {
                $events[] = [
                    'title' => 'Kerja',
                    'start' => $worktimeStart,
                    'end' => $worktimeEnd,
                    'color' => 'blue'
                ];
            }

            // Add rest time event if rest_start_time and rest_end_time are set
            if ($worktime->rest_start_time && $worktime->rest_end_time) {
                $restStart = $this->convertToDateTime($worktime->day, $worktime->rest_start_time);
                $restEnd = $this->convertToDateTime($worktime->day, $worktime->rest_end_time);

                // Adjust rest time based on holiday
                foreach ($holidays as $holiday) {
                    $holidayStart = $holiday->start_date;
                    $holidayEnd = $holiday->end_date;

                    if ($restStart >= $holidayStart && $restEnd <= $holidayEnd) {
                        $worktimeIsWithinHoliday = true;
                        break;
                    }

                    // Calculate the intersection of time between rest time and holiday events
                    $restIntersectionStart = max($restStart, $holidayStart);
                    $restIntersectionEnd = min($restEnd, $holidayEnd);

                    // If there is an overlap, adjust rest time
                    if ($restIntersectionStart < $restIntersectionEnd) {
                        $events[] = [
                            'title' => 'Istirahat',
                            'start' => $restStart,
                            'end' => $restIntersectionStart,
                            'color' => 'green'
                        ];

                        $restStart = $restIntersectionEnd;
                    }
                }

                // Add remaining rest time event
                if ($restStart < $restEnd) {
                    $events[] = [
                        'title' => 'Istirahat',
                        'start' => $restStart,
                        'end' => $restEnd,
                        'color' => 'green'
                    ];
                }
            }
        }

        return view('user.admin.schedule.index', compact('events', 'holidays', 'worktimes'));
    }

    public function removeRestTime($id){

        $worktime = Worktime::findOrFail($id);
        $start_time = Carbon::parse($worktime->start_time);
        $end_time = Carbon::parse($worktime->end_time);
        $total_duration_min = $start_time->diffInMinutes($end_time);

        $removed = Worktime::findOrFail($id)->update([
            'rest_start_time' => null,
            'rest_end_time' => null,
            'rest_duration_min' => 0,
            'total_duration_min' => $total_duration_min,
            'working_duration_min' => $total_duration_min,
        ]);

        if ($removed){
            return redirect()->back()->with('success', 'Waktu istirahat berhasil dihapus!');
        }
    }


    private function convertToDateTime($day, $time)
    {
        $date = now()->startOfWeek()->addDays($day - 1);
        return $date->format('Y-m-d') . 'T' . $time;
    }

    public function editWorktime(){
        $worktimes = Worktime::orderBy('day', 'asc')->get();

        $days = [
            1 => 'Senin',
            2 => 'Selasa',
            3 => 'Rabu',
            4 => 'Kamis',
            5 => 'Jumat',
            6 => 'Sabtu',
            7 => 'Minggu',
        ];

        return view('user.admin.schedule.update', compact('worktimes', 'days'));
    }

    public function updateWorktime(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after_or_equal:start_time',
            'rest_start_time' => [
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->rest_end_time != null && empty($value)) {
                        $fail('Waktu mulai istirahat harus diisi jika waktu selesai istirahat diisi');
                    }
                },
                'nullable',
                'date_format:H:i',
                'before:end_time',
                'after:start_time',
            ],
            'rest_end_time' => [
                'nullable',
                'date_format:H:i',
                'after:rest_start_time',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->rest_start_time != null && empty($value)) {
                        $fail('Waktu selesai istirahat harus diisi jika waktu mulai istirahat diisi');
                    }
                    if ($request->filled('end_time') && $value > $request->end_time) {
                        $fail('Waktu selesai istirahat harus sebelum jam pulang');
                    }
                },
            ],

        ], [
            'end_time.after_or_equal' => 'Jam pulang harus setelah jam masuk',
            'rest_start_time.after' => 'Jam mulai istirahat harus setelah jam masuk',
            'rest_start_time.before' => 'Jam mulai istirahat harus sebelum jam pulang',
            'rest_end_time.after' => 'Jam selesai istirahat harus setelah jam mulai istirahat',
        ]);

        // Find the Worktime record by ID
        $worktime = Worktime::findOrFail($id);

        // Calculate rest duration if rest times are provided
        $rest_duration_min = 0;
        if ($request->rest_start_time && $request->rest_end_time) {
            $rest_duration_min = $this->calculateRestDuration($request->rest_start_time, $request->rest_end_time);
        }

        // Calculate working and total durations
        $working_duration_min = $this->calculateWorkingDuration($request->start_time, $request->end_time, $rest_duration_min);
        $total_duration_min = $this->calculateTotalDuration($request->start_time, $request->end_time);

        // Update the Worktime record with new values
        $worktime->update([
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'rest_start_time' => $request->rest_start_time,
            'rest_end_time' => $request->rest_end_time,
            'rest_duration_min' => $rest_duration_min,
            'working_duration_min' => $working_duration_min,
            'total_duration_min' => $total_duration_min,
        ]);

        return redirect()->back()->with('success', 'Jadwal Kerja Berhasil Diubah!');
    }

    public function storeHoliday(Request $request){
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'name' => 'required',
            'desc' => 'nullable',
        ]);

        $holiday = Holiday::create([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'name'=> $request->name,
            'desc' => $request->desc,
        ]);

        if ($holiday){
            return redirect()->back()->with('success', 'Hari Libur Berhasil Ditambahkan!');
        }
        return redirect()->back()->with('fail', 'Terjadi Kesalahan!');
    }

    public function updateHoliday(Request $request, $id){
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'name' => 'required',
            'desc' => 'nullable',
        ]);

        $holiday = Holiday::find($id)->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'name'=> $request->name,
            'desc' => $request->desc,
        ]);

        if ($holiday){
            return redirect()->back()->with('success', 'Hari Libur Berhasil Ditambahkan!');
        }
        return redirect()->back()->with('fail', 'Terjadi Kesalahan!');
    }

    public function destroyHoliday($id){
        $deleted = Holiday::destroy($id);

        if ($deleted){
            return redirect()->back()->with('success', 'Hari Libur Berhasil Dihapus!');
        }
        return redirect()->back()->with('fail', 'Terjadi Kesalahan!');
    }




    private function calculateWorkingDuration(string $start_time, string $end_time, int $rest_duration_min): int
    {
        $start = Carbon::createFromFormat('H:i', $start_time);
        $end = Carbon::createFromFormat('H:i', $end_time);
        $working_minutes = $start->diffInMinutes($end) - $rest_duration_min;
        return $working_minutes;
    }


    private function calculateTotalDuration(string $start_time, string $end_time): int
    {
        //Trim any extra spaces
        $start_time = trim($start_time);
        $end_time = trim($end_time);

        $start = Carbon::createFromFormat('H:i', $start_time);
        $end = Carbon::createFromFormat('H:i', $end_time);
        $total_minutes = $start->diffInMinutes($end);
        return $total_minutes;
    }


    private function calculateRestDuration(string $rest_start_time, string $rest_end_time): int
    {
        $start = Carbon::createFromFormat('H:i', $rest_start_time);
        $end = Carbon::createFromFormat('H:i', $rest_end_time);
        $rest_minutes = $start->diffInMinutes($end);
        return $rest_minutes;
    }

    public function leaveIndex(){

        $leaves = Leave::all();
        $confirmed_leaves = Leave::where('status', 'confirmed')->get();
        $pending_leaves = Leave::where('status', 'pending')->get();
        $rejected_leaves = Leave::where('status', 'rejected')->get();


        return view('user/admin/leave/index', compact(
        'leaves',
        'confirmed_leaves',
        'pending_leaves',
        'rejected_leaves'
    ));
    }
    public function updateLeaveStatus(Request $request, $id){
        $request->validate([
            'status' => 'required',
            'catatan' => 'nullable'
        ]);

        $update = Leave::findOrFail($id)->update([
            'status' => $request->status,
            'catatan' => $request->catatan
        ]);

        if ($update){
            return redirect()->back()->with('success', 'Status berhasil diubah!');
        }
        return redirect()->back()->with('fail', 'Terjadi Kesalahan!');
    }
}
