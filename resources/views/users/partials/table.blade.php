<table class="table table-bordered">
	<thead>
		<tr>
			<th nowrap>@sortablelink ('id','#ID')</th>
			<th nowrap>@sortablelink ('name','User name')</th>
			<th nowrap>@sortablelink ('email','Email')</th>			
			<th nowrap>@sortablelink ('enabled','Status')</th>
			<th class="text-right" colspan=3 align="right">				
				<a class="btn btn-success pull-right btn-sm" href="{{ route('users.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>				
			</th>	
		</tr>
	</thead>
	@if($users->count())
	<tbody>
		@foreach($users as $user)
		<tr class="{!!$user->enabled?'active"':'danger'!!}">
			<td width="10%">{{$user->id}}</td>
			<td width=90%>{{$user->name}}</td>		
			<td>{{$user->email}}</td>			
			<td>{!!$user->enabled?'Active':'Disabled'!!}</td>
			<td class="text-right" >
				<a class="btn btn-xs btn-primary" href="{{ route('users.show', $user->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
			</td>
			<td class="text-right" >
				<a class="btn btn-xs btn-warning" href="{{ route('users.edit', $user->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
			</td>
			<td class="text-right">@include('users.partials.delete')</td>
		</tr>		
		@endforeach
		@else
		<tr>
			<td colspan=8>There don't have any users, yet!</td>
		</tr>
		@endif
	</tbody>
</table>