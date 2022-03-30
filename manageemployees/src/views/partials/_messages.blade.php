@if(Session::has('success'))
<div class="container-fluid pt-4">
	<div class="container"><div class="alert alert-success">{{ Session::get('success') }}</div>
</div>
@elseif(Session::has('error'))
<div class="container-fluid pt-4">
	<div class="container"><div class="alert alert-danger">{{ Session::get('error') }}</div>
</div>
@endif
