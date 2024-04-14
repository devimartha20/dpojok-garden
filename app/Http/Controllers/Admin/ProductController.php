<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Models\Admin\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        $productCategory = ProductCategory::all();
        return view('user.admin.product.index', compact('product','productCategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productCategory = ProductCategory::all();
        return view('user.admin.product.create', compact('productCategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dump($request);
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
        $product = Product::findOrFail($id);
        return view('user.admin.product.edit', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $productCategory = ProductCategory::all();
        return view('user.admin.product.edit', compact('product', 'productCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|unique:products,nama,'.$id,
            'image' => 'nullable|image',
            'deskripsi' => 'required',
            'product_category_id' => 'required',
            'harga_jual' => 'required',

        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $product = Product::findOrFail($id)->update([
            'product_category_id' => $request->product_category_id,
            'nama' => $request->nama,
            'image' => $request->image,
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Produk Berhasil Dihapus!');
    }
}
