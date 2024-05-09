<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActiveQR;
use Carbon\Carbon;
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

        return view('user.admin.attendance.index', compact('qr'));
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


        return view('employee.showQR', compact('qr'));
    }

    public function changeStatus(){

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
    }
}
