<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RiderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //for every rider, there should be a user created

        // DB::table('users')->insert([
        //     'email' => 'mike@wailodile.com',
        //     'password' => app('hash')->make('mike96'),
        //     'name' => 'Mike Peter',
        //     'rider_id' => 1
        // ]);

        // DB::table('rider')->insert([
        //     'rider_id' => 1,
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        // ]);

        // DB::table('users')->insert([
        //     'email' => 'emmanuel@wailodile.com',
        //     'password' => app('hash')->make('emmanuel96'),
        //     'name' => 'Emmanuel Audu',
        //     'rider_id' => 2
        // ]);

        // DB::table('rider')->insert([
        //     'rider_id' => 2,
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        // ]);
    }
}
