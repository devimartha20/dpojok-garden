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
