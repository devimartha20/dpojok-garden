<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Material;
use App\Models\Admin\Unit;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $material=Material::all();
        $unit=Unit::all();
        return view('user.admin.material', compact('material', 'unit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('material.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
        [
            'nama' => 'required|unique:materials,nama',
            'stok' => 'required',
            'unit' => 'required',
        ],

        [
            'nama.required' => 'Kategori Wajib Diisi',
            'nama.unique' => 'Kategori Sudah Ada',
            'stok.required' => 'Stok Wajib Diisi',
            'unit.required' => 'Unit Wajib Diisi'

        ]);

        $bahan_baku = Material::create(
        [
            'nama' => $request->nama,
            'stok'  => $request->stok,
            'unit_id' => $request->unit,

        ]);

        if($bahan_baku)
        {
            return redirect()->back()->with('success', 'Bahan Baku Berhasil Ditambahkan');
        }

        return redirect()->back()->with('fail', 'Terjadi Kesalahan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('material.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return redirect()->route('material.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama' => 'required|unique:materials,nama,' .$id,
                'stok' => 'required',
                'unit' => 'required',
            ],

            [
                'nama.required' => 'Kategori Wajib Diisi',
                'nama.unique' => 'Kategori Sudah Ada',
                'stok.required' => 'Stok Wajib Diisi',
                'unit.required' => 'Unit Wajib Diisi'

            ]);

            $bahan_baku = Material::findOrFail($id)->update(
            [
                'nama' => $request->nama,
                'stok'  => $request->stok,
                'unit_id' => $request->unit,

            ]);

            if($bahan_baku)
            {
                return redirect()->back()->with('success', 'Pemesanan berhasil diubah');
            }

            return redirect()->back()->with('fail', 'Terjadi Kesalahan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $destroy = Material::destroy($id);
        if($destroy){
            return redirect()->back()->with('success', 'Bahan Baku Berhasil Dihapus!');
        }

    }
}
