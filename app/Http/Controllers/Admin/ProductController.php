<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\DetailOrder;
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
            'product_category_id' => 'required|int',
            'harga_jual' => 'required|min:1',
            'stok' => 'required|min:0',
        ], [
            'nama.required' => 'Nama produk wajib diisi.',
            'nama.unique' => 'Produk dengan nama tersebut sudah ada.',
            'image.required' => 'Gambar produk wajib diisi.',
            'image.image' => 'Format gambar tidak valid',
            'product_category_id.required' => 'Kategori produk wajib diisi.',
            'product_category_id.int' => 'Kategori produk tidak valid.',
            'harga_jual.required' => 'Harga jual wajib diisi.',
            'harga_jual.min' => 'Harga jual harus lebih besar dari 0 rupiah',
            'stok.required' => 'Stok wajib diisi.',
            'stok.min' => 'Stok harus bernilai positif.',
        ]);

        $imageName = time().'-produk.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $product = Product::create([
            'product_category_id' => $request->product_category_id,
            'nama' => $request->nama,
            'image' => $imageName,
            'harga_jual' => $request->harga_jual,
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
            'product_category_id' => 'required|int',
            'harga_jual' => 'required',

        ]);

        $product = Product::findOrFail($id);

        $path= $product->image;

        if($request->file('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $path = $imageName;
        }

        $product = Product::findOrFail($id)->update([
            'product_category_id' => $request->product_category_id,
            'nama' => $request->nama,
            'image' => $path,
            'harga_jual' => $request->harga_jual,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
        ]);

        if ($product)
        {
            return redirect()->route('product.index')->with('success', 'Produk Berhasil Ditambahkan!');
        }

        return redirect()->back()->with('fail', 'Terjadi Kesalahan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the product by its ID
        $product = Product::find($id);

        // If the product exists, proceed with the logic
        if ($product) {
            // Find detail orders related to the product
            $detailOrders = DetailOrder::where('product_id', $id)->get();

            // Loop through each detail order
            foreach ($detailOrders as $detailOrder) {
                // Access the associated order
                $order = $detailOrder->order;

                // Check if the order status is 'belum_lunas' and progress is 'menunggu_pembayaran'
                if ($order->status == 'belum_lunas' && $order->progress == 'menunggu_pembayaran') {
                    // Change the order's progress to 'dibatalkan'
                    $order->progress = 'dibatalkan';
                    $order->save();
                }
            }

            // Proceed to delete the product
            $deleted = $product->delete();

            if ($deleted) {
                return redirect()->back()->with('success', 'Produk Berhasil Dihapus!');
            }
        }

        return redirect()->back()->with('fail', 'Terjadi Kesalahan');
    }

}
