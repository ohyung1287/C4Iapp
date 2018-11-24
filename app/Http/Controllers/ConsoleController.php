<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Residents;
use App\User;
use Log;
use Session;
use Hash;
use Url;
use Illuminate\Support\Facades\Input;
class ConsoleController extends Controller
{

    public function error(Request $request){
        Log::notice('123');
        return view('error');
    }

    public function index(Request $request){
    	if($request->session()->get('resident_id')=='-1')
    	   
    	return view('index');
    else 
    	return redirect('error');
    }
    public function profile_update(Request $request){

        $rid=Session::get('resident_id');
        Log::notice($rid);
        $filename = Residents::where('id',$rid)->first()->photo;
        if(Input::hasFile('photo')){
            $file = Input::file('photo');
            $filename='profile_'.$rid.'.jpg';
            $file->move('images',$filename);
        }
        Residents::where('id',$rid)->update(['name' => $request->name,'email' => $request->email,
            'mobile' => $request->mobile,'phone' => $request->phone,'token'=>$request->password,'photo'=>$filename]);
        User::where('resident_id',$rid)->update(['account'=>$request->email,'password'=>Hash::make($request->password)]);
        return redirect()->route('profile', ['id' => $rid]);
    }
    public function profile(Request $request,$id){
        $rid=Session::get('resident_id');
        Log::notice($rid);
        if($request->session()->get('resident_id')>0){
            $r=Residents::leftJoin('rooms', 'residents.roomid', '=', 'rooms.id')->where('residents.id',$id)->first();
           return view('profile',['resident'=>$r]);
        }else return 'error';
    }
    public function ui(Request $request){
    	if($request->session()->get('resident_id')>0)
    	   return view('userinterface');
  		else return'error';
    }
    public function console(Request $request){
    	if($request->session()->get('resident_id')>0)
    	   return view('userinterface');
    	else if($request->session()->get('resident_id')==-1)
    		return view('index');
  		else return redirect('error');
    }
}
