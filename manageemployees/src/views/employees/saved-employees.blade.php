@extends('emp::tpl.employee_tpl')
@section('title') My Employees @endsection

@section('content')
<section class="container-fluid pt-4">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-auto"><h3 class="mb-0">My Employees:</h3></div>
			<div class="col-auto"><a href="{{ route('employee.create') }}" class="btn btn-primary rounded-0">Add New</a></div>
		</div>
		
	</div>
</section>

<section class="container-fluid pt-2 pb-5">
	<div class="container">
		<div class="card card-body rounded-0 border-0 shadow-sm employee-table">
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">Employee</th>
			      <th scope="col">Department</th>
			      <th scope="col">Title</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach($employees as $employee)
			    <tr>
			      <td class="pt-2 pb-2">
			      	<a href="{{ route('employee.show', $employee->id) }}" class="btn btn-dark btn-sm"><i class="fas fa-eye"></i></a> &nbsp;
			      	{{ $employee->emp_first_name }} {{ $employee->emp_last_name }}
			      </td>
			      <td class="pt-2 pb-2">
			      	{{ $employee->departments[0]->dep_name }}
			      	@if($employee->dep_managers) <i class="fas fa-user-tie text-primary" title="Manager"></i> @endif
			      </td>
			      <td class="pt-2 pb-2">{{ $employee->employee_titles[0]->emp_title }}</td>
			    </tr>
			    @endforeach
			  </tbody>
			</table>
		</div>
	</div>
</section>
@endsection