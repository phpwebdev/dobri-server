<?php

namespace App\Http\Controllers;

use App\Server;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\EditServerRequest;
use App\Http\Requests\CreateServerRequest;



class ServerController extends Controller
{

    

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {	
	
        $query = Input::get('query','');
        $sort = Input::get('sort');
        $query_fulltext_search = '*'.$query.'*';
        $_ = Server::select();
        if (isset($query)){
            $_ = $_->search([$query_fulltext_search], ['id'=>1,'server_name' =>15,'server_ip' => 5, 'server_port' => 5], true);
        }
        if (isset($sort)){
            $_ = $_->sortable([$sort]);
        }
        $_ = $_->orderBy('id', 'desc');
        $servers = $_->paginate(10);
        return view('servers.index', compact('servers','query'));
    }

    public function fullsearch()
    {   

        $query = Input::get('query');
        $sort = Input::get('sort');
        $query_fulltext_search = '*'.$query.'*';
        $_ = Server::select();
        if (isset($query)){
            $_ = $_->search([$query_fulltext_search], ['id'=>1,'server_name' =>15,'server_ip' => 5, 'server_port' => 5], true);
        }
        if (isset($sort)){
            $_ = $_->sortable([$sort]);
        }
        $_ = $_->orderBy('id', 'desc');
        $servers = $_->paginate(10);
        return view('servers.index', compact('servers','query'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('servers.create',compact('search'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(CreateServerRequest $request)
    {

        $search = new Search($request->all());
        $search->save();

        return redirect()->route('servers.index')->with('message', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $search = Server::findOrFail($id);

        return view('servers.show', compact('search'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $search = Server::findOrFail($id);

        return view('servers.edit', compact('search'));
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

        $search = Server::findOrFail($id);
        $search->fill($request->all());  

        $search->save();
        return redirect()->route('servers.index')->with('message', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $search = Server::findOrFail($id);
        $search->delete();

        return redirect()->route('servers.index')->with('message', 'Item deleted successfully.');
    }
}
