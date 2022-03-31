@extends('emp::tpl.employee_tpl')
@section('title') Add New Employee @endsection

@section('content')
<section class="container-fluid pt-4">
	<div class="container">
		<h3>Create New Employee:</h3>
	</div>
</section>
<section class="container-fluid pt-2 pb-5">
	<div class="container">
		<div class="card card-body rounded-0 border-0 shadow-sm p-auto p-md-5">
			<form action="{{ route('employee.store') }}" method="post">
				@csrf
				<div class="row mb-4">
					<div class="col-12">
						<button type="submit" class="btn btn-success rounded-0 border-0">Add Employee</button>
						<a href="{{ route('employee.index') }}" class="btn btn-danger rounded-0 border-0">Exit</a>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-md-6 mb-2">
						<label for="emp_title"><small class="text-dark">EMPLOYEE TITLE</small></label>
						<input type="text" name="emp_title" class="form-control rounded-0 border-secondary" value="{{ old('emp_title') }}">
						@if($errors->has('emp_title'))
						<span class="text-danger fw-bold">{{ $errors->first('emp_title') }}</span>
						@endif
					</div>
					<div class="col-12 col-md-6 mb-2">
						<label for="emp_dep"><small class="text-dark">DEPARTMENT</small></label>
						<select id="" name="emp_dep" class="form-control form-select border-secondary rounded-0">
							<option value="0">Choose a Department</option>
							@foreach($departments as $department)
							<option value="{{ $department->id }}">{{ $department->dep_name }}</option>
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
						<input type="date" name="emp_start_date" class="form-control rounded-0 border-secondary">
						@if($errors->has('emp_start_date'))
						<span class="text-danger fw-bold">{{ $errors->first('emp_start_date') }}</span>
						@endif
					</div>
					<div class="col-6 col-md-auto mb-2">
						<label for="emp_end_date"><small class="text-dark">END DATE</small></label>
						<input type="date" name="emp_end_date" class="form-control rounded-0 border-secondary">
						@if($errors->has('emp_end_date'))
						<span class="text-danger fw-bold">{{ $errors->first('emp_end_date') }}</span>
						@endif
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-md-6 mb-2">
						<label for="emp_first_name"><small class="text-dark">FIRST NAME</small></label>
						<input type="text" name="emp_first_name" class="form-control rounded-0 border-secondary" value="{{ old('emp_first_name') }}">
						@if($errors->has('emp_first_name'))
						<span class="text-danger fw-bold">{{ $errors->first('emp_first_name') }}</span>
						@endif
					</div>
					<div class="col-12 col-md-6 mb-2">
						<label for="emp_last_name"><small class="text-dark">LAST NAME</small></label>
						<input type="text" name="emp_last_name" class="form-control rounded-0 border-secondary" value="{{ old('emp_last_name') }}">
						@if($errors->has('emp_last_name'))
						<span class="text-danger fw-bold">{{ $errors->first('emp_last_name') }}</span>
						@endif
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-md-6 mb-2">
						<label for="emp_address_one"><small class="text-dark">ADDRESS 1</small></label>
						<input type="text" name="emp_address_one" class="form-control rounded-0 border-secondary" value="{{ old('emp_address_one') }}">
						@if($errors->has('emp_address_one'))
						<span class="text-danger fw-bold">{{ $errors->first('emp_address_one') }}</span>
						@endif
					</div>
					<div class="col-12 col-md-6 mb-2">
						<label for="emp_address_two"><small class="text-dark">ADDRESS 2</small></label>
						<input type="text" name="emp_address_two" class="form-control rounded-0 border-secondary" value="{{ old('emp_address_two') }}">
						@if($errors->has('emp_address_two'))
						<span class="text-danger fw-bold">{{ $errors->first('emp_address_two') }}</span>
						@endif
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-md-6 mb-2">
						<label for="emp_city"><small class="text-dark">CITY</small></label>
						<input type="text" name="emp_city" class="form-control rounded-0 border-secondary" value="{{ old('emp_city') }}">
						@if($errors->has('emp_city'))
						<span class="text-danger fw-bold">{{ $errors->first('emp_city') }}</span>
						@endif
					</div>
					<div class="col-6 col-md-4 mb-2">
						<label for="emp_state"><small class="text-dark">STATE</small></label>
						<select id="" name="emp_state" class="form-control form-select border-secondary rounded-0">
							<option value="0">Select State</option>
						  	<option value="AL" {{ old('emp_state') === 'AL' ? 'selected' : '' }}>Alabama</option>
							<option value="AK" {{ old('emp_state') === 'AK' ? 'selected' : '' }}>Alaska</option>
							<option value="AZ" {{ old('emp_state') === 'AZ' ? 'selected' : '' }}>Arizona</option>
							<option value="AR" {{ old('emp_state') === 'AR' ? 'selected' : '' }}>Arkansas</option>
							<option value="CA" {{ old('emp_state') === 'CA' ? 'selected' : '' }}>California</option>
							<option value="CO" {{ old('emp_state') === 'CO' ? 'selected' : '' }}>Colorado</option>
							<option value="CT" {{ old('emp_state') === 'CT' ? 'selected' : '' }}>Connecticut</option>
							<option value="DE" {{ old('emp_state') === 'DE' ? 'selected' : '' }}>Delaware</option>
							<option value="DC" {{ old('emp_state') === 'DC' ? 'selected' : '' }}>District Of Columbia</option>
							<option value="FL" {{ old('emp_state') === 'FL' ? 'selected' : '' }}>Florida</option>
							<option value="GA" {{ old('emp_state') === 'GA' ? 'selected' : '' }}>Georgia</option>
							<option value="HI" {{ old('emp_state') === 'HI' ? 'selected' : '' }}>Hawaii</option>
							<option value="ID" {{ old('emp_state') === 'ID' ? 'selected' : '' }}>Idaho</option>
							<option value="IL" {{ old('emp_state') === 'IL' ? 'selected' : '' }}>Illinois</option>
							<option value="IN" {{ old('emp_state') === 'IN' ? 'selected' : '' }}>Indiana</option>
							<option value="IA" {{ old('emp_state') === 'IA' ? 'selected' : '' }}>Iowa</option>
							<option value="KS" {{ old('emp_state') === 'KS' ? 'selected' : '' }}>Kansas</option>
							<option value="KY" {{ old('emp_state') === 'KY' ? 'selected' : '' }}>Kentucky</option>
							<option value="LA" {{ old('emp_state') === 'LA' ? 'selected' : '' }}>Louisiana</option>
							<option value="ME" {{ old('emp_state') === 'ME' ? 'selected' : '' }}>Maine</option>
							<option value="MD" {{ old('emp_state') === 'MD' ? 'selected' : '' }}>Maryland</option>
							<option value="MA" {{ old('emp_state') === 'MA' ? 'selected' : '' }}>Massachusetts</option>
							<option value="MI" {{ old('emp_state') === 'MI' ? 'selected' : '' }}>Michigan</option>
							<option value="MN" {{ old('emp_state') === 'MN' ? 'selected' : '' }}>Minnesota</option>
							<option value="MS" {{ old('emp_state') === 'MS' ? 'selected' : '' }}>Mississippi</option>
							<option value="MO" {{ old('emp_state') === 'MO' ? 'selected' : '' }}>Missouri</option>
							<option value="MT" {{ old('emp_state') === 'MT' ? 'selected' : '' }}>Montana</option>
							<option value="NE" {{ old('emp_state') === 'NE' ? 'selected' : '' }}>Nebraska</option>
							<option value="NV" {{ old('emp_state') === 'NV' ? 'selected' : '' }}>Nevada</option>
							<option value="NH" {{ old('emp_state') === 'NH' ? 'selected' : '' }}>New Hampshire</option>
							<option value="NJ" {{ old('emp_state') === 'NJ' ? 'selected' : '' }}>New Jersey</option>
							<option value="NM" {{ old('emp_state') === 'NM' ? 'selected' : '' }}>New Mexico</option>
							<option value="NY" {{ old('emp_state') === 'NY' ? 'selected' : '' }}>New York</option>
							<option value="NC" {{ old('emp_state') === 'NC' ? 'selected' : '' }}>North Carolina</option>
							<option value="ND" {{ old('emp_state') === 'ND' ? 'selected' : '' }}>North Dakota</option>
							<option value="OH" {{ old('emp_state') === 'OH' ? 'selected' : '' }}>Ohio</option>
							<option value="OK" {{ old('emp_state') === 'OK' ? 'selected' : '' }}>Oklahoma</option>
							<option value="OR" {{ old('emp_state') === 'OR' ? 'selected' : '' }}>Oregon</option>
							<option value="PA" {{ old('emp_state') === 'PA' ? 'selected' : '' }}>Pennsylvania</option>
							<option value="RI" {{ old('emp_state') === 'RI' ? 'selected' : '' }}>Rhode Island</option>
							<option value="SC" {{ old('emp_state') === 'SC' ? 'selected' : '' }}>South Carolina</option>
							<option value="SD" {{ old('emp_state') === 'SD' ? 'selected' : '' }}>South Dakota</option>
							<option value="TN" {{ old('emp_state') === 'TN' ? 'selected' : '' }}>Tennessee</option>
							<option value="TX" {{ old('emp_state') === 'TX' ? 'selected' : '' }}>Texas</option>
							<option value="UT" {{ old('emp_state') === 'UT' ? 'selected' : '' }}>Utah</option>
							<option value="VT" {{ old('emp_state') === 'VT' ? 'selected' : '' }}>Vermont</option>
							<option value="VA" {{ old('emp_state') === 'VA' ? 'selected' : '' }}>Virginia</option>
							<option value="WA" {{ old('emp_state') === 'WA' ? 'selected' : '' }}>Washington</option>
							<option value="WV" {{ old('emp_state') === 'WV' ? 'selected' : '' }}>West Virginia</option>
							<option value="WI" {{ old('emp_state') === 'WI' ? 'selected' : '' }}>Wisconsin</option>
							<option value="WY" {{ old('emp_state') === 'WY' ? 'selected' : '' }}>Wyoming</option>
						</select>
						@if($errors->has('emp_state'))
						<span class="text-danger fw-bold">{{ $errors->first('emp_state') }}</span>
						@endif
					</div>
					<div class="col-6 col-md-2 mb-2">
						<label for="emp_zip"><i><small class="text-dark">ZIP CODE</small></label>
						<input type="text" name="emp_zip" class="form-control rounded-0 border-secondary" value="{{ old('emp_zip') }}">
						@if($errors->has('emp_zip'))
						<span class="text-danger fw-bold">{{ $errors->first('emp_zip') }}</span>
						@endif
					</div>
				</div>

				<div class="row">
					<div class="col-12 col-md-6 mb-2">
						<label for="emp_phone"><small class="text-dark">PHONE</small></label>
						<input type="text" name="emp_phone" class="form-control rounded-0 border-secondary" value="{{ old('emp_phone') }}">
						@if($errors->has('emp_phone'))
						<span class="text-danger fw-bold">{{ $errors->first('emp_phone') }}</span>
						@endif
					</div>
					<div class="col-12 col-md-6 mb-2">
						<label for="emp_email"><small class="text-dark">E-MAIL</small></label>
						<input type="text" name="emp_email" class="form-control rounded-0 border-secondary" value="{{ old('emp_email') }}">
						@if($errors->has('emp_email'))
						<span class="text-danger fw-bold">{{ $errors->first('emp_email') }}</span>
						@endif
					</div>
				</div>

				<div class="row mt-3">
					<div class="col-12">
						<div class="form-check form-switch">
						  <input class="form-check-input" type="checkbox" role="switch" id="employeeManager" name="emp_is_manager" value="1">
						  <label class="form-check-label fw-bold" for="employeeManager">Make this employee a department manager</label>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection
