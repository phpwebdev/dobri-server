@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit  chanel "{{ $channel->channel_name}}"</div>
                <div class="panel-body">
                    @include('channel.partials.message')
                    {{Form::open(['route'=>['channel.update',$channel],'method'=>'PUT'])}}
                    @include('channel.partials.fields')
                    <button class="btn btn-primary" role="button" type="submit">Save</button>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection