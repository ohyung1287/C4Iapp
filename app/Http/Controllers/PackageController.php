<?php

namespace App\Http\Controllers;
use App\Residents;
use App\Rooms;
use App\Mailbox;
use App\Packages;



use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Log;
use Mail;
use Hash;
use App\Mail\ConfirmPackage;

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


        $packageGet=Packages::where('mailboxId',$request->mailbox)->first();
        $resident=Residents::where('roomid',$request->roomId)
                    ->where('name', 'like', '%'.$request->packageName.'%')
                    ->first();
        if ($resident == null){
          $resident=Residents::where('roomid',$request->roomId)
                      ->first();
        }
        self::package_email($resident,$packageGet);
    }



    public function package_email($resident,$package){
        //Log::notice($request);
        set_time_limit(60);
        Mail::to($resident->email)->send(new ConfirmPackage($resident,$package));
        return 'Email sending success';
    }


    public function pack_confirm($id,$packid){
        //$url='';

        Packages::where('id',$packid)->update(['status' => 0]);
        return redirect('login');

    }


    public function update_package(Request $request){
        Log::notice($request);
        $mailbox_id_old = $request->mailbox_id_old;

        Packages::where('id', $request->package_id)
          ->update(['roomId' => $request->roomId,'packageName' => $request->packageName,
            'packageInfo' =>$request->packageInfo,'mailboxId' =>$request->mailbox,
            'mailboxPW' =>$request->mailboxPW,'date' =>$request->date]);
        // return redirect('index');
        if($request->mailbox != $mailbox_id_old){
          self::setMailBoxAva($mailbox_id_old);
          self::setMailBoxUnAva($request->mailbox,$request->mailboxPW);

     }
    }

    public function remove_package(Request $request){
        Log::notice($request);

        Packages::where('id',$request->package_id)->delete();

        self::setMailBoxAva($request->mailbox_id);
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
