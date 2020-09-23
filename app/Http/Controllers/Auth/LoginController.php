<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;

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
        $this->middleware('guest:admin')->except('logout');
    }

    public function showAdminLoginForm(){
        return view('admin.auth.login', ['url' => 'admin']);
    }

    public function adminLogin(AdminLoginRequest $request)
    {
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], true)) {

            return redirect()->intended('/admin/home');
        }else{
            Session::flash('error','Username or Password is incorrect!');
        }

        return back()->withInput($request->only('email', 'remember'));
    }

    public function geetLogout(){
//       return Auth::logout();
    }


}
