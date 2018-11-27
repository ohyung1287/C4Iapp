<?php

namespace App\Http\Controllers;

use App\Parking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParkingController extends Controller
{
    public function index(){
        $spaceA=Parking::where('state','0')->where('location','A')->get();
        $spaceB=Parking::where('state','0')->where('location','B')->get();
        $spaceC=Parking::where('state','0')->where('location','C')->get();
        $spaceD=Parking::where('state','0')->where('location','D')->get();
        $spaceE=Parking::where('state','0')->where('location','E')->get();
        return view('availableParking',['spaceA'=>$spaceA,'spaceB'=>$spaceB,'spaceC'=>$spaceC,'spaceD'=>$spaceD,'spaceE'=>$spaceE]);
    }
}
