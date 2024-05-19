<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Unit;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('user.admin.reservation.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('unit.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'satuan' => 'required|unique:units,satuan',
            ],
            [
                'satuan.required' => 'satuan Wajib Diisi',
                'satuan.unique' => 'Satuan Sudah Ada',
            ]);

            $satuan = unit::create([
                'satuan' => $request->satuan,
            ]);

            if ($satuan)
            {
                return redirect()->back()->with('success', 'Satuan Berhasil Ditambahkan!');
            }

            return redirect()->back()->with('fail', 'Terjadi Kesalahan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('unit.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return redirect()->route('unit.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'satuan' => 'required|unique:units,satuan,'.$id,
            ],
            [
                'satuan.required' => 'Satuan Wajib Diisi',
                'satuan.unique' => 'Satuan Sudah Ada',
            ]);

            $satuan = Unit::findOrFail($id)->update([
                'satuan' => $request->satuan,
            ]);

            if ($satuan)
            {
                return redirect()->back()->with('success', 'Satuan Berhasil Diubah!');
            }

            return redirect()->back()->with('fail', 'Terjadi Kesalahan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Unit::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Satuan Berhasil Dihapus!');
    }
}
