<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use \Auth;
use App\Physio;
use DB;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;

class ProfileController extends Controller
{

    //update the user profile
    public  function update_profile(){
     $user = User::where('id', Auth::id())->get();
     return view('update_profile')->withUser($user);

 }
// save the input field value to save the user profile
 public function save_update_profile(Request $request){

    $this->validate($request,[
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username,'.Auth::id(),
        'email' => 'required|string|email|max:255|unique:users,email,'.Auth::id(),
        'dob' => 'required',
        'contact' => 'required',
        'address' => 'required',
        'gender' => 'required',
    ]);
        //check the input field has image or not
    if ($request->hasFile('image')) {
       $image = time().'.'.$request->image->getClientOriginalExtension();
       $request->image->move(public_path('images'), $image);

       if($request->has('old_image')){
         $path= 'images/'.$request->old_image;
         if (file_exists($path))
            unlink(public_path( $path));
    }
}else{

   $image = $request->old_image;
}



$user = User::where('id', Auth::id())->first();

$user->name = $request['name'];

$user->username = $request['username'];

$user->email = $request['email'];

$user->address = $request['address'];

$user->gender = $request['gender'];

$user->photo = $image;

$user->contact = $request['contact'];

$user->save();
Session::flash('message', 'Your Profile has been successfully updated.'); 
Session::flash('alert-class', 'alert-success'); 
return redirect()->route('profile');
}

//get the user profile using the session id
public function profile(){
   $user = User::where('id', Auth::id())->get();
   return view('profile')->withUser($user);

}

//to display the selected customer profile using get method to get the id
public function customer_profile(Request $request, $user_id){
   $user = User::where('id', $user_id)->get();
   return view('customer_profile')->withUser($user);
}

//to display the physio profile  using get method to get the id
public function physio_profile(Request $request, $physio_id){

    $physio = Physio::with('user')->where('physio_id', $physio_id)->get();
    return view('physio_profile')->withPhysio($physio);

}

//block the selected user
public function block_user(Request $request, $user_id){
    $user = User::where('id', $user_id)->first();
    $user->status = '0';
    $user->save();
    $user->delete();
    Session::flash('message', 'User blocked Succesfully.'); 
    Session::flash('alert-class', 'alert-success'); 
       // return redirect()->route('appointment_list');
    return back();
}

//unblock the selected user
public function unblock_user(Request $request, $user_id){

    $user = User::withTrashed()
                ->where('id', $user_id)->first();
    $user->restore();
    $user->status = '1';
    $user->save();
    Session::flash('message', 'User unblocked Succesfully.'); 
    Session::flash('alert-class', 'alert-success'); 
    return back();
}

//get all the record of customer
public function get_all_customer(){
    $customer =   DB::table('users')
    ->join('roles', 'roles.id', '=', 'users.role_id')
    ->where('roles.name', 'customer')
    ->select('users.*')
    ->get();
    return view('customer_list')->withCustomer($customer);
}

}
