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

        DB::table('users')->insert([
            'email' => 'digix.sameera@yahoo.com',
            'password' => Hash::make('hellomaster8120'),
            'remember_token' => Str::random(10),
        ]);
    }
}
