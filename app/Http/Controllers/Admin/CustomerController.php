<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
                'nama' => 'required',
                'email' => 'required|unique:customers,email',
                'alamat' => 'required',
                'telepon' => 'required|unique:customers,telepon',
            ],
            [
                'nama.required' => 'Nama wajib diiis!',
            ]);

            $user = User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'alamat' => $request->telepon,
                'telepon' => $request->alamat,
                'password' => Hash::make($request->password),
            ]);

            $user->assignRole('pelanggan');

            $customer = Customer::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'alamat' => $request->telepon,
                'telepon' => $request->alamat,
                'user_id' => $user->id,
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
        $customer = Customer::findOrFail($id);
        $user = User::findOrFail($customer->user_id);
        $request->validate(
            [
                'nama' => 'required',
                'email' => 'required|unique:customers,email,'.$id.'|unique:users,email,'.$user->id,
                'alamat' => 'required',
                'telepon' => 'required|unique:customers,telepon,'.$id,
            ], [
                'nama.required' => 'Nama wajib diiis!',
            ]);


            $customer_update = Customer::findOrFail($id)->update(
            [
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            ]);

            $user_update = User::findOrFail($customer->user_id)->update([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            ]);

            if ($customer_update)
            {
                return redirect()->route('customer.index')->with('success', 'Data Pelanggan Berhasil Diupdate!');
            }

            return redirect()->route('customer.index')->with('fail', 'Terjadi Kesalahan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);
        $user_delete = User::destroy($customer->user_id);
        $customer_delete = Customer::destroy($id);
        return redirect()->back()->with('success', 'Data Pelanggan Berhasil Dihapus!');
    }
}
