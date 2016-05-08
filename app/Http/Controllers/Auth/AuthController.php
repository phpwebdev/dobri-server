<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Hash;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\View\Middleware\ShareErrorsFromSession;


use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    protected $loginPath = '/login';
    protected $redirectAfterLogout = '/login';


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }
    */
    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function register(RegisterUserRequest $request)
    {
        $data = $request;

        $created =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'enabled'=>!$this->checkForEmptyTable(),
            'password' => Hash::make($data['password']),
        ]);
        
        if ($created){
           return redirect($this->loginPath);
        }else{
            return redirect($this->loginPath)->withErrors([
                'error' => 'Can\'t create user'
            ]);  
        }
    }



    protected function checkForEmptyTable()
    {
        return User::count();
    }


    public function login(LoginUserRequest $request)
    {   

        $user = User::whereEmail($request->email)->first();
        
        if (!$user->enabled){
            return redirect($this->loginPath)           
                ->withErrors([
               'error' => 'Your account are not activated'
            ]);    
        }else{      
            $logged = Auth::attempt(
                [
                    'email' => $request->email, 
                    'password' => $request->password,                 
                ]
            );

            if ($logged) {            
                return redirect()->intended($this->redirectTo);            
            } else {                
                return redirect($this->loginPath)           
                    ->withErrors([
                   'error' => 'These credentials do not match our records'
                ]);
            } 
        }
    }
}
