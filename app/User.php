<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

//creating user model extending the Authenticatable class
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    //$fillable to insert the data in bulk
    protected $fillable = [
        'name', 'email', 'password','address','gender', 'dob', 'username', 'contact', 'role_id','photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password', 'remember_token',
    ];

    //establishing the one to one relationship with the roles model usin foreighn key role_id
    public function roles()
    {
        return $this->belongsTo('App\Role', 'role_id');
    }



}
