<?php

namespace App\Http\Controllers;
use App\Residents;
use App\Rooms;
use App\Mailbox;
use App\Packages;

use Illuminate\Http\Request;
use Log;
class PackageController extends Controller
{
    //
    public function index(){
      $packages = Packages::get();


      return view('package',['packages'=>$packages]);
    }


    public function add_package(Request $request){
        Log::notice($request);
    	  $package = new Packages;
        $package->roomId=$request->roomId;
        $package->packageName=$request->packageName;
        $package->packageInfo=$request->packageInfo;
        $package->mailbox=$request->mailbox;
        $package->mailboxPW=$request->mailboxPW;
        $package->save();
    }



    public function add_mailbox(Request $request){
        $mailbox = new Mailbox;
        $mailbox->save();

    }
}
