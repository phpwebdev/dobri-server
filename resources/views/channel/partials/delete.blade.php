{{Form::open(['route'=>['channel.destroy',$channel],'method'=>'DELETE'])}}
<button class="btn btn-link" type="submit">Delete</button>
{{Form::close()}}