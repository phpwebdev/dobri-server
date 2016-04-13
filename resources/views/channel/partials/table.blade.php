<table class="table table-hover table-striped table-bordered">
	<thead class="thead-inverse">
		<tr>
			<th>Server name</th>
			<th>Channel name</th>			
			<th>Audio output</th>
			<th>nvenc_h264</th>
			<th>x264</th>
			<th>hd</th>
			<th>rtmp_name</th>
			<th>Enabled</th>
<!--			<th>Running</th> -->
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		@foreach($channels as $channel)
		<tr>
			<td>{{$servers[$channel->server_id]}}</td>
			<td>{{$channel->channel_name}}</td>
			<td>{{$channel->audio_output}}</td>
			<td>{{$channel->nvenc_h264}}</td>
			<td>{{$channel->x264}}</td>
			<td>{{$channel->hd}}</td>
			<td>{{$channel->rtmp_name}}</td>
			<td>{{$channel->enabled}}</td>
<!--			<td>{{$channel->running}}</td> -->
			<td>
				<a href="{{route('channel.edit',$channel)}}">Edit</a>
			</td>
			<td>@include('channel.partials.delete')</td>
		</tr>
		<tr>
			<td colspan="10">Source : {{$channel->source}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
