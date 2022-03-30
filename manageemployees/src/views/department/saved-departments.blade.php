@extends('emp::tpl.employee_tpl')
@section('title') My Departments @endsection

@section('content')
<section class="container-fluid pt-4">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-auto"><h3 class="mb-0">My Departments:</h3></div>
			<div class="col-auto"><a href="{{ route('department.create') }}" class="btn btn-primary rounded-0">Add New</a></div>
		</div>
	</div>
</section>

<section class="container-fluid pt-2 pb-5">
	<div class="container">
		<div class="card card-body rounded-0 border-0 shadow-sm employee-table">
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">Department Name</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach($departments as $departments)
			    <tr>
			      <td class="pt-2 pb-2">
			      	{{ $departments->dep_name }}
			      </td>
			    </tr>
			    @endforeach
			  </tbody>
			</table>
		</div>
	</div>
</section>
@endsection