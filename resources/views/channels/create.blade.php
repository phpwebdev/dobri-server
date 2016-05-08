@extends('layouts.app')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('main-content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Channel / Create</h3>
			</div>
			<div class="box-body table-responsive">
				
				{{Form::open(['route'=>['channels.store'],'method'=>'POST'])}}
				@include('channels.partials.fields')
				<div class="well well-sm">
					<button type="submit" class="btn btn-primary">Save</button>
					<a class="btn btn-link pull-right" href="{{ route('channels.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
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