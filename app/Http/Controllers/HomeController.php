<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.2/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Home;
use App\Http\Requests;
use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $info ;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {

        $info = (object)array();
        $info->usersCount = 2;
        $info->usersActivePercent= 100; 
        $info->usersActive = 2;

        $info->serversCount = Home::getServersCount();
        $info->serversActivePercent = Home::getServersActivePercent(); 
        $info->serversActiveCount = Home::getServersActiveCount();

        $info->channelsCount =Home::getChannelsCount();;
        $info->channelsActivePercent= Home::getChannelsActivePercent();  
        $info->channelsActive = Home::getChannelsActiveCount();
        
        return view('home',compact('info'));
    }

    
}


