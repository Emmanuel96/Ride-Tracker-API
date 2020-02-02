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

        //quickly create a company

        DB::table('company')->insert([
            'company_name' => 'Wailodile',
            'company_address' => 'Ajah Lagos',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // for every rider, there should be a user created

        DB::table('users')->insert([
            'user_email' => 'bello@wailodile.com',
            'user_name' => 'mrbello',
            'user_password' => app('hash')->make('bello94'),
            'user_first_name' => 'Sumai',
            'user_last_name' => 'Bello',
            'user_role' => 2, //role 2 is for a rider
            'user_company_id' => 1
        ]);

        DB::table('rider')->insert([
            'rider_user_id' => 1,
            'rider_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);


        DB::table('users')->insert([
            'user_email' => 'bello2@wailodile.com',
            'user_name' => 'mrbello2',
            'user_password' => app('hash')->make('bello94'),
            'user_first_name' => 'Sumai',
            'user_last_name' => 'Bello',
            'user_role' => 2, //role 2 is for a rider
            'user_company_id' => 2
        ]);

        DB::table('rider')->insert([
            'rider_user_id' => 2,
            'rider_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'user_email' => 'emmanuel@wailodile.com',
            'user_name' => 'emmanuel96',
            'user_password' => app('hash')->make('emmanuel96'),
            'user_first_name' => 'Emmanuel',
            'user_last_name' => 'Audu',
            'user_role' => 0, //role 0 is for an admin
            'user_company_id' => 1
        ]);

        DB::table('users')->insert([
            'user_email' => 'kole@wailodile.com',
            'user_name' => 'emmanuel96_2',
            'user_password' => app('hash')->make('emmanuel96'),
            'user_first_name' => 'Adakole',
            'user_last_name' => 'Audu',
            'user_role' => 1, //role 1 is for an admin
            'user_company_id' => 1
        ]);
    }
}
