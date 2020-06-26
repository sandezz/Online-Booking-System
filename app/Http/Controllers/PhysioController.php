<?php

namespace App\Http\Controllers;
use App\Physio;
use App\User;
use App\Availability;
use Auth;
use Session;
Use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PhysioController extends Controller
{
         //get he add physio view
    public function index(){

       return view('add_physio');
   }

        //add the phsio after validation
   public function add_physio(Request $request){

    $this->validate($request,[
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'dob' => 'required',
        'contact' => 'required|min:10',
        'address' => 'required',
        'gender' => 'required',
        'contact' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
    ],[
     'description.required' => 'The first name field is required.',
     'description.min' => 'The first name must be at least 5 characters.',
 ]);
    
    if ($request->hasFile('image')) {
       $imageName = time().'.'.$request->image->getClientOriginalExtension();
       $request->image->move(public_path('images'), $imageName);
   }
   else
    $imageName  = null;
$data = User::create([
    'name' => $request['name'],
    'username' => $request['username'],
    'email' => $request['email'],
    'address' => $request['address'],
    'dob' => $request['dob'],
    'gender' => $request['gender'],
    'contact' => $request['contact'],
    'photo' => $imageName,
    'role_id' => '2',
    'password' => bcrypt($request['password']),
]);

Physio::create([
    'qualification' => $request['qualification'],
    'description' => $request['description'],
    'user_id' => $data->id]);

Session::flash('message', 'Counsellor Added Successfully'); 
Session::flash('alert-class', 'alert-success'); 
return redirect()->route('insert_physio');
}


public function change_availability(){
   
    return view('change_availability');
    
}

public function remove_availability(){
    $availability =   DB::table('availabilitys')
    ->where('user_id', Auth::id())
    ->select('*')
    ->orderBy('unavailable_date','ASC')
    ->get();
    return view('remove_availability')->withAvailability($availability);
}
public function delete_availability(Request $request, $ua_id){
    DB::table('availabilitys')->where('id', $ua_id)->delete();

            Session::flash('message', 'Successfully deleted.'); 
            Session::flash('alert-class', 'alert-success'); 
                           
            return redirect()->route('remove_availability');
}

//save the availability
public function save_availability(Request $request){
    $user_id = Auth::id();
    $date_selected = $request['date_selected'];
    $response = $this->check_availability($user_id, $date_selected );

    if($response == NULL)
    {
        $res = Availability::create([
        'user_id' => $user_id,
        'unavailable_date' => $date_selected,
        ]);

        if($res->exists)
        {

            Session::flash('message', 'Success. Your availability has been confirmed.'); 
            Session::flash('alert-class', 'alert-success'); 
                           
            return "success";
        }
        else{
            Session::flash('message', 'Error.Please try again later.'); 
            Session::flash('alert-class', 'alert-danger'); 
            return "Error. Please try again later.";
        }
  }
  else
    return "The selected date is not available. Please choose a date from other available.";
}

//check for availability of a paticular physio selected
public function check_availability($user_id, $date_selected ){
    $filter = ['user_id' => $user_id, 'unavailable_date' => $date_selected];
    return  Availability::where($filter)->first();

  }

  //check for [hysio unavailable time]
  public function get_unavailable_time(Request $request){
      if ($request->has('user_id'))
      {
        $physio = Physio::where('physio_id', $request['user_id'])->first();
        error_log($request['user_id']);
        $filter = ['user_id' => $physio->user_id];
      }
      else
      {
    
        $filter = ['user_id' =>  Auth::id()];
        }
    $res = Availability::where($filter)->get(['unavailable_date']);
    return $res->toJson();
  }


        //get all physio
public function physio_list(){
    $physio = Physio::with('user')->get();
   return view('physio_list')->withPhysio($physio);
   
}
    //update physio
public  function update_physio(Request $request, $physio_id){
 $physio = Physio::with('user')->where('physio_id', $physio_id)->get();
 return view('update_physio')->withPhysio($physio);
}

        //save the updated values
public function save_update_physio(Request $request, $physio_id){
    
    $physio_detail = Physio::with('user')->where('physio_id', $physio_id)->get();
    $this->validate($request,[
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username,'.$physio_detail[0]->user->id,
        'email' => 'required|string|email|max:255|unique:users,email,'.$physio_detail[0]->user->id,
        'dob' => 'required',
        'contact' => 'required',
        'address' => 'required',
        'gender' => 'required',
        'contact' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
    ],[
        'description.required' => 'The first name field is required.',
        'description.min' => 'The first name must be at least 5 characters.',
    ]);

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


$physio = Physio::where('physio_id', $physio_id)->first();

$physio->description = $request['description'];

$physio->qualification = $request['qualification'];

if ($physio->user) {

    $physio->user->name = $request['name'];
    
    $physio->user->username = $request['username'];

    $physio->user->email = $request['email'];

    $physio->user->address = $request['address'];

    $physio->user->dob = $request['dob'];

    $physio->user->gender = $request['gender'];
    
    $physio->user->contact = $request['contact'];
    
    $physio->user->photo = $image;

    $physio->user->save();
}
   $physio->save(); // save data to database

   Session::flash('message', 'Physio Updated Successfully'); 
   Session::flash('alert-class', 'alert-success'); 
   return redirect()->route('physio_list');
}
}
