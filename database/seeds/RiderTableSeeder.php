<?php

use Illuminate\Database\Seeder;

class RiderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rider')->insert([
            'rider_email' => 'mike@wailodile.com',
            'rider_first_name' => 'Mike', 
            'rider_password' => app('hash')->make('mike96'), 
            'rider_last_name' => 'Peter', 
            'rider_user_name' => 'mike'
        ]);

        DB::table('rider')->insert([
            'rider_email' =>'emmanuel@wailodile.com',
            'rider_first_name' => 'Emmanuel', 
            'rider_password' => app('hash')->make('emma96'), 
            'rider_last_name' => 'Audu', 
            'rider_user_name' => 'emma'
        ]);
    }
}
