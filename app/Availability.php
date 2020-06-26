<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
     //to specify the table name
     protected $table = 'availabilitys';

     protected $fillable = [
         'user_id',
        'unavailable_date'    ];

      //creating relationship on to many relationship with physio model
     public function physio()
     {
         return $this->belongsTo('App\Physio', 'physio_id');
     }
}
