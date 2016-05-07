<table class="table table-bordered">
	<thead>
		<tr>
			<th nowrap>@sortablelink ('id','#ID')</th>
			<th nowrap>@sortablelink ('channel_name','Channel name')</th>
			<th nowrap>@sortablelink ('rtmp_name','Rtmp name')</th>
			<th nowrap>@sortablelink ('audio_output','Audio output')</th>			
			<th nowrap>@sortablelink ('enabled','Status')</th>
			<th class="text-right" colspan=3 align="right">				
				<a class="btn btn-success pull-right btn-sm" href="{{ route('channels.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>				
			</th>	
		</tr>
	</thead>
	@if($channels->count())
	<tbody>
		@foreach($channels as $channel)
		<tr class="{!!$channel->enabled?'active"':'danger'!!}">
			<td width="10%">{{$channel->id}}</td>
			<td>{{$channel->channel_name}}</td>		
			<td >{{$channel->rtmp_name}}</td>
			<td >{{$channel->audio_output}}</td>
			<td >{{$channel->enabled}}</td>
			<td class="text-right" >
				<a class="btn btn-xs btn-primary" href="{{ route('channels.show', $channel->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
			</td>
			<td class="text-right" >
				<a class="btn btn-xs btn-warning" href="{{ route('channels.edit', $channel->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
			</td>
			<td class="text-right">@include('channels.partials.delete')</td>
		</tr>
		<tr class="{!!$channel->enabled?'active"':'danger'!!}">
			<td colspan="8">{{$channel->source}}</td>
		</tr>
		@endforeach
		@else
		<tr>
			<td colspan=8>There don't have any channels, yet!</td>
		</tr>
		@endif
	</tbody>
</table>