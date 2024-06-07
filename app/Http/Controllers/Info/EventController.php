<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use App\Models\Info\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('user.admin.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('event.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $totalEvents = Event::count();
        $request->validate([
            'name' => 'required|unique:facilities,name',
            'img' => 'required|image',
            'desc' => 'required',
            'shown' => 'required|boolean',
            'start_date' => 'required|date',
            'end_date' => 'nullable|after_or_equal:start_date',
            'seq' => 'nullable|integer|min:1|max:' . ($totalEvents + 1),
        ], [
            'name.required' => 'Nama wajib diisi',
            'name.unique' => 'Nama fasilitas sudah ada',
            'img.required' => 'Gambar wajib diisi',
            'img.image' => 'Format gambar tidak valid',
            'desc.required' => 'Deskripsi wajib diisi',
            'shown.required' => 'Status tampil wajib diisi',
            'shown.boolean' => 'Status tampil harus berupa boolean',
            'seq.min' => 'Urutan minimal 1',
            'seq.max' => 'Urutan maksimal ' . ($totalEvents + 1),
            'start_date.required' => 'Tanggal mulai wajib diisi.',
            'end_date.after_or_equal' => 'Tanggal akhir harus sebelum tanggal mulai',
        ]);

        $imageName = time() . '-' . $request->file('img')->getClientOriginalName();
        $request->file('img')->storeAs('images', $imageName, 'public');

        $seq = $request->seq ?? ($totalEvents + 1);

        // Shift sequences
        Event::where('seq', '>=', $seq)->increment('seq');

        $event = Event::create([
            'name' => $request->name,
            'img' => $imageName,
            'desc' => $request->desc,
            'shown' => $request->shown,
            'seq' => $seq,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        if ($event) {
            return redirect()->route('event.index')->with('success', 'Acara berhasil ditambahkan!');
        }
        return redirect()->route('event.index')->with('fail', 'Terjadi Kesalahan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('event.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return redirect()->route('event.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);
        $totalEvents = Event::count();

        $request->validate([
            'name' => 'required|unique:facilities,name,' . $id,
            'img' => 'nullable|image',
            'desc' => 'required',
            'shown' => 'required|boolean',
            'seq' => 'nullable|integer',
            'start_date' => 'required|date',
            'end_date' => 'nullable|after_or_equal:start_date',
        ], [
            'name.required' => 'Nama wajib diisi',
            'name.unique' => 'Nama fasilitas sudah ada',
            'img.image' => 'Format gambar tidak valid',
            'desc.required' => 'Deskripsi wajib diisi',
            'shown.required' => 'Status tampil wajib diisi',
            'shown.boolean' => 'Status tampil harus berupa boolean',
            'start_date.required' => 'Tanggal mulai wajib diisi.',
            'end_date.after_or_equal' => 'Tanggal akhir harus sebelum tanggal mulai',
        ]);

        if ($request->hasFile('img')) {
            // Delete old image
            Storage::disk('public')->delete('images/' . $event->img);
            // Store new image
            $imageName = time() . '-' . $request->file('img')->getClientOriginalName();
            $request->file('img')->storeAs('images', $imageName, 'public');
            $event->img = $imageName;
        }

        $newSeq = $request->seq ?? $event->seq;

        if ($newSeq != $event->seq) {
            if ($newSeq > $event->seq) {
                Event::where('seq', '>', $event->seq)->where('seq', '<=', $newSeq)->decrement('seq');
            } else {
                Event::where('seq', '>=', $newSeq)->where('seq', '<', $event->seq)->increment('seq');
            }
        }

        $updated = $event->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'shown' => $request->shown,
            'seq' => $newSeq,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);


        if ($updated){
            return redirect()->route('event.index')->with('success', 'Acara berhasil diperbarui!');
        }
        return redirect()->route('event.index')->with('fail', 'Terjadi Kesalahan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);

        // Delete image
        Storage::disk('public')->delete('images/' . $event->img);

        $eventSeq = $event->seq;

        // Shift sequences
        Event::where('seq', '>', $eventSeq)->decrement('seq');

        $deleted = Event::destroy($id);

        if($deleted){
            return redirect()->route('event.index')->with('success', 'Acara berhasil dihapus!');
        }
        return redirect()->route('event.index')->with('fail', 'Terjadi Kesalahan!');
    }
}

