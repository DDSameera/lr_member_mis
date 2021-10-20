<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory('App\User', 100)->create();


       //Demo Account
        DB::table('users')->insert([
            'id'=>800,
            'email' => 'digix.sameera@yahoo.com',
            'password' => Hash::make('hellomaster8120'),
            'remember_token' => Str::random(10),
        ]);

       DB::table('profiles')->insert([
           'user_id'=>800,
           'first_name'=>'Sameera',
           'last_name'=>'Dananjaya',
           'dob'=>'1987-11-26',
           'gender'=>'male',
           'contact_no'=>'0718761292',

       ]);
    }
}
