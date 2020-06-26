<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\Role;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return "afd";

        return view('home');
    }

/*    public function getUserRole(){

        $role_id =  Auth::user()->role_id;
        return Role::where('id', $role_id)->first()->name;

    }*/
}
