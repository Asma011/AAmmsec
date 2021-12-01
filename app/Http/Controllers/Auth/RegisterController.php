<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],   
            'last_name' => ['required', 'string', 'max:255'],                   
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
        
    //     return User::create([
            
    //         'user_name' => $data['first_name']+' '+$data['first_name'],
    //         'first_name' => $data['name'],
    //         'last_name' => $data['name'],
    //         'email' => $data['email'],            
    //         'password' => Hash::make($data['password']),
    //         'mobile_no'=>$data['email'], 
    //         'auth_level'=>1,
    //         'role'=>1,            
    //         'status'=>1,            
    //     ]);
    // }
    function register(Request $request ){
       
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
                    
        ]);
        $user= new User();
        $user->user_name = $request->first_name.' '.$request->last_name;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password =  Hash::make($request->password);
        $user->mobile_no=$request->mobile_no;
        $user->auth_level = 2;
        $user->role = "2";
        $user->status=1;
        
        if($user->save()){

            return redirect()->back()->with('success','Registred Successfully!');
            
        }else{
            
            return redirect()->back()->with('error','Failed to save! Please Retry ');
        }
    }
}
