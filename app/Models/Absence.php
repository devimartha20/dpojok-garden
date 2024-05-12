<?php

namespace App\Models;

use App\Models\Admin\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'start_date',
        'end_date',
        'reason',
        'catatan',
        'status',
    ];

    public $dates = [
        'start_date',
        'end_date',
    ];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
