<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeHrController extends Controller
{
    public function dashboard(){
        return view('employee.dashboard');
    }

    public function schedule(){
        return view('employee.schedule.index');
    }

    public function attendance(){
        return view('employee.attendance.index');
    }

    public function showScan(){
        return view('employee.attendance.scan');
    }

    public function scan(Request $request){
        return dd($request);
    }
}
