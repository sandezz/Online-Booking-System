<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Physio;
use App\User;
use Auth;
use DB;
use Mail;
use Session;
use Illuminate\Http\Request;
use App\Mail\ConfirmationMail;
use App\Mail\CancelMail;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

// make the appointment
    public function make_appointment(){
      $physio =   DB::table('physios')
      ->join('users', 'physios.user_id', '=', 'users.id')
      ->where('users.status', '1')
      ->select('users.*', 'physios.*')
      ->get();
      return view('make_appointment')->withPhysio($physio);
    }

//check for doctor availability
    public function check_availability(Request $request){
      return "success";
    }

//save the appointment
    public function save_appointment(Request $request){
      $physio_id = $request['physio_id'];
      $date_selected = $request['date_selected'];
      $time_selected = $request['time_selected'];
      $logged_user = Auth::id();
      $response = $this->check_appointment($physio_id, $date_selected, $time_selected );

      if($response == NULL)
      {
       $res = Appointment::create([
        'physio_id' => $physio_id,
        'user_id' => $logged_user,
        'appointment_date' => $date_selected,
        'appointment_time' => $time_selected,
      ]);

       if($res->exists)
       {

        Session::flash('message', 'Success.Your appointment has been confirmed.'); 
        Session::flash('alert-class', 'alert-success'); 
        $user = Auth::user();
        //send confrimtion mail to user
       
        Mail::to($user->email)->send(new ConfirmationMail($res,$user));
       
        return "success";
      }
      else{
        Session::flash('message', 'Error.Please try again later.'); 
        Session::flash('alert-class', 'alert-danger'); 
        return "Error.Please try again later.";
      }
    }
    else
      return "The selected time is not available.Please choose a time from other available.";
  }


//check for booked time according to the date selected
  public function check_booked_time(Request $request){
    $filter = ['physio_id' => $request['physio_id'], 'appointment_date' => $request['date_selected'], 'status' => '1'];
    $res = Appointment::where($filter)->get(['appointment_time']);
    return $res->toJson();
  }

//check for appointment of a paticular physio selected
  public function check_appointment($physio_id, $date_selected, $time_selected ){
    $filter = ['physio_id' => $physio_id, 'appointment_date' => $date_selected, 'appointment_time' => $time_selected, 'status' => '1'];
    return  Appointment::where($filter)->first();

  }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    //get all the appointments record
    public function appointment_list(){
      $physio =   DB::table('appointments')
      ->join('physios', 'physios.physio_id', '=', 'appointments.physio_id')
      ->join('users as u', 'u.id', '=', 'physios.user_id')
      ->join('users as u1', 'u1.id', '=', 'appointments.user_id')
      ->where('appointments.user_id', Auth::id())
      ->select('u.name AS physio_name','u1.name AS customer_name', 'appointments.*', 'physios.*')
      ->orderBy('appointment_date', 'desc')
      ->orderBy('appointment_time', 'asc')
      ->get();
      return view('appointment_list')->withPhysio($physio);
    }

      //get only the selected pysio appointments
    public function physio_appointments(){
     $physio =   DB::table('appointments')
     ->join('physios', 'physios.physio_id', '=', 'appointments.physio_id')
     ->join('users as u', 'u.id', '=', 'physios.user_id')
     ->join('users as u1', 'u1.id', '=', 'appointments.user_id')
     ->where('physios.user_id', Auth::id())
     ->select('u.name AS physio_name','u1.name AS customer_name', 'appointments.*', 'physios.*')
     ->orderBy('appointment_date', 'desc')
     ->orderBy('appointment_time', 'asc')
     ->get();
     return view('appointment_list')->withPhysio($physio);
   }

    //get the paticular appointment details
   public function get_appointment(Request $request, $app_id){
     $app =   DB::table('appointments')
     ->join('physios', 'physios.physio_id', '=', 'appointments.physio_id')
     ->join('users as u', 'u.id', '=', 'physios.user_id')
     ->join('users as u1', 'u1.id', '=', 'appointments.user_id')
     ->where('appointments.id', $app_id)
     ->select('u.name AS physio_name','u1.name AS customer_name', 'appointments.*', 'physios.*')
     ->get();
     return view('appointment_details')->withApp($app);
   }

   //to display all the appointments
   public function all_appointments(){
    $physio =   DB::table('appointments')
    ->join('physios', 'physios.physio_id', '=', 'appointments.physio_id')
    ->join('users as u', 'u.id', '=', 'physios.user_id')
    ->join('users as u1', 'u1.id', '=', 'appointments.user_id')
    ->select('u.name AS physio_name','u1.name AS customer_name', 'appointments.*', 'physios.*')
    ->orderBy('appointment_date', 'desc')
     ->orderBy('appointment_time', 'asc')
    ->get();
    return view('appointment_list')->withPhysio($physio);
  }


    //To display the User specific appointment 
  public function view_appointments(Request $request, $user_id){
    $physio =   DB::table('appointments')
    ->join('physios', 'physios.physio_id', '=', 'appointments.physio_id')
    ->join('users as u', 'u.id', '=', 'physios.user_id')
    ->join('users as u1', 'u1.id', '=', 'appointments.user_id')
    ->where('physios.physio_id', $user_id)
    ->select('u.name AS physio_name','u1.name AS customer_name', 'appointments.*', 'physios.*')
    ->orderBy('appointment_date', 'desc')
     ->orderBy('appointment_time', 'asc')
    ->get();

    return view('appointment_list')->withPhysio($physio);
  }

    //update the appointment
  public function update_appointment(Request $request, $app_id){
    $app = Appointment::where('id', $app_id)->first();
    $app->remarks = $request->remarks;
    $app->save();
    Session::flash('message', 'Remarks Saved Succesfully.'); 
    Session::flash('alert-class', 'alert-success'); 
    return redirect()->route('physio_appointments');
  }

    //cancel the appointment
  public function cancel_appointment(Request $request, $appointment_id){
    $app = Appointment::where('id', $appointment_id)->first();
    $app->status = '0';
    $app->save();
    Session::flash('message', 'Appointment cancelled Succesfully.'); 
    Session::flash('alert-class', 'alert-success'); 
    $user = Auth::user();
        //send confrimtion mail to user
    Mail::to($user->email)->send(new CancelMail($user));
    return back();
  }
  
}
