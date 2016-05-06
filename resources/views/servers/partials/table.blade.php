
<table class="table table-bordered">
	<thead>
		<tr>
			<th nowrap style="width: 10px">@sortablelink ('id','#ID')</th>	
			<th nowrap>@sortablelink ('server_name','Server name')</th>
			<th nowrap>@sortablelink ('server_ip','Server IP')</th>
			<th nowrap>@sortablelink ('server_port','Server port')</th>			
		</tr>
	</thead>
	@if($servers->count())
	<tbody>
		@foreach($servers as $server)
		<tr class="{!!$server->enabled?'active"':'danger'!!}">
			<td width="10%">{{$server->id}}</td>
			<td width="70%">{{$server->server_name}}</td>
			<td >{{$server->server_ip}}</td>
			<td >{{$server->server_port}}</td>
			<td class="text-right" >
				<a class="btn btn-xs btn-primary" href="{{ route('servers.show', $server->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
			</td>
			<td class="text-right" >
				<a class="btn btn-xs btn-warning" href="{{ route('servers.edit', $server->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
			</td>
			<td class="text-right">@include('servers.partials.delete')</td>
		</tr>
		@endforeach
		@else
		<tr>
			<td colspan=6>There don't have any server, yet!</td>
		</tr>
		@endif
	</tbody>
</table>
