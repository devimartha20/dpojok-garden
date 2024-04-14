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
        $customer = Customer::all();
        return view('user.admin.customer.create', compact('customer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|unique:customer,nama',
                'email' => 'required',
                'telepon' => 'required',
                'alamat' => 'required',
            ], [
                'nama.required' => 'Nama wajib diiis!',
            ]);

            $customer = Customer::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
            ]);

            if ($customer)
            {
                return redirect()->route('customer.index')->with('success', 'Data Pelanggan Berhasil Ditambahkan!');
            }

            return redirect()->back()->with('fail', 'Terjadi Kesalahan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('user.admin.customer.edit', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('user.admin.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama' => 'required|unique:customer,nama,'.$id,
                'email' => 'required',
                'telepon' => 'required',
                'alamat' => 'required',
            ], [
                'nama.required' => 'Nama wajib diiis!',
            ]);

            $customer = Customer::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
            ]);

            if ($customer)
            {
                return redirect()->route('customer.index')->with('success', 'Data Pelanggan Berhasil Ditambahkan!');
            }

            return redirect()->back()->with('fail', 'Terjadi Kesalahan!');
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
