<?php

namespace Database\Seeders;

use App\Models\Admin\Customer;
use App\Models\Admin\Employee;
use App\Models\ReservationSetting;
use App\Models\User;
use App\Models\Worktime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use DB;
use Hash;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Role
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'kasir']);
        Role::create(['name' => 'pelayan']);
        Role::create(['name' => 'koki']);
        Role::create(['name' => 'owner']);
        Role::create(['name' => 'pelanggan']);


        //Create Permission

        // Produk

        // Kelola Kategori Menu
        Permission::create(['name' =>'tambah-kategori-menu']);
        Permission::create(['name' => 'edit-kategori-menu']);
        Permission::create(['name' => 'hapus-kategori-menu']);
        Permission::create(['name' => 'lihat-kategori-menu']);

        //Kelola Data Menu
        Permission::create(['name' => 'tambah-menu']);
        Permission::create(['name' => 'edit-menu']);
        Permission::create(['name' => 'hapus-menu']);
        Permission::create(['name' => 'lihat-menu']);

        // Kelola Bahan Baku
        Permission::create(['name' => 'tambah-bahan-baku']);
        Permission::create(['name' => 'edit-bahan-baku']);
        Permission::create(['name' => 'hapus-bahan-baku']);
        Permission::create(['name' => 'lihat-bahan-baku']);

        // Kelola Add-Ons
        Permission::create(['name' => 'tambah-add-ons']);
        Permission::create(['name' => 'edit-add-ons']);
        Permission::create(['name' => 'hapus-add-ons']);
        Permission::create(['name' => 'lihat-add-ons']);

        // Kelola Meja
        Permission::create(['name' => 'tambah-meja']);
        Permission::create(['name' => 'edit-meja']);
        Permission::create(['name' => 'hapus-meja']);
        Permission::create(['name' => 'lihat-meja']);

        // Kelola Area Reservasi
        Permission::create(['name' => 'tambah-area-reservasi']);
        Permission::create(['name' => 'edit-area-reservasi']);
        Permission::create(['name' => 'hapus-area-reservasi']);
        Permission::create(['name' => 'lihat-area-reservasi']);

        // Penjualan

        // Kelola Pembayaran
        Permission::create(['name' => 'tambah-metode-bayar']);
        Permission::create(['name' => 'edit-metode-bayar']);
        Permission::create(['name' => 'hapus-metode-bayar']);
        Permission::create(['name' => 'lihat-metode-bayar']);

        // Kelola Pemesanan
        Permission::create(['name' => 'tambah-pemesanan']);
        Permission::create(['name' => 'edit-pemesanan']);
        Permission::create(['name' => 'hapus-pemesanan']);
        Permission::create(['name' => 'lihat-pemesanan']);

        // Kelola Reservasi
        Permission::create(['name' => 'tambah-reservasi']);
        Permission::create(['name' => 'edit-reservasi']);
        Permission::create(['name' => 'hapus-reservasi']);
        Permission::create(['name' => 'lihat-reservasi']);

        // Human Resources

        // Kelola Sesi Absensi
        Permission::create(['name' => 'tambah-sesi-absensi']);
        Permission::create(['name' => 'edit-sesi-absensi']);
        Permission::create(['name' => 'hapus-sesi-absensi']);
        Permission::create(['name' => 'lihat-sesi-absensi']);

        // Kelola Data Absensi
        Permission::create(['name' => 'tambah-data-absensi']);
        Permission::create(['name' => 'edit-data-absensi']);
        Permission::create(['name' => 'hapus-data-absensi']);
        Permission::create(['name' => 'lihat-data-absensi']);

        // Absen
        Permission::create(['name' => 'absen']);

        // Kelola Jam Kerja
        Permission::create(['name' => 'tambah-jam-kerja']);
        Permission::create(['name' => 'edit-jam-kerja']);
        Permission::create(['name' => 'hapus-jam-kerja']);
        Permission::create(['name' => 'lihat-jam-kerja']);

        // Kelola Cuti
        Permission::create(['name' => 'tambah-cuti']);
        Permission::create(['name' => 'edit-cuti']);
        Permission::create(['name' => 'hapus-cuti']);
        Permission::create(['name' => 'lihat-cuti']);

        // Pengajuan cuti
        Permission::create(['name' => 'ajukan-cuti']);
        Permission::create(['name' => 'konfirmasi-cuti']);

        // Kelola Lembur
        Permission::create(['name' => 'tambah-lembur']);
        Permission::create(['name' => 'edit-lembur']);
        Permission::create(['name' => 'hapus-lembur']);
        Permission::create(['name' => 'lihat-lembur']);

        // Perintah lembur
        Permission::create(['name' => 'perintah-lembur']);
        Permission::create(['name' => 'konfirmasi-lembur']);

        // laporan
        Permission::create(['name' => 'lihat-laporan']);

        // Pengguna

        // Kelola Role
        Permission::create(['name' => 'tambah-role']);
        Permission::create(['name' => 'edit-role']);
        Permission::create(['name' => 'hapus-role']);
        Permission::create(['name' => 'lihat-role']);

        // Kelola Pengguna
        Permission::create(['name' => 'tambah-user']);
        Permission::create(['name' => 'edit-user']);
        Permission::create(['name' => 'hapus-user']);
        Permission::create(['name' => 'lihat-user']);


        // Insert User and Assign the Role

        // Admin
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('admin');

        Employee::create([
            'id_pegawai' => $admin->id,
            'nama'=> $admin->name,
            'user_id'=> $admin->id,
            'email' => $admin->email,
            'password' => Hash::make('password'),
        ]);

        // Kasir
        $kasir = User::create([
            'name' => 'kasir',
            'email' => 'kasir@email.com',
            'password' => Hash::make('password'),
        ]);
        $kasir->assignRole('kasir');
        Employee::create([
            'id_pegawai' => $kasir->id,
            'nama'=> $kasir->name,
            'user_id'=> $kasir->id,
            'email' => $kasir->email,
            'password' => Hash::make('password'),
        ]);

        // Koki
        $koki = User::create([
            'name' => 'koki',
            'email' => 'koki@email.com',
            'password' => Hash::make('password'),
        ]);
        $koki->assignRole('koki');
        Employee::create([
            'id_pegawai' => $koki->id,
            'nama'=> $koki->name,
            'user_id'=> $koki->id,
            'email' => $koki->email,
            'password' => Hash::make('password'),
        ]);

        // Pelayan
        $pelayan = User::create([
            'name' => 'pelayan',
            'email' => 'pelayan@email.com',
            'password' => Hash::make('password'),
        ]);
        $pelayan->assignRole('pelayan');
        Employee::create([
            'id_pegawai' => $pelayan->id,
            'nama'=> $pelayan->name,
            'user_id'=> $pelayan->id,
            'email' => $pelayan->email,
            'password' => Hash::make('password'),
        ]);

        // Owner
        $owner = User::create([
            'name' => 'owner',
            'email' => 'owner@email.com',
            'password' => Hash::make('password'),
        ]);
        $owner->assignRole('owner');

        // Pelanggan
        $pelanggan = User::create([
            'name' => 'pelanggan',
            'email' => 'pelanggan@email.com',
            'password' => Hash::make('password'),
        ]);
        $pelanggan->assignRole('pelanggan');


        Customer::create([
            'nama' => $pelanggan->name,
            'alamat' => 'Indonesia',
            'user_id' => $pelanggan->id,
        ]);

        ReservationSetting::create([
            'price' => 0,
            'period' => 1,
            'seat_deviation' => 3,
            'period_unit' => 'hours',
        ]);

        Worktime::create([
            'day' => 1,
            'start_time' => '10:00:00',
            'end_time' => '22:00:00' ,
            'rest_start_time' => null,
            'rest_end_time' => null,
            'rest_duration_min',
            'working_duration_min',
            'total_duration_min',
        ]);
    }
}
