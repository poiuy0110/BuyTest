<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

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


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'customlogout']]);
    }


    public function username()
    {
        return 'user_id';
    }



    public function customlogout(Request $request) {
        Auth::logout();
        return redirect()->intended('admin/login');
      }





    public function authenticate(Request $request)
    {
        if (Auth::guard("admin")->attempt(['user_id' => $request->input("username"), 'password' => $request->input("password")])) {
            // 認證通過...
            return redirect()->intended('admin/home');
            //echo "111";
        } else {
            return  redirect()->back();
        }
        
    }


   
}
