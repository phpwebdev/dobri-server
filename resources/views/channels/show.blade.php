@extends('layout')
@section('header')
<div class="page-header">
    <h1>Searches / Show #{{$search->id}}</h1>
    <form action="{{ route('searches.destroy', $search->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="btn-group pull-right" role="group" aria-label="...">
            <a class="btn btn-warning btn-group" role="group" href="{{ route('searches.edit', $search->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
        </div>
    </form>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <form action="#">
            <div class="form-group">
                <label for="nome">ID</label>
                <p class="form-control-static"></p>
            </div>
            <div class="form-group">
                <label for="first_name">FIRST_NAME</label>
                <p class="form-control-static">{{$search->first_name}}</p>
            </div>
            <div class="form-group">
                <label for="last_name">LAST_NAME</label>
                <p class="form-control-static">{{$search->last_name}}</p>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <p class="form-control-static">{{$search->email}}</p>
            </div>
            <div class="form-group">
                <label for="bio">BIO</label>
                <p class="form-control-static">{{$search->bio}}</p>
            </div>
        </form>
        <a class="btn btn-link" href="{{ route('searches.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
    </div>
</div>
@endsection