<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//creating model for role
class Role extends Model
{
    protected $fillable = [
        'name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'roles';

    //method to get the role name from the role id
    static public function getRoleId($role)
    {
    	return Role::where('name', $role)->first()->id;

    }
}
