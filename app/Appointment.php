<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


//create model for appointment
class Appointment extends Model
{
    //
	public $timestamps = false;
	

   protected $fillable = [
    'user_id',
    'physio_id',
    'appointment_date',
    'appointment_time',
    'remarks',
    'status'
];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    //to specify the table name
    protected $table = 'appointments';
    

    //creating relationship on to many relationship with physio model
    public function physio()
    {
        return $this->belongsTo('App\Physio', 'physio_id');
    }


}
