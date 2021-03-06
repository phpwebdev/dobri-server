<?php

namespace App\Http\Controllers;

use App\Server;
use App\Channel;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\EditServerRequest;
use App\Http\Requests\CreateServerRequest;

class ServerController extends Controller
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
        $query = Input::get('query');
        $sort = Input::get('sort');
        $query_fulltext_search = '*'.$query.'*';
        $_ = Server::select();
        if (isset($query)) {
            $_ = $_->search([$query_fulltext_search], ['id'=>1, 'server_name' =>15, 'server_ip' => 5, 'server_port' => 5], true);
        }
        if (isset($sort)) {
            $_ = $_->sortable([$sort]);
        }
        $_ = $_->orderBy('id', 'desc');
        $servers = $_->paginate(10);
        return view('servers.index', compact('servers', 'query'));
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
        // $servers = $_->paginate(10);
        // return view('servers.index', compact('servers', 'query'));
        $this->index();
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('servers.create', compact('search'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(CreateServerRequest $request)
    {
        $server = new Server($request->all());        
        if ($server->save()) {
            Flash::success('Server created successfully.');
        } else {
            Flash::error("Server can't cant be created ") ;
        }
        return redirect()->route('servers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        
        //$server = Server::with(['channels'])->orderBy('created_at','desc')->findOrFail($id);

        $server =Server::with(['channels' => function ($query) {
            $sort = Input::get('sort','id');
            $order = Input::get('order','desc');
            if (isset($sort) && isset($order) ) {
                $query->orderBy($sort,$order);
            }         
        }])->findOrFail($id);
        return view('servers.show', compact('server'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $server = Server::findOrFail($id);

        return view('servers.edit', compact('server'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param Request $request
     * @return Response
     */
    public function update(EditServerRequest $request, $id)
    {
        $server = Server::findOrFail($id);
        $server->fill($request->all());
        if ($server->save()) {
            Flash::success('Server updated successfully.');
        } else {
            Flash::error("Server can't cant be updated.") ;
        }
        
        return redirect()->route('servers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $server = Server::findOrFail($id);
        if ($server->delete()) {
            Flash::success('Server deleted successfully.');
        } else {
            Flash::error("Server can't cant be deleted ") ;
        }

        return redirect()->route('servers.index');
    }
}
