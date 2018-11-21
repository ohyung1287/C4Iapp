<?php

namespace App\Http\Controllers;

use App\Mail\sendMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Residents;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function index(){
        $residents=Residents::orderby('roomid','asc')->get();

        return view ('message',['residents'=>$residents]);
    }

    public function sendMessage(Request $request){
//        $request->
//        Mail::
        Log::notice('hi');
        $address=$request->select_resident;
        $content=$request->message_content;

        foreach($address as $one){

            Mail::to($one)->send(new sendMail($content));
        }
        return 'Email sending success';
    }


}
