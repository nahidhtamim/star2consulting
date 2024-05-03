<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

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


    protected function authenticated()
    {
        if(Auth::user()->is_admin == '1') //1 = Admin Login
        {
            return redirect('admin/dashboard')->with('status','Welcome to Admin Dashboard');
        }
        elseif(Auth::user()->is_admin == '0') // Normal or Default User Login
        {
            return redirect('/')->with('status','Logged in successfully');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function login(Request $request)
    // {
    //     $validated = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
    //           if (auth()->user()->is_admin==1) {
    //                return redirect()->route('admin.admin-dashboard');
    //           }else{
    //               return redirect()->route('home');
    //           }
              
    //     }else{
    //         //invalid credentials
    //         return redirect()->route('login')->with('error','Invalid Credentials');
    //     }

    // }
}
