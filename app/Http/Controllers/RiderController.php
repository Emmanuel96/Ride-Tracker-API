<?php

namespace App\Http\Controllers;

use App\Rider;
use App\User;

use Illuminate\Http\Request;

class RiderController extends Controller
{

    public function createRider(Request $request)
    {
        //first create a new user
        $user = User::create([
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'user_password' => app('hash')->make($request->user_password),
            'user_first_name' => $request->user_first_name,
            'user_last_name' => $request->user_last_name,
            'user_role' => 2,
            'user_company_id' => $request->user_company_id
        ]);

        //then create a new rider
        $rider = Rider::create([
            'rider_user_id' => $user->user_id
        ]);
    }

    public function getRiders($company_id, $user_role)
    {
        //if admin then please get all the riders
        if ($user_role == 0) {
            $riders = User::where('user_role', '=', 2)
                ->where('user_status', '!=', -10)
                ->join('rider', 'rider_user_id', 'user_id')
                ->get();
        } else if ($user_role == 1) {
            $riders = User::where('user_company_id', '=', $company_id)
                ->where('user_status', '!=', -10)
                ->where('user_role', '=', 2)
                ->join('rider', 'rider_user_id', 'user_id')
                ->get();
        } else {
            return 'error getting users';
        }
        //else if not admin then please get all the users
        $data = [
            'riders' => $riders
        ];

        return $riders;
    }


    public function getRider($id)
    {
        $rider = Rider::where('rider_user_id', '=', $id)
            ->join('users', 'user_id', 'rider_user_id')
            ->get();

        return $rider;
    }

    public function updateRider($id, Request $request)
    {
        $rider = User::find($id);
        $rider->user_name = $request->user_name;
        $rider->user_email = $request->user_email;
        $rider->user_password = $request->user_password;
        $rider->user_first_name = $request->user_first_name;
        $rider->user_last_name = $request->user_last_name;
        $rider->user_company_id = $request->user_company_id;


        $rider->save();

        return $rider;
    }

    public function getLocation(Request $request)
    {
    }

    public function postLocation()
    {
        return rider::get();
    }

    public function deleteRider($id)
    {
        $rider = User::find($id);

        $rider->user_status = -10;
        $rider->save();

        return 'successfully deleted';
    }
}
