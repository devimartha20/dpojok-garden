<?php

namespace App\Models\Admin;

use App\Models\Absence;
use App\Models\Attendance;
use App\Models\Leave;
use App\Models\User;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'id_pegawai',
        'nama',
        'alamat',
        'telepon',
        'user_id',
    ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attendance(){
        return $this->hasMany(Attendance::class);
    }
    public function absence(){
        return $this->hasMany(Absence::class);
    }
    public function leave(){
        return $this->hasMany(Leave::class);
    }
}
