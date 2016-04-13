<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $table    = "channels";
    protected $fillable = ['server_id', 'channel_name', 'source', 'audio_output', 'nvenc_h264', 'x264', 'hd', 'rtmp_name', 'enabled', 'running'];
    protected $hidden   = ['id', 'created_at', 'updatet_at'];

    public function Server()
    {
        return $this->belongsTo('App\Server');
    }

}
