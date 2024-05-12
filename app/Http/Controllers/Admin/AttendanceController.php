<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absence;
use App\Models\ActiveQR;
use App\Models\Attendance;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;

class AttendanceController extends Controller
{
    public function index(){
        // Generate a unique code for the QR code
        $currentTime = Carbon::now();
        $random = Str::random(20);
        $code = $currentTime->timestamp . '-' . $currentTime->addSeconds(5)->timestamp.'-'.$random;

        $qr = null;
        // Create or update the ActiveQR model
        $qrActive = ActiveQR::first();
        if ($qrActive != null){
            ActiveQR::first()->update([
                'code' => $code,
            ]);
            $qrActive = ActiveQR::first();
            if($qrActive->isActive){
                $qr = QrCode::size(200)->generate($code);
            }
        }else{
            $qrActive = ActiveQR::create([
                'code' => $code,
                'isActive' => false,
            ]);
            $qr = QrCode::size(200)->generate($code);
        }

        // Get distinct dates where either attendance or absence records exist
        $distinctDates = DB::table('attendances')
        ->select('date')
        ->union(DB::table('absences')->select('start_date as date'))
        ->distinct()
        ->orderBy('date')
        ->get()
        ->pluck('date');

        // Fetch attendance and absence records for each distinct date
        $groupedData = [];
        foreach ($distinctDates as $date) {
            $attendances = Attendance::whereDate('date', $date)->get();
            $absences = Absence::whereDate('start_date', $date)->get();

            // If either attendances or absences exist for the date, add them to groupedData
            if ($attendances->isNotEmpty() || $absences->isNotEmpty()) {
                $groupedData[$date] = [
                    'attendances' => $attendances,
                    'absences' => $absences,
                ];
            }
        }

        return view('user.admin.attendance.index', compact('qr', 'qrActive', 'groupedData'));
    }

    public function showQR(){

        $qr = null;
        // Create or update the ActiveQR model
        $qrActive = ActiveQR::first();
        if ($qrActive != null){

            if($qrActive->isActive){
                $qr = QrCode::size(200)->generate( $qrActive->code);
            }
        }


        return view('employee.showQR', compact('qr', 'qrActive'));
    }

    public function checkStatus()
    {
        $qrActive = ActiveQR::first();

        return response()->json([
            'isActive' => $qrActive ? $qrActive->isActive : 0,
        ]);
    }

    public function updateQRStatus(Request $request)
    {
        // Retrieve the value of the 'status' checkbox from the request
        $status = $request->status;

        // Generate a unique code for the QR code
        $code = Carbon::now()->timestamp . '-' . Carbon::now()->addSeconds(5)->timestamp . '-' . Str::random(20);

        if ($status) {
            // Create or update the ActiveQR model
            $qrActive = ActiveQR::firstOrCreate([], ['code' => $code]);
            $qrActive->update(['isActive' => true]);
        }else{
             // Create or update the ActiveQR model
             $qrActive = ActiveQR::firstOrCreate([], ['code' => $code]);
             $qrActive->update(['isActive' => false]);
        }
        // return dd($qrActive);
        // Redirect or return a response as needed
        return redirect()->back()->with('success', 'QR session status updated successfully');
    }

    public function updateQR(){
        // Generate a unique code for the QR code
        $currentTime = Carbon::now();
        $random = Str::random(20);
        $code = $currentTime->timestamp . '-' . $currentTime->addSeconds(5)->timestamp.'-'.$random;

        $qr = null;
        // Create or update the ActiveQR model
        $qrActive = ActiveQR::first();
        if ($qrActive != null){
            if($qrActive->isActive){
            ActiveQR::first()->update([
                'code' => $code,
            ]);
            }
        }

         // Generate QR code HTML
        //  $qrHtml = QrCode::size(200)->generate($code);

        // return response()->json(['qrHtml' => $qrHtml]);
    }
}
