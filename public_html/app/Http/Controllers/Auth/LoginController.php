<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected  function redirectTo(){
        if(Auth::user()->role==1){
            //role 1==Admin
            return route('admin.dashboard');
        }
        elseif(Auth::user()->role==2){
            //role 2==user
            return route('user.dashboard');
        }
    }
    public  function login(Request $request){
        $input = $request->all();
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'

        ]);
        /*The attempt method accepts an array of key / value pairs as its first argument. 
        The values in the array will be used to find the user in your database table. 
        So, in the example above, the user will be retrieved by the value of the email column.
         */
        if(auth()->attempt(array('email'=>$input['email'],'password'=>$input['password']))){
            if(auth()->user()->role==1){
                return redirect()->route('admin.dashboard');
            }elseif(auth()->user()->role==2){
               return redirect()->route('user.dashboard');
               //return redirect()->route('/');
            }
        }else{
            return redirect()->route('login')->with('error','Email  and Password is incorrect');
        }

    }

}
