<?php

namespace Jas\ManageEmployees\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeTitle extends Model
{
    use HasFactory;

    public function employees() {
        return $this->belongsTo(Employee::class);
    }

    protected $casts = [
        'emp_start_date' => 'datetime:m/d/Y',
        'emp_end_date' => 'datetime:m/d/Y',
    ];

    protected $table = 'employee_titles';

    protected $fillable = [
        'emp_id',
        'emp_title',
        'emp_start_date',
        'emp_end_date',
    ];
}
