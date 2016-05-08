<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\CreateUserRequest;
use Laracasts\Flash\Flash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;


class UserController extends Controller
{

    /**
     * { class constructor }
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
        $query = Input::get('query');
        $sort = Input::get('sort');
        $query_fulltext_search = '*'.$query.'*';
        $_ = User::select();
        if (isset($query)) {
            $_ = $_->search([$query_fulltext_search], ['id'=>1, 'name' =>15, 'email' => 5], true);
        }
        if (isset($sort)) {
            $_ = $_->sortable([$sort]);
        }
        $_ = $_->orderBy('id', 'desc');
        $users = $_->paginate(10);
        return view('users.index', compact('users', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = [];
        return view('users.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $password=  Input::get('password');
        $data = $request->all();
        if (!$password){
            unset($data['password']);
        }else{
            $data['password'] = bcrypt($data['password']);
        }

        $user = new User($data);        
        if ($user->save()) {
            Flash::success('Server created successfully.');
        } else {
            Flash::error("Server can't cant be created ") ;
        }
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user','servers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $password=  Input::get('password');
        $data = $request->all();
        if (!$password){
            unset($data['password']);
        }else{
            $data['password'] = bcrypt($data['password']);
        }

        $user->fill($data);
        if ($user->save()) {
            Flash::success('User updated successfully.');
        } else {
            Flash::error("User can't cant be updated.") ;
        }
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->delete()) {
            Flash::success('User deleted successfully.');
        } else {
            Flash::error("User can't cant be deleted ") ;
        }

        return redirect()->route('users.index');
    }
}
