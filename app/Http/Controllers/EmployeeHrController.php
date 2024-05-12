<?php

namespace App\Http\Controllers;

use App\Models\ActiveQR;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

class EmployeeHrController extends Controller
{
    public function dashboard(){
        return view('employee.dashboard');
    }

    public function schedule(){
        return view('employee.schedule.index');
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
            'catatan' => 'required',
        ]);

        $store = Attendance::create([
            'employee_id' => Auth::guard('employee')->id(),
            'method' => 'confirmation',
            'date' => now()->toDateTimeString(), // Format date as datetime string
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
        return view('employee.attendance.formtidakhadir');
    }
    public function storeAbsence(Request $request){
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'reason' => 'required',
            'catatan' => 'required',
        ]);

        $store = Attendance::create([
            'employee_id' => Auth::guard('employee')->id(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'reason' => now()->toTimeString(), // Format time as time string
            'type' => 'in',
            'status' => 'pending',
        ]);

        if($store){
            return redirect()->back()->with('success', 'Pengajuan Konfirmasi Kehadiran telah Dikirim!');
        }
        return redirect()->back()->with('fail', 'Terjadi Kesalahan!');
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
