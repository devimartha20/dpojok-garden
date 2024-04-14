<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::all();
        return view('user.admin.customer.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:products,nama',
            'image' => 'required|image',
            'deskripsi' => 'required',
            'product_category_id' => 'required',
            'harga_jual' => 'required',
            'harga_produksi' => 'required',
            'stok' => 'required',

        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $product = Product::create([
            'product_category_id' => $request->product_category_id,
            'nama' => $request->nama,
            'image' => $imageName,
            'harga_jual' => $request->harga_jual,
            'harga_produksi' => $request->harga_produksi,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
        ]);

        if ($product)
        {
            return redirect()->back()->with('success', 'Produk Berhasil Ditambahkan!');
        }

        return redirect()->back()->with('fail', 'Terjadi Kesalahan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Customer::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data Pelanggan Berhasil Dihapus!');
    }
}
