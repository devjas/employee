<?php

namespace Jas\ManageEmployees\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function dep_emps() {
        return $this->hasOne(DepEmp::class,'emp_id');
    }

    public function departments() {
        return $this->belongsToMany(Department::class, 'dep_emps', 'emp_id', 'dep_id');
    }

    public function employee_titles() {
        return $this->hasMany(EmployeeTitle::class, 'emp_id');
    }

    public function dep_managers() {
        return $this->hasOne(DepManager::class, 'emp_id');
    }


    // public function getCreatedAtAttribute($date) {
    //     return $this->attributes = \Carbon\Carbon::parse
    // }

    protected $casts = [
        'created_at' => 'datetime:m/d/Y',
    ];

    protected $table = 'employees';

    protected $fillable = [
        'emp_title',
        'emp_dep',
        'emp_start_date',
        'emp_end_date',
        'emp_first_name',
        'emp_last_name',
        'emp_address_one',
        'emp_address_two',
        'emp_city',
        'emp_state',
        'emp_zip',
        'emp_phone',
        'emp_email',
        'emp_is_manager',
    ];
}
