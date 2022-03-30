<?php

namespace Jas\ManageEmployees\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Jas\ManageEmployees\Models\Department;
use Jas\ManageEmployees\Models\Employee;
use Jas\ManageEmployees\Models\DepManager;
use Jas\ManageEmployees\Models\DepEmp;
use Jas\ManageEmployees\Models\EmployeeTitle;
use DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $employees = DepEmp::join('employees', 'employees.id','=','dep_emps.emp_id')
        // ->join('departments', 'departments.id', '=', 'dep_emps.dep_id')->get();

        $employees = Employee::select('*')->get();
        return View::make('emp::employees.saved-employees', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all(); // Getting all departments
        return View::make('emp::employees.create-employee', ['departments' => $departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'emp_title' => 'required',
            'emp_dep' => 'required|not_in:0',
            'emp_start_date' => 'required',
            'emp_first_name' => 'required',
            'emp_last_name' => 'required',
            'emp_address_one' => 'required',
            'emp_city' => 'required',
            'emp_state' => 'required|not_in:0',
            'emp_zip' => 'required',
        ], $this->validate_employee());

        if($validator->fails()) {
            Session::flash('error', 'Please fill out all required fields.');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $employee_exists = Employee::where([
            'emp_first_name' => $request->emp_first_name,
            'emp_last_name' => $request->emp_last_name,
        ])->exists();

        if(!$employee_exists) {

            $employee = new Employee;
            // $employee->title = $request->title;
            $employee->emp_first_name = $request->emp_first_name;
            $employee->emp_last_name = $request->emp_last_name;
            $employee->emp_address_one = $request->emp_address_one;
            $employee->emp_address_two = $request->emp_address_two;
            $employee->emp_city = $request->emp_city;
            $employee->emp_state = $request->emp_state;
            $employee->emp_zip = $request->emp_zip;
            $employee->emp_phone = $request->emp_phone;
            $employee->emp_email = $request->emp_email;
            $employee->save();

        } else {

            Session::flash('error', 'This employee already exists');
            return back()->withInput();

        }
        
        if($request->emp_is_manager == 1) {

            $employee->dep_managers()->create(['emp_id' => $employee->id, 'dep_id' => $request->emp_dep,]);

        }

        $employee->dep_emps()->create(['emp_id' => $employee->id, 'dep_id' => $request->emp_dep]);

        $employee->employee_titles()->create([
            'emp_id' => $employee->id,
            'emp_title' => $request->emp_title,
            'emp_start_date' => $request->emp_start_date,
            'emp_end_date' => $request->emp_end_date
        ]);

        Session::flash('success', 'Employee saved successfully!');
        return redirect()->route('employee.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return View::make('emp::employees.show-employee', ['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $dep_emp = DepEmp::where('emp_id', $id)->first(); // Matches departments id with dep_emps table dep_id
        $departments = Department::all();
        return View::make('emp::employees.edit-employee', [
            'employee' => $employee,
            'departments' => $departments,
            'dep_emp' => $dep_emp
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'emp_title' => 'required',
            'emp_dep' => 'required|not_in:0',
            'emp_start_date' => 'required',
            'emp_first_name' => 'required',
            'emp_last_name' => 'required',
            'emp_address_one' => 'required',
            'emp_city' => 'required',
            'emp_state' => 'required|not_in:0',
            'emp_zip' => 'required',
        ], $this->validate_employee());

        if($validator->fails()) {
            Session::flash('error', 'Please fill out all required fields.');
            return redirect()->back()->withErrors($validator);
        }

        $update_employee = Employee::find($id);

        $update_employee->update([
            'emp_first_name' => $request->emp_first_name,
            'emp_last_name' => $request->emp_last_name,
            'emp_address_one' => $request->emp_address_one,
            'emp_address_two' => $request->emp_address_two,
            'emp_city' => $request->emp_city,
            'emp_state' => $request->emp_state,
            'emp_zip' => $request->emp_zip,
            'emp_phone' => $request->emp_phone,
            'emp_email' => $request->emp_email,
        ]);
        

        $update_employee->dep_emps()->update(['dep_id' => $request->emp_dep]);

        $update_employee->dep_managers()->update(['dep_id' => $request->emp_dep]);

        $update_employee->employee_titles()->update([
            'emp_title' => $request->emp_title,
            'emp_start_date' => $request->emp_start_date,
            'emp_end_date' => $request->emp_end_date,
        ]);

        $manager = DepManager::where('emp_id', $id)->exists();

        if($request->emp_is_manager) {
            if(!$manager) {
                $update_employee->dep_managers()->create(['emp_id' => $id, 'dep_id' => $request->emp_dep]);
            }
        } else {
            $update_employee->dep_managers()->where('emp_id', $id)->delete();
        }

        Session::flash('success', 'Employee updated successfully!');
        return redirect()->route('employee.index');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

        $employee->delete();

        Session::flash('success', $employee->emp_first_name . " " . $employee->emp_last_name . ' successfully deleted.');

        return redirect()->route('employee.index');
    }

    public function validate_employee() {
        return [
            'emp_title.required' => 'Employee title is required',
            'emp_dep.not_in:0' => 'Please choose a department',
            'emp_start_date.required' => 'Start date is required',
            'emp_first_name.required' => 'First Name is required',
            'emp_last_name.required' => 'Last name is required',
            'emp_address_one.required' => 'Address is required',
            'emp_city.required' => 'City is required',
            'emp_state.required' => 'State is required',
            'emp_state.not_in:0' => 'State is required',
            'emp_zip.required' => 'Zip Code is required',
        ];
    }
}
