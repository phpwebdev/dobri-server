<?php
namespace App\Http\Controllers;

use App\Channel;
use App\Http\Requests\CreateChannelRequest;
use App\Http\Requests\EditChannelRequest;
use App\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ChannelController extends Controller
{
/**
 * Create a new controller instance.
 *
 * @return void
 */
    public function __construct()
    {
        $this->middleware('auth');
    }
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function index()
    {

        $servers  = Server::lists('server_name', 'id')->all();
        $channels = Channel::orderBy('channel_name', 'asc')->Paginate();
        return view('channel.index', compact('channels', 'servers'));
    }
/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function create()
    {
        $servers = Server::lists('server_name', 'id')->all();

        return view('channel.create', compact('servers'));
    }
/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
    public function store(CreateChannelRequest $request)
    {

        $channel = new Channel($request->all());
        $channel->save();
        Session::flash('message', 'Channel was created!');
        return redirect()->route('channel.index');
    }
/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function show($id)
    {
//
    }
/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function edit($id)
    {
        $channel = Channel::findOrFail($id);
        $servers = Server::lists('server_name', 'id')->all();
        return view('channel.edit', compact('channel', 'servers'));
    }
/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function update(EditChannelRequest $request, $id)
    {

        /*$_ = $request->all();

        $_["x264"]       = isset($_["x264"]) ? $_["x264"] : false;
        $_["nvenc_h264"] = isset($_["nvenc_h264"]) ? $_["nvenc_h264"] : false;
        $_["hd"]         = isset($_["hd"]) ? $_["hd"] : false;
        $_["enabled"]    = isset($_["enabled"]) ? $_["enabled"] : false;
        $_["running"]    = isset($_["running"]) ? $_["running"] : false;
*/
        $channel = Channel::findOrFail($id);
        $channel->fill($request->all());
  //      $request->all()
        $channel->save();
        Session::flash('message', 'Channel was updated!');
        return redirect()->route('channel.index');
    }
/**
/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function destroy($id)
    {
        $channel = Channel::findOrFail($id);
        Channel::destroy($id);
        Session::flash('message', 'Channel "' . $channel->channel_name . '" was destroyed!');
        return redirect()->route('channel.index');
    }
}
