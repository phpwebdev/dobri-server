<div class="box-tools">
{{ Form::open(array('url' => 'channels','method'=>'GET','class'=>'form-inline')) }}
	<div class="input-group" style="width: 150px;">
		<input type="text" name="query" class="form-control input-sm pull-right" placeholder="Search text" value="{{isset($query)?$query:''}}">
		<div class="input-group-btn">
			<button  type="submit" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
		</div>
	</div>
{{Form::close()}}	
</div>