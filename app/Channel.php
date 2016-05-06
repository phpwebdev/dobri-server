<?php

namespace app;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;
use Kyslik\ColumnSortable\Sortable;

class Channel extends Model
{
     use Eloquence,Sortable;

    protected $table    = "channels";
    protected $fillable = ['server_id', 'channel_name', 'source', 'audio_output', 'nvenc_h264', 'x264', 'hd', 'rtmp_name', 'enabled', 'running'];
    protected $hidden   = ['id', 'created_at', 'updatet_at'];

    public $timestamps = true;

    protected $guarded = [];
    

    protected $searchable = [
        'columns' => [
            'channel_name' => 10,
            'source' => 10,
            'audio_output' => 2,
            'rtmp_name' => 5,
        ]
    ];



    protected $sortable = [
            'id',
            'channel_name',
            'source',
            'audio_output',
            'rtmp_name'   
        ];


    /**
     * { Pointer to DB relationship belongsTo  }
     *
     * @return     App\Server
     * @author     (author_name <email@domain.com>)
     */
    
    public function Server()
    {
        return $this->belongsTo('App\Server');
    }
}
