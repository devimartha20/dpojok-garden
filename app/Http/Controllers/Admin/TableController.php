<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Table;
use App\Models\ReservationTable;
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
        $path = 'images/'.$imageName;

        $table = Table::create([
            'no_meja' => $request->no_meja,
            'deskripsi' => $request->deskripsi,
            'jumlah_kursi' => $request->jumlah_kursi,
            'status' => $request->status,
            'image' => $path,
        ]);

        if ($table)
        {
            return redirect()->route('table.index')->with('success', 'Meja Berhasil Ditambahkan!');
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
            'no_meja' => 'required|unique:tables,no_meja,'.$id,
            'jumlah_kursi' => 'required',
            'status' => 'required',
            'image' => 'nullable|image',

        ]);
        $table = Table::FindOrFail($id);
        $path = $table->image;

        if($request->file('image')){
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('images'), $imageName);
            $path = 'images/'.$imageName;
        }

        $table = Table::findOrFail($id)->update([
            'no_meja' => $request->no_meja,
            'deskripsi' => $request->deskripsi,
            'jumlah_kursi' => $request->jumlah_kursi,
            'status' => $request->status,
            'image' => $path,
        ]);

        if ($table)
        {
            return redirect()->route('table.index')->with('success', 'Meja Berhasil Ditambahkan!');
        }

        return redirect()->back()->with('fail', 'Terjadi Kesalahan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $table = Table::find($id);
        if ($table){
            $reservation_table_count = ReservationTable::where('table_id', $id)->count();
           if($reservation_table_count > 0){
            return redirect()->back()->with('fail', 'Meja tidak dapat dihapus karena terdapat dalam data reservasi!');
           }
        }
        $deleted = Table::destroy($id);
        if ($deleted){
            return redirect()->back()->with('success', 'Meja Berhasil Dihapus!');
        }
        return redirect()->back()->with('fail', 'Terjadi Kesalahan!');
    }
}
