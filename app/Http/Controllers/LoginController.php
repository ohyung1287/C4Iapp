<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Administrators;
use Log;
use App\Residents;
use App\User;
use Hash;
use Form;
class LoginController extends Controller
{
    //
    public function index(){
    	return view('login');
    }
    public function console(){
    	Log::notice('here');
    	return view('index');
    }
    public function login(Request $request){
    	
    	$user=User::where('account',$request->account)->first();
    	Log::notice($user);
        if($user!=null){
            if(Hash::check($request->password, $user->password)){
            Log::notice('success');
        /*store a value into session*/
            $request->session()->put('user_id',$user->resident_id);
            Log::notice($request->session()->get('user_id'));
        /*--------------------------*/
            return "success";//success
            }else return "wrong";
        }else return "not exist";
    	
    }
}
