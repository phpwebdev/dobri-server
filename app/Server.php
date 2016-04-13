<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $table    = "servers";
    protected $fillable = array('server_name', 'server_ip', 'server_port', 'nvenc_h264', 'nvenc_hevc', 'x264', 'x265', 'enabled');
    protected $hidden   = ['id','created_at','updatet_at'];

    public function Channel()
    {
        return $this->hasMany('App\Channel');
    }

}
