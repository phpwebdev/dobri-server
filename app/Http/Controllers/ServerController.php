<?php
namespace App\Http\Controllers;

use App\Http\Requests\CreateServerRequest;
use App\Http\Requests\EditServerRequest;
use App\Http\Requests\Request;
use App\Server;
use Illuminate\Support\Facades\Session;

class ServerController extends Controller
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
        $servers = Server::paginate();
        return view('server.index', compact('servers'));
    }
/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function create()
    {
        return view('server.create');
    }
/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
    public function store(CreateServerRequest $request)
    {
        $server = new Server($request->all());
        $server->save();
        Session::flash('message', 'Server was created!');
        return redirect()->route('server.index');
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
        $server = Server::findOrFail($id);
        return view('server.edit', compact('server'));
    }
/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function update(EditServerRequest $request, $id)
    {

      //  $_ = $request->all();

       /* $_["x264"]       = isset($_["x264"]) ? $_["x264"] : false;
        $_["nvenc_h264"] = isset($_["nvenc_h264"]) ? $_["nvenc_h264"] : false;
        $_["nvenc_hevc"] = isset($_["nvenc_hevc"]) ? $_["nvenc_hevc"] : false;
        $_["x265"]       = isset($_["x265"]) ? $_["x265"] : false;
        $_["enabled"]    = isset($_["enabled"]) ? $_["enabled"] : false;
        */
        $server = Server::findOrFail($id);
        //$server->fill($_);
        $server->fill($request->all());
        $server->save();
        Session::flash('message', 'Server was updated!');
        return redirect()->route('server.index');
    }
/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function destroy($id)
    {
        $server = Server::findOrFail($id);
        Server::destroy($id);
        Session::flash('message', "Server \"" . $server->server_name . "\" was destroyed!");
        return redirect()->route('server.index');
    }
}
