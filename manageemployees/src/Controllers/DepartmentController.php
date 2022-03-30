<?php

namespace Jas\ManageEmployees\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Jas\ManageEmployees\Models\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        return View::make('emp::department.saved-departments', ['departments' => $departments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('emp::department.create-department');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [ 'dep_name.required' => 'Department name is required' ];

        $validator = Validator::make($request->all(), [
            'dep_name' => 'required'
        ], $message);

        if($validator->fails()) {
            Session::flash('error', 'Please fill out all required fields!');
            return redirect()->back()->withErrors($validator);
        }

        $department_exists = Department::where('dep_name', $request->dep_name)->exists();

        if($department_exists) {
            Session::flash('error', 'Department with that name already exists.');
            return back()->withInput();
        }

        $validated = $validator->validated();

        Department::create($validated);

        Session::flash('success', 'Department add successfully!');
        return redirect()->route('department.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
