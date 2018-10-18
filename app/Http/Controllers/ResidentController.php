<?php

namespace App\Http\Controllers;
use Resident;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    //
    public function index(){
    	return view('resident');
    }
    public function add_resident(Request $request){
    	dd($request);
    }
}
