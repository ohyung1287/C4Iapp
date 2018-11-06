<?php

namespace App\Http\Controllers;
use App\Residents;
use App\Rooms;
use Illuminate\Http\Request;
use Log;
class ResidentController extends Controller
{
    //
    public function index(){
        $residents=Residents::orderby('roomid','asc')->get();
        // foreach ($residents as $resident) {
            
        // }
        $rooms=Rooms::get();
        return view('resident',['residents'=>$residents,'rooms'=>$rooms]);
    }
    public function room(){
        $rooms=Rooms::get();
        foreach ($rooms as $room) {
            $count=Residents::where('roomid',$room->id)->count();
            $room->residents=$count;
        }

    	return view('room',['rooms'=>$rooms]);
    }
    public function add_resident(Request $request){
        // Log::notice($request);
    	$resident = new Residents;
        $resident->name=$request->name;
        $resident->roomid=$request->roomid;
        $resident->email=$request->email;
        $resident->mobile=$request->mobile;
        $resident->phone=$request->phone;
        $resident->save();
    }
    public function update_resident(Request $request){
        // Log::notice($request->all());
        Residents::where('id', $request->id)
          ->update(['name' => $request->name,'roomid' => $request->roomid,'email' => $request->email,
            'mobile' => $request->mobile,'phone' => $request->phone]);
        return "hello";
    }
    public function delete_resident(Request $request){
        // Log::notice($request->all());
        $list=explode(',',$request->remove_list);
        foreach($list as $one){
            Residents::where('id', $one)->delete();
        }
        return "Residents has been remove.";
    }
    public function add_room(Request $request){
        $room = new Rooms;
        $room->roomnumber=$request->roomnumber;
        $room->size=$request->size;
        $room->save();
    }
    public function update_room(Request $request){
        Residents::where('id', $request->id)
          ->update(['name' => $request->name,'roomid' => $request->roomid,'email' => $request->email,
            'mobile' => $request->mobile,'phone' => $request->phone]);
        return "hello";
    }
    public function delete_room(Request $request){
        // Log::notice($request->all());
        $list=explode(',',$request->remove_list);
        foreach($list as $one){
            Residents::where('id', $one)->delete();
        }
        return "Residents has been remove.";
    }
}
