<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Leave;
use App\Models\Worktime;
use App\Models\Holiday;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{

    public function index(){

        $worktimes = Worktime::all();
        $holidays = Holiday::all();

        $events = [];

        // Convert worktimes to events
        foreach ($worktimes as $worktime) {
            $events[] = [
                'title' => 'Worktime',
                'start' => $this->convertToDateTime($worktime->day, $worktime->start_time),
                'end' => $this->convertToDateTime($worktime->day, $worktime->end_time),
                'color' => 'blue'
            ];
        }

        // Convert holidays to events
        foreach ($holidays as $holiday) {
            $events[] = [
                'title' => $holiday->name,
                'start' => $holiday->start_date,
                'end' => $holiday->end_date,
                'description' => $holiday->desc,
                'color' => 'red'
            ];
        }

         return view('user.admin.schedule.index', compact('envents'));
    }

    private function convertToDateTime($day, $time)
    {
        $date = now()->startOfWeek()->addDays($day - 1);
        return $date->format('Y-m-d') . 'T' . $time;
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

    public function updateHoliday(Request $request, $id){
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'name' => 'required',
            'desc' => 'nullable',
        ]);

        $holiday = Holiday::find($id)->update([
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
        return redirect()->back()->with('fail', 'Terjadi Kesalahan!');
    }

    public function updateWorktime(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'start_time' => 'required|date_format:H:i:s',
            'end_time' => 'required|date_format:H:i:s|after_or_equal:start_time',
            'rest_start_time' => 'nullable|date_format:H:i:s|before:end_time|after:start_time',
            'rest_end_time' => [
                'nullable',
                'date_format:H:i:s',
                'after:rest_start_time',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->end_time && $value > $request->end_time) {
                        $fail('The rest end time must be before the end time.');
                    }
                },
            ],
        ]);

        // Find the Worktime record by ID
        $worktime = Worktime::findOrFail($id);

        // Calculate rest duration if rest times are provided
        $rest_duration_min = 0;
        if ($request->rest_start_time && $request->rest_end_time) {
            $rest_duration_min = $this->calculateRestDuration($request->rest_start_time, $request->rest_end_time);
        }

        // Calculate working and total durations
        $working_duration_min = $this->calculateWorkingDuration($request->start_time, $request->end_time, $rest_duration_min);
        $total_duration_min = $this->calculateTotalDuration($request->start_time, $request->end_time);

        // Update the Worktime record with new values
        $worktime->update([
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'rest_start_time' => $request->rest_start_time,
            'rest_end_time' => $request->rest_end_time,
            'rest_duration_min' => $rest_duration_min,
            'working_duration_min' => $working_duration_min,
            'total_duration_min' => $total_duration_min,
        ]);

        return response()->json(['message' => 'Worktime updated successfully']);
    }


    private function calculateWorkingDuration(string $start_time, string $end_time, int $rest_duration_min): int
    {
        $start = Carbon::createFromFormat('H:i:s', $start_time);
        $end = Carbon::createFromFormat('H:i:s', $end_time);
        $working_minutes = $start->diffInMinutes($end) - $rest_duration_min;
        return $working_minutes;
    }


    private function calculateTotalDuration(string $start_time, string $end_time): int
    {
        $start = Carbon::createFromFormat('H:i:s', $start_time);
        $end = Carbon::createFromFormat('H:i:s', $end_time);
        $total_minutes = $start->diffInMinutes($end);
        return $total_minutes;
    }


    private function calculateRestDuration(string $rest_start_time, string $rest_end_time): int
    {
        $start = Carbon::createFromFormat('H:i:s', $rest_start_time);
        $end = Carbon::createFromFormat('H:i:s', $rest_end_time);
        $rest_minutes = $start->diffInMinutes($end);
        return $rest_minutes;
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
