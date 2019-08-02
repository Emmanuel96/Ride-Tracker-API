<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;

class TripController extends Controller
{
    public function getTrips(){
        $trips = Trip::all(); 
        return $trips; 
    }

    public function getTrip($id){
        $trip = Trip::find($id); 
        return $trip; 
    }

    public function getRiderTrips($id){
        $trips = Trip::where('rider_id' , '=', $id)
                ->where('delivery_status', '!=', 1)
                ->where('delivery_status','!=', 0)
                ->get();

        return $trips; 
    }

    public function completeTrip($id){
        $trip = Trip::find($id); 

        $trip->delivery_status = '1'; 
        $trip->save(); 

        return 'Trip Successfully Edited'; 
    }

    public function createTrip(Request $request){
        $trip = Trip::create([
            'pickup_time' => $request->pickup_location,
            'pick_up_location'  => $request->pickup_location, 
            'delivery_location' => $request->delivery_location, 
            'delivery_time' => $request->delivery_time,
            'rider_id' => $request->rider_id
        ]);        
        return $trip;    
    }

    public function getRiderCompletedTrips($id){
        $trips = Trip::where('rider_id', '=', $id)
                        ->where('delivery_status', '=', 1)->get(); 
        return $trips;
    }

    public function testTrips(){
        return ' i am working';
    }

    public function cancelTrip($id){
        $trip = Trip::find($id); 

        $trip->delivery_status = 0; 
        $trip->save(); 

        return 'successful Cancellation';
    }
}
