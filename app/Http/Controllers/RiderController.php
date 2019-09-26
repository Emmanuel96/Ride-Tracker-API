<?php

namespace App\Http\Controllers;

use App\Rider;
use App\User;

use Illuminate\Http\Request;

class RiderController extends Controller
{

    public function createRider(Request $request){
        //first create a new user
        $user = User::create([
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'user_password' => app('hash')->make($request->user_password),
            'user_first_name' => $request->user_first_name,
            'user_last_name' => $request->user_last_name,
            'user_role' => $request->user_role,
            'user_company_id' => $request->user_company_id
        ]);

        //then create a new rider
        $rider = Rider::create([
            'rider_user_id' => $user->user_id
        ]);

        return 'successful creation';
    }

    public function getRiders(Request $request){
        //if admin then please get all the riders
        if($request->user_role == 0){
            $riders = User::where('user_role', '=', 2)->get();
        }else if($request->user == 1){
            $riders = User::where('user_company_id', '=', $request->user_company_id)->get();
        }else{
            return 'error getting users';
        }
        //else if not admin then please get all the users
        $data = [
            'riders' => $riders
        ];

        return $riders;
    }

    public function getRider($id){
        $rider = rider::find($id);
        return $rider;
    }

    public function getLocation(Request $request){

    }

    public function postLocation(){
        return rider::get();
    }
}

