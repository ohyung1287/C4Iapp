<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsoleController extends Controller
{
    //
    public function index(){
    	return view('index');
    }

    public function ui(){
      return view('userinterface');
    }
}
