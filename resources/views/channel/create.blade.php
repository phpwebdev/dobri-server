@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Create new channel</div>
                <div class="panel-body">
                    @include('channel.partials.message')
                    {{Form::open(['route'=>['channel.store'],'method'=>'POST'])}}
                    @include('channel.partials.fields')
                    <button class="btn btn-primary" role="button" type="submit">Save</button>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection