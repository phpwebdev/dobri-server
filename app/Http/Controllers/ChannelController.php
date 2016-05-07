<?php

namespace App\Http\Controllers;

use App\Server;
use App\Channel;
use App\Http\Requests;
use Laracasts\Flash\Flash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\EditChannelRequest;
use App\Http\Requests\CreateChannelRequest;

class ChannelController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $query = Input::get('query', '');
        $sort = Input::get('sort');
        $query_fulltext_search = '*'.$query.'*';
        $_ = Channel::select();
        if (isset($query)) {
            $_ = $_->search([$query_fulltext_search], ['id'=>1, 'channel_name' =>15, 'source' => 5, 'rtmp_name' => 5], true);
        }
        if (isset($sort)) {
            $_ = $_->sortable([$sort]);
        }
        $_ = $_->orderBy('id', 'desc');
        $channels = $_->paginate(10);
        return view('channels.index', compact('channels', 'query'));
    }

    public function fullsearch()
    {
        // $query = Input::get('query');
        // $sort = Input::get('sort');
        // $query_fulltext_search = '*'.$query.'*';
        // $_ = Server::select();
        // if (isset($query)) {
        //     $_ = $_->search([$query_fulltext_search], ['id'=>1, 'server_name' =>15, 'server_ip' => 5, 'server_port' => 5], true);
        // }
        // if (isset($sort)) {
        //     $_ = $_->sortable([$sort]);
        // }
        // $_ = $_->orderBy('id', 'desc');
        // $channels = $_->paginate(10);
        // return view('channels.index', compact('channels', 'query'));
        $this->index();
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('channels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(CreateChannelRequest $request)
    {
        $channel = new Channel($request->all());        
        if ($channel->save()) {
            Flash::success('Server created successfully.');
        } else {
            Flash::error("Server can't cant be created ") ;
        }
        return redirect()->route('channels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $channel = Channel::find($id)
            ->with(['server'])
            ->first();
        //dd($channel->channels);
        return view('channels.show', compact('channel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $channel = Channel::findOrFail($id);

        return view('channels.edit', compact('channel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param Request $request
     * @return Response
     */
    public function update(EditChannelRequest $request, $id)
    {
        $channel = Channel::findOrFail($id);
        $channel->fill($request->all());
        if ($channel->save()) {
            Flash::success('Channel updated successfully.');
        } else {
            Flash::error("Channel can't cant be updated.") ;
        }
        
        return redirect()->route('channels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $channel = Channel::findOrFail($id);
        if ($channel->delete()) {
            Flash::success('Channel deleted successfully.');
        } else {
            Flash::error("Channel can't cant be deleted ") ;
        }

        return redirect()->route('channels.index');
    }
}
