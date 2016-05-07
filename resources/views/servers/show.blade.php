@extends('layouts.app')
@section('main-content')
<div class="row">
    <div class="col-md-12">
        <div class="box {!!$server->enabled?'box-success':'box-danger'!!}">
            <div class="box-header with-border">
                <h3 class="box-title">Servers / Show "{{$server->server_name}}"</h3>
                <div class="box-tools">
                    <form action="{{ route('servers.destroy', $server->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="btn-group pull-right" role="group" aria-label="...">
                            <a class="btn btn-warning btn-group btn-sm" role="group" href="{{ route('servers.edit', $server->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                            <button type="submit" class="btn btn-danger btn-sm">Delete <i class="glyphicon glyphicon-trash"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="server_name">Server name</label>
                            <p class="form-control-static">{{$server->server_name}}</p>
                        </div>
                        <div class="form-group">
                            <label for="server_ip">Server IP</label>
                            <p class="form-control-static">{{$server->server_ip}}</p>
                        </div>
                        <div class="form-group">
                            <label for="server_port">Port</label>
                            <p class="form-control-static">{{$server->server_port}}</p>
                        </div>                        
                        <div class="form-group">
                            <label for="server_port">Status</label>
                            <p class="form-control-static">{{$server->enabled?'Enabled':'Disabled'}}</p>
                        </div>                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nvenc_h264">nvenc_h264</label>
                            <p class="form-control-static">{{$server->nvenc_h264}}</p>
                        </div>
                        <div class="form-group">
                            <label for="nvenc_hevc">nvenc_hevc</label>
                            <p class="form-control-static">{{$server->nvenc_hevc}}</p>
                        </div>
                        <div class="form-group">
                            <label for="x264">x264</label>
                            <p class="form-control-static">{{$server->x264}}</p>
                        </div>                        
                        <div class="form-group">
                            <label for="x265">x265</label>
                            <p class="form-control-static">{{$server->x265}}</p>
                        </div>         
                    </div>
                    <a class="btn btn-link" href="{{ route('servers.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Channel list</h3>        
      </div>
      <div class="box-body table-responsive">
        @include('channels.partials.table',['channels'=>$server->channels])
      </div>
      <!--div class="box-footer clearfix ">
       {{-- $server->channels->appends(\Input::except('page'))->render() --}}  
      </div-->
    </div>
  </div>
</div>


@endsection