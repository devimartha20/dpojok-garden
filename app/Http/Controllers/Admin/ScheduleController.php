<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Leave;
use App\Models\Worktime;
use App\Models\Holiday;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{

    public function index(){
         return view('user.admin.schedule.index');   
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

    public function destroyHoliday($id){
        $deleted = Holiday::destroy($id);

        if ($deleted){
            return redirect()->back()->with('success', 'Hari Libur Berhasil Dihapus!');
        }
    }

    public function updateWorktime($id){

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
