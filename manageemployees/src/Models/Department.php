<?php

namespace Jas\ManageEmployees\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function dep_emps() {
        return $this->belongsTo(DepEmp::class, 'dep_emps', 'dep_id', 'emp_id');
    }

    public function employees() {
        return $this->belongsToMany(Employee::class, 'dep_emps', 'dep_id', 'emp_id');
    }

    public function dep_managers() {
        return $this->belongsTo(DepManager::class, 'dep_id');
    }

    protected $table = 'departments';

    protected $fillable = [
        'dep_name',
    ];
}
