<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//creating model for physio table
class Physio extends Model
{
    public $timestamps = false;
	
    //specifying the custom primary key
    protected $primaryKey = 'physio_id';

    protected $fillable = [
        'user_id',
        'qualification',
        'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    //giving the table name
    protected $table = 'physios';

    //creating one one to one relationship with user model
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id')->withTrashed();
    }


}
