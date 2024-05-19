<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function salesReport(){
        return view('user.owner.report.sales');
    }

    public function attendanceReport(){
        return view('user.owner.report.attendance');
    }
}
