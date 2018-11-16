<?php

namespace App\Http\Controllers;
use App\Residents;
use App\Rooms;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Log;
use Mail;
use Hash;
use App\Mail\VerifyNewUser; 
class ResidentController extends Controller
{
    //
    public function index(){
        $residents=Residents::orderby('roomid','asc')->get();
        $users = User::where('resident_id','0')->first();
        $h=Hash::make("1234");
        // Log::notice($h);
        // Log::notice(Hash::check('1234', $h));
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
        $user = User::where('account',$request->email)->first();
        if($user!==null){//this email is already been used
            return "exist";
        }else{
            $resident->token=Str::random(8);
            $resident->name=$request->name;
            $resident->roomid=$request->roomid;
            $resident->email=$request->email;
            $resident->mobile=$request->mobile;
            $resident->phone=$request->phone;
            $resident->save();
        }
    }
    public function update_resident(Request $request){
        // Log::notice($request->all());
        Residents::where('id', $request->id)
          ->update(['name' => $request->name,'roomid' => $request->roomid,'email' => $request->email,
            'mobile' => $request->mobile,'phone' => $request->phone]);
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
        //return "hello";
    }
    public function user_registration($id,$token){
        $url='';
        $resident=Residents::where('id',$id)->first();

        $user = new User();
        $user->account=$resident->email;
        $user->password=Hash::make($token);
        $user->resident_id=$id;
        $user->save();
        return redirect('login');
    }
    public function registration_email(Request $request){
        $resident=Residents::where('id',$request->id)->first();
        
        set_time_limit(60);
        Mail::to($resident->email)->send(new VerifyNewUser($resident));
        return 'Email sending success';
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
