<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Leave;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
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
