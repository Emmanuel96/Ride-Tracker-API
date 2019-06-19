<?php

namespace App\Http\Controllers;

use app\rider; 

use Illuminate\Http\Request;

class RiderController extends Controller
{
    public function getRiders(){
        $riders = rider::all(); 
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

