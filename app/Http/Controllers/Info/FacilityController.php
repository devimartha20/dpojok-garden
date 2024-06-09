<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use App\Models\Info\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facilities = Facility::orderBy('seq', 'asc')->get();
        return view('user.admin.facility.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('facility.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $totalFacilities = Facility::count();
        $request->validate([
            'name' => 'required|unique:facilities,name',
            'img' => 'required|image',
            'desc' => 'required',
            'shown' => 'required|boolean',
            'seq' => 'nullable|integer|min:1|max:' . ($totalFacilities + 1),
        ], [
            'name.required' => 'Nama wajib diisi',
            'name.unique' => 'Nama fasilitas sudah ada',
            'img.required' => 'Gambar wajib diisi',
            'img.image' => 'Format gambar tidak valid',
            'desc.required' => 'Deskripsi wajib diisi',
            'shown.required' => 'Status tampil wajib diisi',
            'shown.boolean' => 'Status tampil harus berupa boolean',
            'seq.min' => 'Urutan minimal 1',
            'seq.max' => 'Urutan maksimal ' . ($totalFacilities + 1),
        ]);

        $imageName = time() . '-' . $request->file('img')->getClientOriginalName();
        $request->file('img')->storeAs('images', $imageName, 'public');

        $seq = $request->seq ?? ($totalFacilities + 1);

        // Shift sequences
        Facility::where('seq', '>=', $seq)->increment('seq');

        $facility = Facility::create([
            'name' => $request->name,
            'img' => $imageName,
            'desc' => $request->desc,
            'shown' => $request->shown,
            'seq' => $seq,
        ]);

        if ($facility) {
            return redirect()->route('facility.index')->with('success', 'Fasilitas berhasil ditambahkan!');
        }
        return redirect()->route('facility.index')->with('fail', 'Terjadi Kesalahan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return redirect()->route('facility.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return redirect()->route('facility.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $facility = Facility::findOrFail($id);
        $totalFacilities = Facility::count();

        $request->validate([
            'name' => 'required|unique:facilities,name,' . $id,
            'img' => 'nullable|image',
            'desc' => 'required',
            'shown' => 'required|boolean',
            'seq' => 'nullable|integer',
        ], [
            'name.required' => 'Nama wajib diisi',
            'name.unique' => 'Nama fasilitas sudah ada',
            'img.image' => 'Format gambar tidak valid',
            'desc.required' => 'Deskripsi wajib diisi',
            'shown.required' => 'Status tampil wajib diisi',
            'shown.boolean' => 'Status tampil harus berupa boolean',
        ]);

        if ($request->hasFile('img')) {
            // Delete old image
            Storage::disk('public')->delete('images/' . $facility->img);
            // Store new image
            $imageName = time() . '-' . $request->file('img')->getClientOriginalName();
            $request->file('img')->storeAs('images', $imageName, 'public');
            $facility->img = $imageName;
        }

        $newSeq = $request->seq ?? $facility->seq;

        if ($newSeq != $facility->seq) {
            if ($newSeq > $facility->seq) {
                Facility::where('seq', '>', $facility->seq)->where('seq', '<=', $newSeq)->decrement('seq');
            } else {
                Facility::where('seq', '>=', $newSeq)->where('seq', '<', $facility->seq)->increment('seq');
            }
        }

        $updated = $facility->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'shown' => $request->shown,
            'seq' => $newSeq,
        ]);


        if ($updated){
            return redirect()->route('facility.index')->with('success', 'Fasilitas berhasil diperbarui!');
        }
        return redirect()->route('facility.index')->with('fail', 'Terjadi Kesalahan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $facility = Facility::findOrFail($id);

        // Delete image
        Storage::disk('public')->delete('images/' . $facility->img);

        $facilitySeq = $facility->seq;

        // Shift sequences
        Facility::where('seq', '>', $facilitySeq)->decrement('seq');

        $deleted = Facility::destroy($id);

        if($deleted){
            return redirect()->route('facility.index')->with('success', 'Fasilitas berhasil dihapus!');
        }
        return redirect()->route('facility.index')->with('fail', 'Terjadi Kesalahan!');
    }
}
