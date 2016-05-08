@extends('layouts.app')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('main-content')
<div class="row">
	<div class="col-xs-12">	
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">User / Create</h3>
			</div>
			<div class="box-body table-responsive">
				<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">	
				{{Form::open(['route'=>['users.store'],'method'=>'POST'])}}
				@include('users.partials.fields')
				<div class="well well-sm">
					<button type="submit" class="btn btn-primary">Save</button>
					<a class="btn btn-link pull-right" href="{{ route('users.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
				</div>
				</div>
			</form>
		</div>
		
	</div>
</div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
<script>
$('.date-picker').datepicker({
});
</script>
@endsection