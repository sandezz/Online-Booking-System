<?php

namespace App\Http\Middleware;
//namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

//use View;
//use Auth;
use Closure;

class FindRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //role
      //  $role_id =  Auth::user()->role_id;

    /*    $role_id = 3;
        $role = Role::where('id', '3')->first()->name;
        session()->put('role', $role);*/
        //echo "hello";
        return $next($request);
    }
}
