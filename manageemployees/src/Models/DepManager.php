<?php

namespace Jas\ManageEmployees\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepManager extends Model
{
    use HasFactory;

    public function employees() {
        return $this->belongsToMany(Employees::class);
    }

    public function departments() {
        return $this->belongsToMany(Department::class);
    }

    protected $table = 'dep_managers';

    protected $fillable = [
        'emp_id',
        'dep_id',
        'emp_start_date',
        'emp_end_date'
    ];
} 
