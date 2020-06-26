<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use \Auth;
use App\Role;
use Illuminate\Support\Facades\DB;
use Session;
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

    //check for authenticate user and add role name in session variable
    protected function authenticated(Request $request, $user)
    {

        if (Auth::check()) {
            $role_id =  Auth::user()->role_id;
            $role = Role::where('id', $role_id)->first()->name;
            Session::put('user', $role);

        }
        return redirect('/'); //redirect to home page
    }

    //check for user is valid or not using the status value
    protected function credentials(\Illuminate\Http\Request $request)
    {
        return ['email' => $request->{$this->username()}, 'password' => $request->password, 'status' => 1];
    }

    // method overwrites the exting method to take either username or email while login along with password
    protected function attemptLogin(Request $request) {
        $identity = $request->get("email");
        $password = $request->get("password");
        return \Auth::attempt([
            filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'username' => $identity,
            'password' => $password
        ]);
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
}
