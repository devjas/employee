@extends('emp::tpl.employee_tpl')
@section('title') Add New Employee @endsection

@section('content')
<section class="container-fluid pt-5">
	<div class="container">
		<h3>Create New Department:</h3>
	</div>
</section>
<section class="container-fluid pt-2 pb-5">
	<div class="container">
		<div class="card card-body rounded-0 border-0 shadow-sm p-auto p-md-5">
			<form action="{{ route('department.store') }}" method="post">
				@csrf
				<div class="row mb-4">
					<div class="col-12">
						<button type="submit" class="btn btn-success rounded-0 border-0">Add Department</button>
						<a href="{{ route('department.index') }}" class="btn btn-danger rounded-0 border-0">Exit</a>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<label for="dep_name"><small class="text-dark">DEPARTMENT NAME</small></label>
						<input type="text" name="dep_name" class="form-control rounded-0 border-secondary" value="{{ old('dep_name') }}">
						@if($errors->has('dep_name'))
						<span class="text-danger fw-bold">{{ $errors->first('dep_name') }}</span>
						@endif
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection