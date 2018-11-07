<?php

namespace App\Http\Controllers;

use App\FacilityBooking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FacilityBookingController extends Controller
{
    //
    public function index(){
        $facility_booking = FacilityBooking::get();


        return view('facility_boooking',['facility_boooking'=>$facility_boooking]);
    }


    public function add_facility_boooking(Request $request){
        $facility_booking = new FacilityBooking();
        $facility_booking->roomNumber=$request->roomNumber;
        $facility_booking->facility_name=$request->facility_name;
        $facility_booking->duration=$request->duration;
        $facility_booking->fee=$request->fee;
        $facility_booking->facility_desc=$request->facility_desc;
        $facility_booking->time_in=$request->time_in;
        $facility_booking->time_out=$request->time_out;
        $facility_booking->save();
    }

    public function update_facility_booking(Request $request){
        facility_boookings::where('id', $request->id)
            ->update(['roomNumber' => $request -> roomNumber,'facility_name' => $request->facility_name,
                'duration' => $request->duration, 'fee' => $request->fee, 'facility_desc' => $request->facility_desc,
                'time_in' => $request->time_in,'time_out' => $request->time_out]);
        return "This booking has been updated!";
    }
    public function delete_facility_booking(Request $request){
        $list=explode(',',$request->remove_list);
        foreach($list as $one){
            FacilityBooking::where('id', $one)->delete();
        }
        return "This booking has been removed!";
    }
}
