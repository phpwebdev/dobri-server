<?php

namespace App;
use App\Channel;
use App\Server;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    
    public static function getServersCount()
    {
        return  Server::count();    
    }

    public static function getServersActivePercent()
    {
        return intval ((Home::getServersActiveCount() / Home::getServersCount())*100);
    }

    public static function getServersActiveCount()
    {
        return  Server::where('enabled',true)->count();    
    }



  	public static function getChannelsCount()
    {
        return  Channel::count();    
    }

    public static function getChannelsActivePercent()
    {
        return intval((Home::getChannelsActiveCount() / Home::getChannelsCount())*100);
    }

    public static function getChannelsActiveCount()
    {
        return  Channel::where('enabled',true)->count();    
    }

}
