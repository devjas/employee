<?php

use Illuminate\Support\Facades\Route;
use Jas\ManageEmployees\Controllers\EmployeeController;
use Jas\ManageEmployees\Controllers\DepartmentController;

Route::group(['middleware' => 'web'], function() {
	Route::resource('/employee', EmployeeController::class);
	Route::resource('/department', DepartmentController::class);
});
