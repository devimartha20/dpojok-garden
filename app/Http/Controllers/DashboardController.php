<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('admin'))
        {
            return view('user.admin.dashboard');
        }
        else if (Auth::user()->hasRole('koki'))
        {
            return view('user.koki.dashboard');
        }
        else if (Auth::user()->hasRole('kasir'))
        {
            return view('user.kasir.dashboard');
        }
        else if (Auth::user()->hasRole('pelayan'))
        {
            return view('user.pelayan.dashboard');
        }
        else if (Auth::user()->hasRole('owner'))
        {
            return view('user.owner.dashboard');
        }
        else if (Auth::user()->hasRole('pelanggan'))
        {
            return view('user.pelanggan.dashboard');
        }

        return abort('403');
    }
}
