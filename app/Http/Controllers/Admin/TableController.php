<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $table = Table::all();
        return view('user.admin.table.index', compact('table'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $table = Table::all();
        return view('user.admin.table.create', compact('table'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
        [
            'no_meja' => 'required|unique:tables,no_meja',
            'jumlah_kursi' => 'required|integer',
            'status' => 'required',
            'image' => 'required|image',
        ], [
            'no_meja.required' => 'No Meja wajib diiis!',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $table = Table::create([
            'no_meja' => $request->no_meja,
            'jumlah_kursi' => $request->jumlah_meja,
            'status' => $request->status,
            'image' => $imageName,
        ]);

        if ($table)
        {
            return redirect()->back()->with('success', 'Meja Berhasil Ditambahkan!');
        }

        return redirect()->back()->with('fail', 'Terjadi Kesalahan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $table = Table::findOrFail($id);
        return view('user.admin.table.edit', compact('table'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $table = Table::findOrFail($id);
        return view('user.admin.table.edit', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'no_meja' => 'required|unique:tables,no_meja'.$id,
            'jumlah_kursi' => 'required',
            'status' => 'required',
            'image' => 'nullable|image',

        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $table = Table::findOrFail($id)->update([
            'no_meja' => $request->no_meja,
            'jumlah_kursi' => $request->jumlah_meja,
            'status' => $request->status,
            'image' => $request->image,
        ]);

        if ($table)
        {
            return redirect()->back()->with('success', 'Meja Berhasil Ditambahkan!');
        }

        return redirect()->back()->with('fail', 'Terjadi Kesalahan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Table::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Meja Berhasil Dihapus!');
    }
}
