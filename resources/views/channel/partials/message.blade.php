@if (Session::get('errors'))
<div class="alert alert-danger" role="lert">
	<strong>Error(s) : </strong>
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach
	</ul>
</div>
@endif