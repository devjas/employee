<?php

namespace Jas\ManageEmployees\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepEmp extends Model
{
    use HasFactory;

    public function departments() {
        return $this->belongsTo(Department::class, 'dep_id');
    }

    public function employees() {
        return $this->belongsTo(Employee::class);
    }

    protected $table = 'dep_emps';

    protected $fillable = [
        'emp_id',
        'dep_id',
    ];
}
