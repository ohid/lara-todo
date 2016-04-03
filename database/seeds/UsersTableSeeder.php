<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
        	'name' => 'ohidul',
        	'email' => 'ohidul.islam951@gmail.com',
        	'password' => Hash::make('111111')
        ]);
    }
}
