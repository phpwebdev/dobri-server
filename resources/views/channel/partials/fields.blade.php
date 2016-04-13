 {!! csrf_field() !!}
 {{Form::hidden('id',isset($channel->id)?$channel->id:null)}}
 <div class="form-group">
	{{Form::label('channel_name','Channel name')}}
	{{Form::text('channel_name',isset($channel->channel_name)?$channel->channel_name:null,['class'=>'form-control','placeholder'=>'Fill channel name '])}}
</div>

 <div class="form-group">
	{{Form::label('server_id','Server name')}}
	{{Form::select('server_id', $servers, isset($channel->server_id)?$channel->server_id:null, ['class'=>'form-control','placeholder' => 'Pick a server...'])}}	
</div>

 <div class="form-group">
	{{Form::label('source','source')}}
	{{Form::text('source',isset($channel->source)?$channel->source:null,['class'=>'form-control','placeholder'=>'Fill source'])}}
</div>
 <div class="form-group">
	{{Form::label('audio_output','audio_output')}}
	{{Form::text('audio_output',isset($channel->audio_output)?$channel->audio_output:null,['class'=>'form-control','placeholder'=>'Fill audio_output'])}}
</div>
 <div class="form-group">
	{{Form::label('rtmp_name','rtmp_name')}}
	{{Form::text('rtmp_name',isset($channel->rtmp_name)?$channel->rtmp_name:null,['class'=>'form-control','placeholder'=>'Fill rtmp_name'])}}
</div>
<div class="form-group">
	<div class="checkbox">
		<label>
			{{Form::hidden('nvenc_h264', false)}}			
			{{ Form::checkbox('nvenc_h264', 1, isset($channel->nvenc_h264)?$channel->nvenc_h264:null, ['class' => 'field']) }}
			nvenc_h264
		</label>
	</div>
</div>
<div class="form-group">
	<div class="checkbox">
		<label>
			{{ Form::hidden('x264', false) }}			
			{{ Form::checkbox('x264', 1, isset($channel->x264)?$channel->x264:null, ['class' => 'field']) }}
			x264
		</label>
	</div>
</div>
<div class="form-group">
	<div class="checkbox">
		<label>
			{{ Form::hidden('hd', false) }}			
			{{ Form::checkbox('hd', 1, isset($channel->hd)?$channel->hd:null, ['class' => 'field']) }}
			hd
		</label>
	</div>
</div>
<div class="form-group">
	<div class="checkbox">
		<label>
			{{ Form::hidden('enabled', false) }}			
			{{ Form::checkbox('enabled', 1, isset($channel->enabled)?$channel->enabled:null, ['class' => 'field']) }}
			Enabled
		</label>
	</div>
</div>
<div class="form-group">
	<div class="checkbox">
		<label>
			{{ Form::hidden('running', false) }}	
			{{ Form::checkbox('running', 1, isset($channel->running)?$channel->running:null, ['class' => 'field']) }}
			Running
		</label>
	</div>
</div>