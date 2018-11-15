<?php

namespace App\Http\Controllers;

use App\Facilities;
use App\FacilityBooking;
use App\Rooms;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Log;

class FacilityBookingController extends Controller
{
    //
    public function index(){
        $facility_booking = FacilityBooking::get();
        $facilities = Facilities::get();
        $rooms=Rooms::get();

        //Log::notice($facilities);
        return view('facility_booking',['facility_booking'=>$facility_booking, 'facilities'=>$facilities, 'rooms'=>$rooms]);
    }


    public function add_facility_booking(Request $request){
        $facilities = Facilities:: where('facility_name',$request->facility_name)->get();
        $fee = 0;
        $duration = 0;
        $facility_desc = '';
        Log::notice($request->facility_name);
        foreach($facilities as $one){
            Log::notice($one);

            $duration = $one -> duration;
            $fee = $one -> fee;
            $facility_desc = $one -> facility_desc;
        }
        $facility_booking = new FacilityBooking();
        $facility_booking->roomNumber=$request->roomNumber;
        Log::notice($request->roomNumber);
        $facility_booking->facility_name=$request->facility_name;
        $facility_booking->duration=$duration;
        $facility_booking->fee=$fee;
        $facility_booking->facility_desc=$facility_desc;
        $facility_booking->time_in=$request->time_in;
        $facility_booking->time_out=$request->time_out;


        $facility_booking->save();
    }

    public function update_facility_booking(Request $request){
        $facilities = Facilities:: where('facility_name',$request->facility_name)->get();
        $fee = 0;
        $duration = 0;
        $facility_desc = '';
        Log::notice($request->facility_name);
        foreach($facilities as $one){
            Log::notice($one);

            $duration = $one -> duration;
            $fee = $one -> fee;
            $facility_desc = $one -> facility_desc;
        }

        facility_boookings::where('id', $request->id)
            ->update(['roomNumber' => $request -> roomNumber,'facility_name' => $request->facility_name,
                'duration' => $duration, 'fee' => $fee, 'facility_desc' => $facility_desc, 'time_in' => $request->time_in,'time_out' => $request->time_out]);
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
