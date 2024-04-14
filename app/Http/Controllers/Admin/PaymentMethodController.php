<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $metode = PaymentMethod::all();
        return view('user.admin.payment_method.index', compact('metode'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $metode = PaymentMethod::all();
        return view('user.admin.payment_method.create', compact('metode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'jenis' => 'required',
                'nama' => 'required|unique:payment_methods,nama',
                'deskripsi' => 'required',
            ],

            [
                'jenis.required' => 'jenis metode pembayaran wajib dipilih!',
                'nama.required' => 'nama metode pembayaran wajib dipilih!',
            ]);


            $metode = PaymentMethod::create([
                'jenis' => $request->jenis,
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
            ]);

            if ($metode)
            {
                return redirect()->route('metode.index')->with('success', 'Metode Pembayaran Berhasil Ditambahkan!');
            }

            return redirect()->back()->with('fail', 'Terjadi Kesalahan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $metode = PaymentMethod::findOrFail($id);
        return view('user.admin.payment_method.edit', compact('metode'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $metode = PaymentMethod::findOrFail($id);
        return view('user.admin.payment_method.edit', compact('metode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jenis' => 'required',
            'nama' => 'required|unique:payment_methods,nama,'.$id,
            'deskripsi' => 'required',

        ]);

        $metode = PaymentMethod::findOrFail($id)->update([
            'jenis' => $request->jenis,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($metode)
        {
            return redirect()->route('metode.index')->with('success', 'Metode Pembayaran Berhasil Ditambahkan!');
        }

        return redirect()->back()->with('fail', 'Terjadi Kesalahan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PaymentMethod::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Metode Pembayaran Berhasil Dihapus!');
    }
}
