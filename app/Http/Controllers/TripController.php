<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Trips; 

class TripController extends Controller
{
    public function getTrips(){
        $trips = Trips::all(); 
        return $trips; 
    }

    public function getRiderTrips($id){
        $trips = Trips::where('rider_id' , '=', $id);

        return $trips; 
    }

    public function createTrip(Request $request){
        $trips = Trips::create([
            'pick_up_location'  => $request->pick_up_location, 
            'delivery_location' => $request->delivery_location, 
            'rider_id' => $request->rider_id
        ]);
        
        return $trips; 
    }
}
