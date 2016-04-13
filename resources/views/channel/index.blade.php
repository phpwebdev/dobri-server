@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Channel</div>
                @if (Session::has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong> {{Session::get('message')}}</strong>
                </div>
                @endif
                <div class="panel-body">
                    <p><a href="{{route('channel.create')}}" class="btn btn-info" role="button">New channel</a></p>
                    @include('channel.partials.table')
                    {!! $channels->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection