@extends('emp::tpl.employee_tpl')
@section('title') {{ $employee->emp_first_name }} {{ $employee->emp_last_name }} @endsection

@section('content')
<section class="container-fluid pt-4">
	<div class="container">
		<h3>Editting: {{ $employee->emp_first_name }} {{ $employee->emp_last_name }}</h3>
	</div>
</section>
<section class="container-fluid pt-2 pb-5">
	<div class="container">
		<div class="card card-body rounded-0 border-0 shadow-sm p-auto p-md-5">
			<form action="{{ route('employee.update' , $employee->id) }}" method="post">
				@csrf
				@method('PUT')
				<div class="row mb-4">
					<div class="col-12">
						<button type="submit" class="btn btn-success rounded-0 border-0">Update Employee</button>
						<a href="{{ route('employee.index') }}" class="btn btn-danger rounded-0 border-0">Exit</a>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-md-6 mb-2">
						<label for="emp_title"><small class="text-dark">EMPLOYEE TITLE</small></label>
						<input type="text" name="emp_title" class="form-control rounded-0 border-secondary" value="{{ $employee->employee_titles[0]->emp_title }}">
						@if($errors->has('title'))
						<span class="text-danger fw-bold">{{ $errors->first('title') }}</span>
						@endif
					</div>
					<div class="col-12 col-md-6 mb-2">
						<label for="emp_dep"><small class="text-dark">DEPARTMENT</small></label>
						<select id="" name="emp_dep" class="form-control form-select border-secondary rounded-0">
							<option value="0">Choose a Department</option>
							@foreach($departments as $department)
							<option value="{{ $department->id }}" @if($department->id == $dep_emp->dep_id) selected @endif>{{ $department->dep_name }}</option>
							@endforeach
						</select>
						@if($errors->has('emp_dep'))
						<span class="text-danger fw-bold">{{ $errors->first('emp_dep') }}</span>
						@endif
					</div>
				</div>
				<div class="row">
					<div class="col-6 col-md-auto mb-2">
						<label for="emp_start_date"><small class="text-dark">START DATE</small></label>
						<input type="date" name="emp_start_date" class="form-control rounded-0 border-secondary" value="{{ $employee->employee_titles[0]->emp_start_date->format('Y-m-d') }}">
						@if($errors->has('emp_start_date'))
						<span class="text-danger fw-bold">{{ $errors->first('emp_start_date') }}</span>
						@endif
					</div>
					<div class="col-6 col-md-auto mb-2">
						<label for="emp_end_date"><small class="text-dark">END DATE</small></label>
						<input type="date" name="emp_end_date" class="form-control rounded-0 border-secondary" value="{{  $employee->employee_titles[0]->emp_end_date ? $employee->employee_titles[0]->emp_end_date->format('Y-m-d') : '' }}">
						@if($errors->has('emp_end_date'))
						<span class="text-danger fw-bold">{{ $errors->first('emp_end_date') }}</span>
						@endif
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-md-6 mb-2">
						<label for="emp_first_name"><small class="text-dark">FIRST NAME</small></label>
						<input type="text" name="emp_first_name" class="form-control rounded-0 border-secondary" value="{{ $employee->emp_first_name }}">
						@if($errors->has('emp_first_name'))
						<span class="text-danger fw-bold">{{ $errors->first('emp_first_name') }}</span>
						@endif
					</div>
					<div class="col-12 col-md-6 mb-2">
						<label for="emp_last_name"><small class="text-dark">LAST NAME</small></label>
						<input type="text" name="emp_last_name" class="form-control rounded-0 border-secondary" value="{{ $employee->emp_last_name }}">
						@if($errors->has('emp_last_name'))
						<span class="text-danger fw-bold">{{ $errors->first('emp_last_name') }}</span>
						@endif
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-md-6 mb-2">
						<label for="emp_address_one"><small class="text-dark">ADDRESS 1</small></label>
						<input type="text" name="emp_address_one" class="form-control rounded-0 border-secondary" value="{{ $employee->emp_address_one }}">
						@if($errors->has('emp_address_one'))
						<span class="text-danger fw-bold">{{ $errors->first('emp_address_one') }}</span>
						@endif
					</div>
					<div class="col-12 col-md-6 mb-2">
						<label for="emp_address_two"><small class="text-dark">ADDRESS 2</small></label>
						<input type="text" name="emp_address_two" class="form-control rounded-0 border-secondary" value="{{ $employee->emp_address_two }}">
						@if($errors->has('emp_address_two'))
						<span class="text-danger fw-bold">{{ $errors->first('emp_address_two') }}</span>
						@endif
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-md-6 mb-2">
						<label for="emp_city"><small class="text-dark">CITY</small></label>
						<input type="text" name="emp_city" class="form-control rounded-0 border-secondary" value="{{ $employee->emp_city }}">
						@if($errors->has('emp_city'))
						<span class="text-danger fw-bold">{{ $errors->first('emp_city') }}</span>
						@endif
					</div>
					<div class="col-6 col-md-4 mb-2">
						<label for="emp_state"><small class="text-dark">STATE</small></label>
						<select id="" name="emp_state" class="form-control form-select border-secondary rounded-0">
							<option value="0">Select State</option>
						  	<option value="AL" @if($employee->emp_state == "AL") selected @endif>Alabama</option>
							<option value="AK" @if($employee->emp_state == "AK") selected @endif>Alaska</option>
							<option value="AZ" @if($employee->emp_state == "AZ") selected @endif>Arizona</option>
							<option value="AR" @if($employee->emp_state == "AR") selected @endif>Arkansas</option>
							<option value="CA" @if($employee->emp_state == "CA") selected @endif>California</option>
							<option value="CO" @if($employee->emp_state == "CO") selected @endif>Colorado</option>
							<option value="CT" @if($employee->emp_state == "CT") selected @endif>Connecticut</option>
							<option value="DE" @if($employee->emp_state == "DE") selected @endif>Delaware</option>
							<option value="DC" @if($employee->emp_state == "DC") selected @endif>District Of Columbia</option>
							<option value="FL" @if($employee->emp_state == "FL") selected @endif>Florida</option>
							<option value="GA" @if($employee->emp_state == "GA") selected @endif>Georgia</option>
							<option value="HI" @if($employee->emp_state == "HI") selected @endif>Hawaii</option>
							<option value="ID" @if($employee->emp_state == "ID") selected @endif>Idaho</option>
							<option value="IL" @if($employee->emp_state == "IL") selected @endif>Illinois</option>
							<option value="IN" @if($employee->emp_state == "IN") selected @endif>Indiana</option>
							<option value="IA" @if($employee->emp_state == "IA") selected @endif>Iowa</option>
							<option value="KS" @if($employee->emp_state == "KS") selected @endif>Kansas</option>
							<option value="KY" @if($employee->emp_state == "KY") selected @endif>Kentucky</option>
							<option value="LA" @if($employee->emp_state == "LA") selected @endif>Louisiana</option>
							<option value="ME" @if($employee->emp_state == "ME") selected @endif>Maine</option>
							<option value="MD" @if($employee->emp_state == "MD") selected @endif>Maryland</option>
							<option value="MA" @if($employee->emp_state == "MA") selected @endif>Massachusetts</option>
							<option value="MI" @if($employee->emp_state == "MI") selected @endif>Michigan</option>
							<option value="MN" @if($employee->emp_state == "MN") selected @endif>Minnesota</option>
							<option value="MS" @if($employee->emp_state == "MS") selected @endif>Mississippi</option>
							<option value="MO" @if($employee->emp_state == "MO") selected @endif>Missouri</option>
							<option value="MT" @if($employee->emp_state == "MT") selected @endif>Montana</option>
							<option value="NE" @if($employee->emp_state == "NE") selected @endif>Nebraska</option>
							<option value="NV" @if($employee->emp_state == "NV") selected @endif>Nevada</option>
							<option value="NH" @if($employee->emp_state == "NH") selected @endif>New Hampshire</option>
							<option value="NJ" @if($employee->emp_state == "NJ") selected @endif>New Jersey</option>
							<option value="NM" @if($employee->emp_state == "NM") selected @endif>New Mexico</option>
							<option value="NY" @if($employee->emp_state == "NY") selected @endif>New York</option>
							<option value="NC" @if($employee->emp_state == "NC") selected @endif>North Carolina</option>
							<option value="ND" @if($employee->emp_state == "ND") selected @endif}>North Dakota</option>
							<option value="OH" @if($employee->emp_state == "OH") selected @endif>Ohio</option>
							<option value="OK" @if($employee->emp_state == "OK") selected @endif>Oklahoma</option>
							<option value="OR" @if($employee->emp_state == "OR") selected @endif>Oregon</option>
							<option value="PA" @if($employee->emp_state == "PA") selected @endif>Pennsylvania</option>
							<option value="RI" @if($employee->emp_state == "RI") selected @endif>Rhode Island</option>
							<option value="SC" @if($employee->emp_state == "SC") selected @endif>South Carolina</option>
							<option value="SD" @if($employee->emp_state == "SD") selected @endif>South Dakota</option>
							<option value="TN" @if($employee->emp_state == "TN") selected @endif>Tennessee</option>
							<option value="TX" @if($employee->emp_state == "TX") selected @endif>Texas</option>
							<option value="UT" @if($employee->emp_state == "UT") selected @endif>Utah</option>
							<option value="VT" @if($employee->emp_state == "VT") selected @endif>Vermont</option>
							<option value="VA" @if($employee->emp_state == "VA") selected @endif>Virginia</option>
							<option value="WA" @if($employee->emp_state == "WA") selected @endif>Washington</option>
							<option value="WV" @if($employee->emp_state == "WV") selected @endif>West Virginia</option>
							<option value="WI" @if($employee->emp_state == "WI") selected @endif>Wisconsin</option>
							<option value="WY" @if($employee->emp_state == "WY") selected @endif>Wyoming</option>
						</select>
						@if($errors->has('emp_state'))
						<span class="text-danger fw-bold">{{ $errors->first('emp_state') }}</span>
						@endif
					</div>
					<div class="col-6 col-md-2 mb-2">
						<label for="emp_zip"><i><small class="text-dark">ZIP CODE</small></label>
						<input type="text" name="emp_zip" class="form-control rounded-0 border-secondary" value="{{ $employee->emp_zip }}">
						@if($errors->has('emp_zip'))
						<span class="text-danger fw-bold">{{ $errors->first('emp_zip') }}</span>
						@endif
					</div>
				</div>

				<div class="row">
					<div class="col-12 col-md-6 mb-2">
						<label for="emp_phone"><small class="text-dark">PHONE</small></label>
						<input type="text" name="emp_phone" class="form-control rounded-0 border-secondary" value="{{ $employee->emp_phone }}">
						@if($errors->has('emp_phone'))
						<span class="text-danger fw-bold">{{ $errors->first('emp_phone') }}</span>
						@endif
					</div>
					<div class="col-12 col-md-6 mb-2">
						<label for="emp_email"><small class="text-dark">E-MAIL</small></label>
						<input type="text" name="emp_email" class="form-control rounded-0 border-secondary" value="{{ $employee->emp_email }}">
						@if($errors->has('emp_email'))
						<span class="text-danger fw-bold">{{ $errors->first('emp_email') }}</span>
						@endif
					</div>
				</div>

				<div class="row mt-3">
					<div class="col-12">
						<div class="form-check form-switch">
						  <input class="form-check-input" type="checkbox" role="switch" id="employeeManager" name="emp_is_manager" value="1" @if($employee->dep_managers) checked @endif>
						  <label class="form-check-label fw-bold" for="employeeManager">Make this employee a department manager</label>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection