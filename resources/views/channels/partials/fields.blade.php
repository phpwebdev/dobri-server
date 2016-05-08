{{csrf_field() }}
{{Form::hidden('id',isset($channel->id)?$channel->id:\Input::old("id"))}}
<div class="form-group @if($errors->has('channel_name')) has-error @endif">
	{{Form::label('channel_name','Channel name')}}
	{{Form::text('channel_name',isset($channel->channel_name)?$channel->channel_name:\Input::old("channel_name"),['class'=>'form-control','id'=>'channel_name-field','placeholder'=>'Fill channel_name'])}}
	@if($errors->has("channel_name"))
	<span class="help-block">{{ $errors->first("channel_name") }}</span>
	@endif
</div>


<div class="form-group @if($errors->has('server_id')) has-error @endif">
	{{Form::label('server_id','Server name')}}
	{{Form::select('server_id',$servers,isset($channel->server_id)?$channel->server_id:\Input::old("server_id"),['class'=>'form-control','id'=>'server_id-field','placeholder'=>'Pick a server...'])}}
	@if($errors->has("server_id"))
	<span class="help-block">{{ $errors->first("server_id") }}</span>
	@endif
</div>
<div class="form-group @if($errors->has('source')) has-error @endif">	
	{{Form::label('source','source')}}
	{{Form::text('source',isset($channel->source)?$channel->source:\Input::old("source"),['class'=>'form-control','id'=>'source-field','placeholder'=>'Fill Your source'])}}
	@if($errors->has("source"))
	<span class="help-block">{{ $errors->first("source") }}</span>
	@endif
</div>
<div class="form-group @if($errors->has('audio_output')) has-error @endif">	
	{{Form::label('audio_output','audio_output')}}
	{{Form::text('audio_output',isset($channel->audio_output)?$channel->audio_output:\Input::old("audio_output"),['class'=>'form-control','id'=>'audio_output-field','placeholder'=>'Fill Your audio_output'])}}
	@if($errors->has("audio_output"))
	<span class="help-block">{{ $errors->first("audio_output") }}</span>
	@endif
</div>


<div class="form-group @if($errors->has('rtmp_name')) has-error @endif">	
	{{Form::label('rtmp_name','rtmp_name')}}
	{{Form::text('rtmp_name',isset($channel->rtmp_name)?$channel->rtmp_name:\Input::old("rtmp_name"),['class'=>'form-control','id'=>'rtmp_name-field','placeholder'=>'Fill Your rtmp_name'])}}
	@if($errors->has("rtmp_name"))
	<span class="help-block">{{ $errors->first("rtmp_name") }}</span>
	@endif
</div> 


<div class="form-group @if($errors->has('nvenc_h264')) has-error @endif">
	<div class="checkbox">
		<label>
			{{ Form::hidden('nvenc_h264', false) }}
			{{ Form::checkbox('nvenc_h264', 1, isset($channel->nvenc_h264)?$channel->nvenc_h264:Input::old("nvenc_h264"), ['class' => 'field','id'=>'nvenc_h264-field']) }}
			nvenc_h264
		</label>
		@if($errors->has("nvenc_h264"))
			<span class="help-block">{{ $errors->first("nvenc_h264") }}</span>
		@endif
	</div>
</div>


<div class="form-group @if($errors->has('x264')) has-error @endif">
	<div class="checkbox">
		<label>
			{{ Form::hidden('x264', false) }}
			{{ Form::checkbox('x264', 1, isset($channel->x264)?$channel->x264:null, ['class' => 'field','id'=>'x264-field']) }}
			x264
		</label>
		@if($errors->has("x264"))
			<span class="help-block">{{ $errors->first("x264") }}</span>
		@endif
	</div>
</div>

<div class="form-group @if($errors->has('hd')) has-error @endif">
	<div class="checkbox">
		<label>
			{{ Form::hidden('hd', false) }}
			{{ Form::checkbox('hd', 1, isset($channel->hd)?$channel->hd:null, ['class' => 'field','id'=>'channel_port-field']) }}
			hd
		</label>
		@if($errors->has("hd"))
			<span class="help-block">{{ $errors->first("hd") }}</span>
		@endif
	</div>
</div>

<div class="form-group @if($errors->has('enabled')) has-error @endif">
	<div class="checkbox">
		<label>
			{{ Form::hidden('enabled', false) }}
			{{ Form::checkbox('enabled', 1, isset($channel->enabled)?$channel->enabled:null, ['class' => 'field','id'=>'enabled-field']) }}
			enabled
		</label>
		@if($errors->has("enabled"))
			<span class="help-block">{{ $errors->first("enabled") }}</span>
		@endif
	</div>
</div>

