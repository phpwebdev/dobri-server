<table class="table table-hover table-striped table-bordered">
	<thead class="thead-inverse">
		<tr>
			<th>Server name</th>
			<th>Server ip</th>
			<th>Port</th>
			<th>nvenc_h264</th>
			<th>nvenc_hevc</th>
			<th>x264</th>
			<th>x265</th>
			<th>enabled</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		@foreach($servers as $server)
		<tr>
			<td>{{$server->server_name}}</td>
			<td>{{$server->server_ip}}</td>
			<td>{{$server->server_port}}</td>
			<td>{{$server->nvenc_h264}}</td>
			<td>{{$server->nvenc_hevc}}</td>
			<td>{{$server->x264}}</td>
			<td>{{$server->x265}}</td>
			<td>{{$server->enabled}}</td>
			<td>
				<a href="{{route('server.edit',$server)}}">Edit</a>				
			</td>
			<td>@include('server.partials.delete')</td>
		</tr>
		@endforeach
	</tbody>
</table>

