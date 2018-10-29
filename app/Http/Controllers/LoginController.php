<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Administrators;
class LoginController extends Controller
{
    //
    public function index(){
    	return view('login');
    }
    public function login(Request $request){
    	dd($request);
    	$admin=Administrators::get();
    	return view('login',['a'=>$admin]);
    }
}
