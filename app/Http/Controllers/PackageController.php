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
      $rooms=Rooms::get();
      $mailbox=Mailbox::where('available',0)->get();
      $residents=Residents::get();

      return view('package',['residents'=>$residents,'packages'=>$packages,'rooms'=>$rooms,'mailbox'=>$mailbox]);
    }


    public function add_package(Request $request){
        Log::notice($request);
    	  $package = new Packages;
        $package->roomId=$request->roomId;
        $package->packageName=$request->packageName;
        $package->packageInfo=$request->packageInfo;
        $package->mailboxId=$request->mailbox;
        $package->mailboxPW=$request->mailboxPW;
        $package->date=$request->date;
        $package->save();

        self::setMailBoxUnAva($request->mailbox,$request->mailboxPW);
    }


    public function add_mailbox(Request $request){
        $mailbox = new Mailbox;
        $mailbox->save();

    }


    public function setMailBoxUnAva( $mailbox_id,$mailboxPW) {
        //Log::notice($request);
        Mailbox::where('id',$mailbox_id)
          ->update(['available' => 1, 'password' => $mailboxPW]);

    }

    public function setMailBoxAva($mailbox_id) {
      //Log::notice($request);
      Mailbox::where('id',$mailbox_id)
        ->update(['available' => 0, 'password' => NULL]);

    }



}
