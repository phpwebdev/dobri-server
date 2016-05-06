<form action="{{ route('servers.destroy', $server->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>	
{{Form::close()}}