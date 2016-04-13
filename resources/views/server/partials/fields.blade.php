{!! csrf_field() !!}
{{Form::hidden('id',isset($server->id)?$server->id:null)}}
<div class="form-group">
	{{Form::label('server_name','Server name')}}
	{{Form::text('server_name',isset($server->server_name)?$server->server_name:null,['class'=>'form-control','placeholder'=>'Fill server name '])}}
</div>
<div class="form-group">
	{{Form::label('server_ip','Server IP')}}
	{{Form::text('server_ip',isset($server->server_ip)?$server->server_ip:null,['class'=>'form-control','placeholder'=>'Fill server IP '])}}
</div>
<div class="form-group">
	{{Form::label('server_port','Server port')}}
	{{Form::text('server_port',isset($server->server_port)?$server->server_port:null,['class'=>'form-control','placeholder'=>'Fill server port '])}}
</div>
<div class="form-group">
	<div class="checkbox">
		<label>
			{{ Form::hidden('nvenc_h264', false) }}
			{{ Form::checkbox('nvenc_h264', 1, isset($server->nvenc_h264)?$server->nvenc_h264:null, ['class' => 'field']) }}
			nvenc_h264
		</label>
	</div>
</div>
<div class="form-group">
	<div class="checkbox">
		<label>
			{{ Form::hidden('nvenc_hevc', false) }}
			{{ Form::checkbox('nvenc_hevc', 1, isset($server->nvenc_hevc)?$server->nvenc_hevc:null, ['class' => 'field']) }}
			nvenc_hevc
		</label>
	</div>
</div>
<div class="form-group">
	<div class="checkbox">
		<label>
			{{ Form::hidden('x264', false) }}
			{{ Form::checkbox('x264', 1, isset($server->x264)?$server->x264:null, ['class' => 'field']) }}
			x264
		</label>
	</div>
</div>
<div class="form-group">
	<div class="checkbox">
		<label>
			{{ Form::hidden('x265', false) }}
			{{ Form::checkbox('x265', 1, isset($server->x265)?$server->x265:null, ['class' => 'field']) }}
			x265
		</label>
	</div>
</div>
<div class="form-group">
	<div class="checkbox">
		<label>
			{{ Form::hidden('enabled', false) }}
			{{ Form::checkbox('enabled', 1, isset($server->enabled)?$server->enabled:null, ['class' => 'field']) }}
			enabled
		</label>
	</div>
</div>