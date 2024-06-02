<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee = Employee::all();
        return view('user.admin.employee.index', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employee = Employee::all();
        return view('user.admin.employee.create', compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'id_pegawai' => 'required|unique:employees,id_pegawai',
                'nama' => 'required',
                'role' => 'required',
                'email' => 'required|unique:users,email',
                'alamat' => 'required',
                'telepon' => 'required|unique:employees,telepon',
            ],
            [
                'nama.required' => 'Nama wajib diiis!',
            ]);

            $user = User::create([
                'id_pegawai' => $request->id_pegawai,
                'name' => $request->nama,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'telepon' => $request->telepon,
                'password' => Hash::make($request->password),
            ]);

            if($request->role == 'admin')
            {
                $user->assignRole('admin');

            }elseif($request->role == 'kasir')
            {
                $user->assignRole('kasir');

            }elseif($request->role == 'koki')
            {
                $user->assignRole('koki');

            }elseif($request->role == 'pelayan')
            {
                $user->assignRole('pelayan');

            }

            $employee = Employee::create([
                'id_pegawai' => $request->id_pegawai,
                'nama' => $request->nama,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'telepon' => $request->telepon,
                'user_id' => $user->id,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('employee.index')->with('success', 'Data Pegawai Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::findOrFail($id);
        return view('user.admin.employee.edit', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        return view('user.admin.employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employee = Employee::findOrFail($id);
        $user = User::findOrFail($employee->user_id);
        $request->validate(
            [
                'id_pegawai' => 'required|unique:employees,id_pegawai,'.$id,
                'nama' => 'required',
                'email' => 'required|unique:users,email,'.$user->id,
                'alamat' => 'required',
                'telepon' => 'required|unique:employees,telepon,'.$id,
            ], [
                'nama.required' => 'Nama wajib diiis!',
            ]);

            $user->removeRole($user->roles->first());

            if($request->role == 'admin')
            {
                $user->assignRole('admin');

            }elseif($request->role == 'kasir')
            {
                $user->assignRole('kasir');

            }elseif($request->role == 'koki')
            {
                $user->assignRole('koki');

            }elseif($request->role == 'pelayan')
            {
                $user->assignRole('pelayan');

            }


            $employee_update = Employee::findOrFail($id)->update(
            [
            'id_pegawai' => $request->id_pegawai,
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            ]);

            $user_update = User::findOrFail($employee->user_id)->update([
                'name' => $request->nama,
                'email' => $request->email,
            ]);

            return redirect()->route('employee.index')->with('success', 'Data Pegawai Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        $user_delete = User::destroy($employee->user_id);
        $customer_delete = Employee::destroy($id);
        return redirect()->back()->with('success', 'Data Pegawai Berhasil Dihapus!');
    }
}
