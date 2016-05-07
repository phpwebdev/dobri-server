{{csrf_field() }}
{{Form::hidden('id',isset($server->id)?$server->id:\Input::old("id"))}}
<div class="form-group @if($errors->has('first_name')) has-error @endif">
	{{Form::label('server_name','Server name')}}
	{{Form::text('server_name',isset($server->server_name)?$server->server_name:\Input::old("server_name"),['class'=>'form-control','id'=>'server_name-field','placeholder'=>'Fill server name '])}}
	@if($errors->has("server_name"))
	<span class="help-block">{{ $errors->first("server_name") }}</span>
	@endif
</div>
<div class="form-group @if($errors->has('server_ip')) has-error @endif">
	{{Form::label('server_ip','Server IP')}}
	{{Form::text('server_ip',isset($server->server_ip)?$server->server_ip:\Input::old("server_ip"),['class'=>'form-control','id'=>'server_ip-field','placeholder'=>'Fill server IP'])}}
	@if($errors->has("server_ip"))
	<span class="help-block">{{ $errors->first("server_ip") }}</span>
	@endif
</div>

<div class="form-group @if($errors->has('server_port')) has-error @endif">	
	{{Form::label('server_port','Server port')}}
	{{Form::text('server_port',isset($server->server_port)?$server->server_port:\Input::old("server_port"),['class'=>'form-control','id'=>'server_port-field','placeholder'=>'Fill Your server_port'])}}
	@if($errors->has("server_port"))
	<span class="help-block">{{ $errors->first("server_port") }}</span>
	@endif
</div>

<div class="form-group @if($errors->has('nvenc_h264')) has-error @endif">
	<div class="checkbox">
		<label>
			{{ Form::hidden('nvenc_h264', false) }}
			{{ Form::checkbox('nvenc_h264', 1, isset($server->nvenc_h264)?$server->nvenc_h264:null, ['class' => 'field','id'=>'server_port-field']) }}
			nvenc_h264
		</label>
		@if($errors->has("nvenc_h264"))
			<span class="help-block">{{ $errors->first("nvenc_h264") }}</span>
		@endif
	</div>
</div>

<div class="form-group @if($errors->has('nvenc_hevc')) has-error @endif">
	<div class="checkbox">
		<label>
			{{ Form::hidden('nvenc_hevc', false) }}
			{{ Form::checkbox('nvenc_hevc', 1, isset($server->nvenc_hevc)?$server->nvenc_hevc:null, ['class' => 'field','id'=>'snvenc_hevc-field']) }}
			nvenc_hevc
		</label>
		@if($errors->has("nvenc_hevc"))
			<span class="help-block">{{ $errors->first("nvenc_hevc") }}</span>
		@endif
	</div>
</div>

<div class="form-group @if($errors->has('x264')) has-error @endif">
	<div class="checkbox">
		<label>
			{{ Form::hidden('x264', false) }}
			{{ Form::checkbox('x264', 1, isset($server->x264)?$server->x264:null, ['class' => 'field','id'=>'x264-field']) }}
			x264
		</label>
		@if($errors->has("x264"))
			<span class="help-block">{{ $errors->first("x264") }}</span>
		@endif
	</div>
</div>
<div class="form-group @if($errors->has('x265')) has-error @endif">
	<div class="checkbox">
		<label>
			{{ Form::hidden('x265', false) }}
			{{ Form::checkbox('x265', 1, isset($server->x265)?$server->x265:null, ['class' => 'field','id'=>'x265-field']) }}
			x265
		</label>
		@if($errors->has("x265"))
			<span class="help-block">{{ $errors->first("x265") }}</span>
		@endif
	</div>
</div>

<div class="form-group @if($errors->has('enabled')) has-error @endif">
	<div class="checkbox">
		<label>
			{{ Form::hidden('enabled', false) }}
			{{ Form::checkbox('enabled', 1, isset($server->enabled)?$server->enabled:null, ['class' => 'field','id'=>'enabled-field']) }}
			enabled
		</label>
		@if($errors->has("enabled"))
			<span class="help-block">{{ $errors->first("enabled") }}</span>
		@endif
	</div>
</div>
{{--
<div class="form-group @if($errors->has('bio')) has-error @endif">
	{{Form::label('bio','Bio')}}
	{{Form::textarea('bio',isset($server->bio)?$server->bio:\Input::old("bio"),['class'=>'form-control','id'=>'bio-field','placeholder'=>'Fill Your bio'])}}
	@if($errors->has("bio"))
	<span class="help-block">{{ $errors->first("bio") }}</span>
	@endif
</div>
--}}