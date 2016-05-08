@extends('layouts.app')
@section('main-content')
<div class="row">
    <div class="col-md-12">
        <div class="box {!!$channel->enabled?'box-success':'box-danger'!!}">
            <div class="box-header with-border">
                <h3 class="box-title">Channels / Show "{{$channel->channel_name}}"</h3>
                <div class="box-tools">
                    <form action="{{ route('channels.destroy', $channel->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="btn-group pull-right" role="group" aria-label="...">
                            <a class="btn btn-warning btn-group btn-sm" role="group" href="{{ route('channels.edit', $channel->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                            <button type="submit" class="btn btn-danger btn-sm">Delete <i class="glyphicon glyphicon-trash"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="channel_name">Channel name</label>
                            <p class="form-control-static">{{$channel->channel_name}}</p>
                        </div>
                        <div class="form-group">
                            <label for="server_name">Server name</label>
                            <p class="form-control-static">{{$channel->server->server_name}}</p>
                        </div>
                        <div class="form-group">
                            <label for="rtmp_name">rtmp_name</label>
                            <p class="form-control-static">{{$channel->rtmp_name}}</p>
                        </div>
                        <div class="form-group">
                            <label for="channel_audio_output">Audio output</label>
                            <p class="form-control-static">{{$channel->audio_output}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nvenc_h264">nvenc_h264</label>
                            <p class="form-control-static">{{$channel->nvenc_h264?'Yes':'No'}}</p>
                        </div>
                        <div class="form-group">
                            <label for="x264">x264</label>
                            <p class="form-control-static">{{$channel->x264}}</p>
                        </div>
                        <div class="form-group">
                            <label for="enabled">Status</label>
                            <p class="form-control-static">{!!$channel->enabled?'Enabled':'Disabled'!!}</p>
                        </div>
                        <div class="form-group">
                            <label for="running">Running</label>
                            <p class="form-control-static">{!!$channel->running?'Enabled':'Disabled'!!}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="enabled">Source</label>
                            <p class="form-control-static">{{$channel->source}}</p>
                        </div>
                    </div>
                    <a class="btn btn-link" href="{{ route('channels.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </div>
        </div>
    </div>
    @endsection