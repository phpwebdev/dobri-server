{{Form::open(['route'=>['server.destroy',$server],'method'=>'DELETE'])}}
<button class="btn btn-link" type="submit">Delete</button>
{{Form::close()}}