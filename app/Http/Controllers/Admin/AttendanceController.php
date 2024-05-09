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
        $random = Str::random(40);
        $code = $currentTime->timestamp . '-' . $currentTime->addSeconds(5)->timestamp.'-'.$random;

        // Create or update the ActiveQR model
        $qrActive = ActiveQR::firstOrNew(['code' => $code]);
        $qrActive->isActive = true; // Set isActive to true
        $qrActive->save();

        // Generate the QR code
        $qr = QrCode::size(200)->generate($code);

        return view('user.admin.attendance', compact('qr'));
    }
}
