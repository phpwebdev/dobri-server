<?php
namespace app;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;
use Kyslik\ColumnSortable\Sortable;

class Server extends Model
{
	
   use Eloquence,Sortable;          

    protected $table    = "servers";
    protected $primaryKey    = "id";
    public $timestamps = true;
    protected $fillable = array('server_name', 'server_ip', 'server_port', 'nvenc_h264', 'nvenc_hevc', 'x264', 'x265', 'enabled');
    protected $hidden   = ['id','created_at','updatet_at'];
    protected $guarded = [];
    protected $searchable = [
        'columns' => [
            'server_name' => 10,
            'server_ip' => 10,
            'server_port' => 2,            
        ]
    ];
    protected $sortable = [
        'id',
        'server_name',
        'server_ip',
        'server_port'     
    ];

    public function channels()
    {
        return $this->hasMany('App\Channel');
    }

   
}
