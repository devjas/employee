@extends('emp::tpl.employee_tpl')
@section('title') Employee Preview @endsection

@section('content')
<section class="container-fluid pt-4">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-auto">
				<h3 class="mb-0">
					{{ $employee->emp_first_name }} {{ $employee->emp_last_name }}
					@if($employee->dep_managers)
						<i class="fas fa-user-tie text-primary" title="Manager"></i>
					@endif 
				</h3>
				<p class="mb-0">{{ $employee->employee_titles[0]->emp_title }}</p>
			</div>
			<div class="col-auto">
				<a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-primary rounded-0"><i class="fas fa-pen"></i> Edit</a>&nbsp; &nbsp;
				<a href="{{ route('employee.index') }}">EXIT</a>
			</div>
		</div>
	</div>
</section>

<section class="container-fluid pt-2 pb-5">
	<div class="container">
		<div class="card card-body rounded-0 border-0 shadow-sm employee-table">
			<div class="row">
				<div class="col-12">
					<ul class="list-group list-group-flush">
					  <li class="list-group-item">
					  	<address class="mb-0">
					  		<p class="mb-1 lh-sm"><i><small class="fw-bold text-secondary">ADDRESS:</small></i></p>
					  		<p class="mb-0 lh-sm">{{ $employee->emp_address_one }}</p>
					  		<p class="mb-0 lh-sm">{{ $employee->emp_address_two ? $employee->emp_address_two : "" }}</p>
					  		<p class="mb-0 lh-sm">{{ $employee->emp_city}}, {{ $employee->emp_state }} {{ $employee->emp_zip }}</p>
					  	</address>
					  </li>
					  <li class="list-group-item">
					  	<p class="mb-1 lh-sm"><i><small class="fw-bold text-secondary">PHONE:</small></i></p>
					  	<p class="mb-0 lh-sm">{{ $employee->emp_phone }}</p>
					  </li>
					  <li class="list-group-item">
					  	<p class="mb-1 lh-sm"><i><small class="fw-bold text-secondary">E-MAIL:</small></i></p>
					  	<p class="mb-0 lh-sm">{{ $employee->emp_email }}</p>
					  </li>
					  <li class="list-group-item">
					  	<p class="mb-1 lh-sm"><i><small class="fw-bold text-secondary">CREATED ON:</small></i></p>
					  	<p class="mb-0 lh-sm">{{ $employee->created_at->format('m/d/Y') }}</p>
					  </li>
					  <li class="list-group-item">
					  	<p class="mb-1 lh-sm"><i><small class="fw-bold text-secondary">CURRENT DEPARTMENT:</small></i></p>
					  	<p class="mb-0 lh-sm">{{ $employee->departments[0]->dep_name }}</p>
					  </li>
					  <li class="list-group-item">
					  	<div class="row">
					  		<div class="col-auto">
					  			<p class="mb-1 lh-sm"><i><small class="fw-bold text-secondary">START DATE:</small></i></p>
					  			<p class="mb-0 lh-sm">{{ $employee->employee_titles[0]->emp_start_date->format('m/d/Y') }}</p>
					  		</div>
					  		@if($employee->employee_titles[0]->emp_end_date)
					  			<div class="col-auto">
						  			<p class="mb-1 lh-sm"><i><small class="fw-bold text-secondary">END DATE:</small></i></p>
						  			<p class="mb-0 lh-sm">{{ $employee->employee_titles[0]->emp_end_date->format('m/d/Y') }}</p>
						  		</div>
					  		@endif
					  	</div>
					  </li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-12 text-end">
					<form action="{{ route('employee.destroy', $employee->id) }}" method="post">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-link text-danger" onclick="if(confirm('Do you really want to delete this employee?')) return true; else { return false; }">Delete</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection