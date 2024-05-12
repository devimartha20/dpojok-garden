<?php

namespace App\Models;

use App\Models\Admin\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'method',
        'date',
        'time',
        'type',
       'status',
    ];

    public $dates = [
        'date',
    ];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
