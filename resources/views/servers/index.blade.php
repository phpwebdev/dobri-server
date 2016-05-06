@extends('layouts.app')
@section('main-content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Responsive Hover Table</h3>
				@include('servers.partials.searchform')
			</div>
			<div class="box-body table-responsive">
				@include('servers.partials.table')
			</div>
			<div class="box-footer clearfix ">
            {!! $servers->appends(\Input::except('page'))->render() !!}      
            </div>
		</div>
	</div>
</div>
@endsection