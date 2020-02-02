<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;

class TripController extends Controller
{
    public function getTrips()
    {
        $trips = Trip::all();
        return $trips;
    }

    public function getCompanyTrips($company_id, $user_role)
    {
        if ($user_role == 0) {
            $trips = Trip::all();
            return $trips;
        } else if ($user_role == 1) {
            $trips = Trip::where('trip_company_id', '=', $company_id)
                ->where('delivery_status', '!=', -10)
                ->get();
            return $trips;
        } else if ($user_role == 2) {
            // that's for later, if we decide to merge them
        }
        // $trips = DB::table('trips')
        //             ->join('')
    }

    public function getTrip($id)
    {
        $trip = Trip::find($id);
        return $trip;
    }

    // 0 -- cancelled trip
    // -1 -- new trip
    // 1 -- completed trip

    public function getRiderTrips($id)
    {
        $trips = Trip::where('trip_rider_id', '=', $id)
            ->where('delivery_status', '!=', 1)
            ->where('delivery_status', '!=', -2)
            ->where('delivery_status', '!=', -10)
            ->get();

        return $trips;
    }

    public function getOngoingTrips($id)
    {
        $trips = Trip::where('trip_rider_id', '=', $id)
            ->where('delivery_status', '!=', 1)
            ->where('delivery_status', '!=', 2)
            ->get();
    }

    public function completeTrip($id)
    {
        $trip = Trip::find($id);

        $trip->delivery_status = '1';
        $trip->save();

        return 'Trip Successfully Edited';
    }

    public function pickUp($id)
    {
        $trip = Trip::find($id);

        $trip->delivery_status = '0';
        $trip->save();

        return 'Successful Pick up';
    }

    public function createTrip(Request $request)
    {
        info($request->all());
        $trip = Trip::create([
            'trip_company_id' => $request->trip_company_id,
            'pickup_date_time' => $request->pickup_time,
            'pick_up_location'  => $request->pickup_location,
            'delivery_location' => $request->delivery_location,
            'delivery_time' => $request->delivery_time,
            'trip_rider_id' => $request->rider_id,
            'delivery_phone_number' => $request->delivery_phone_number,
            'pickup_phone_number' => $request->pickup_phone_number,
        ]);
        return $trip;
    }

    public function updateTrip(Request $request)
    {
        info($request->all());
        $trip = Trip::where('trip_id', '=', $request->trip_id)->first();

        $trip->trip_company_id = $request->trip_company_id;
        // $trip->pickup_date_time = $request->pickup_time;
        $trip->pick_up_location  = $request->pickup_location;
        $trip->delivery_location = $request->delivery_location;
        $trip->delivery_time = $request->delivery_time;
        $trip->delivery_phone_number = $request->delivery_phone_number;
        $trip->pickup_phone_number = $request->pickup_phone_number;

        $trip->save();
        return $trip;
    }

    public function getRiderCompletedTrips($id)
    {
        $trips = Trip::where('trip_rider_id', '=', $id)
            ->where('delivery_status', '=', 1)->get();
        return $trips;
    }

    public function testTrips()
    {
        return ' i am working';
    }

    public function cancelTrip($id)
    {
        $trip = Trip::find($id);

        $trip->delivery_status = -2;
        $trip->save();

        return 'successful Cancellation';
    }


    //delete trips, we change their status to -10
    public function deleteTrip($id)
    {
        $trip = Trip::find($id);

        $trip->delivery_status = -10;

        $trip->save();

        return 'deleted successfully';
    }
}
