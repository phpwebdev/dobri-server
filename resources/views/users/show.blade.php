@extends('layouts.app')
@section('main-content')
<div class="row">
    <div class="col-md-12">
        <div class="box {!!$user->enabled?'box-success':'box-danger'!!}">
            <div class="box-header with-border">
                <h3 class="box-title">Users / Show user "{{$user->name}}"</h3>
                <div class="box-tools">
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                        <input type="hidden" name="_method" value="DELETE">
                        {{ csrf_token() }}
                        <div class="btn-group pull-right" role="group" aria-label="...">
                            <a class="btn btn-warning btn-group btn-sm" role="group" href="{{ route('users.edit', $user->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                            <button type="submit" class="btn btn-danger btn-sm">Delete <i class="glyphicon glyphicon-trash"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_name">Name</label>
                            <p class="form-control-static">{{$user->name}}</p>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <p class="form-control-static">{{$user->email}}</p>
                        </div>
                        <div class="form-group">
                            <label for="enabled">Status</label>
                            <p class="form-control-static">{!!$user->enabled?'Enabled':'Disabled'!!}</p>
                        </div>                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="register">Registered</label>
                            <p class="form-control-static">{{$user->created_at->diffForHumans()}}</p>
                        </div>
                        
                        
                    </div>
                </div>
                <div class="row">                
                    <a class="btn btn-link" href="{{ route('users.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </div>
        </div>
    </div>
    @endsection