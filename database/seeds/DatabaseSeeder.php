<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	  DB::table('roles')->insert([[
            'id' => '1',
            'name' => 'admin'
        ],

		[
            'id' => '2',
            'name' => 'physio'
        ],

        [
            'id' => '3',
            'name' => 'customer'
        ]]
    );
        
        DB::table('users')->insert([
            'name' => 'admin',
            'username' => 'admin',
            'role_id' => '1',
            'email' => 'sandeshb17@gmail.com',
            'address' => 'Sydney, NSW',
            'contact' => '0450252525',
            'gender' => 'male',
            'dob' => '1980-05-10',
            'password' => bcrypt('admin')
        ]);
    }
}
