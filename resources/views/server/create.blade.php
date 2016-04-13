@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Create new server</div>
                <div class="panel-body">
                    @include('server.partials.message')
                    {{Form::open(['route'=>['server.store'],'method'=>'POST'])}}
                    @include('server.partials.fields')
                    <button class="btn btn-primary" role="button" type="submit">Save</button>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection