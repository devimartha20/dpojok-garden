<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\ProductCategory;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productCategory = ProductCategory::all();
        return view('user.admin.product_category.product_category', compact('productCategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('product-category.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
        [
            'nama' => 'required|unique:product_categories,nama',
            'deskripsi' => 'required',
        ],
        [
            'nama.required' => 'Kategori Wajib Diisi',
            'nama.unique' => 'Kategori Sudah Ada',
            'deskripsi.required' => 'Deskripsi Wajib Diisi',
        ]);

        $kategori = ProductCategory::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($kategori)
        {
            return redirect()->back()->with('success', 'Kategori Berhasil Ditambahkan!');
        }

        return redirect()->back()->with('fail', 'Terjadi Kesalahan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('product-category.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return redirect()->route('product-category.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama' => 'required|unique:product_categories,nama,'.$id,
                'deskripsi' => 'required',
            ],
            [
                'nama.required' => 'Kategori Wajib Diisi',
                'nama.unique' => 'Kategori Sudah Ada',
                'deskripsi.required' => 'Deskripsi Wajib Diisi',
            ]);

            $kategori = ProductCategory::findOrFail($id)->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
            ]);

            if ($kategori)
            {
                return redirect()->back()->with('success', 'Kategori Berhasil Diubah!');
            }

            return redirect()->back()->with('fail', 'Terjadi Kesalahan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ProductCategory::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Kategori Berhasil Dihapus!');
    }
}
