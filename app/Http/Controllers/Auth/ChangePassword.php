<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use \Auth;
use \Hash;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;

class ChangePassword extends Controller
{


public function admin_credential_rules(array $data)
{
  $messages = [
    'current-password.required' => 'Please enter current password',
    'password.required' => 'Please enter password',
  ];

  $validator = Validator::make($data, [
    'current-password' => 'required',
    'password' => 'required|same:password',
    'password_confirmation' => 'required|same:password',     
  ], $messages);

  return $validator;
}  

    
    public  function change_password(){
       // return "hell, ";
        return view('change_password');
    
    }

public function save_password(Request $request)
{
  if(Auth::Check())
  {
    $request_data = $request->All();
    $validator = $this->admin_credential_rules($request_data);
    if($validator->fails())
    {
    Session::flash('message', $validator->getMessageBag()); 
    Session::flash('alert-class', 'alert-danger'); 
      //return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
    }
    else
    {  
      $current_password = Auth::User()->password;           
      if(Hash::check($request_data['current-password'], $current_password))
      {           
        $user_id = Auth::User()->id;                       
        $obj_user = User::find($user_id);
        $obj_user->password = Hash::make($request_data['password']);;
        $obj_user->save(); 
        Session::flash('message', 'Your Password has been successfully updated.'); 
        Session::flash('alert-class', 'alert-success'); 
       return redirect()->route('profile');
      }
      else
      {           
        Session::flash('message', 'Please enter correct current password'); 
        Session::flash('alert-class', 'alert-danger'); 

        //return response()->json(array('error' => $error), 400);   
      }
    }  
         return view('change_password');      
  }
  else
  {
    return redirect()->to('/');
  }    
}
        
}
