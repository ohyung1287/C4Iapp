<?php

namespace App\Http\Controllers;
use App\Residents;
use App\Rooms;
use App\LostFoundTopic;
use App\LostFoundReply;

use Illuminate\Http\Request;
use Log;
class LostFoundController extends Controller
{
    //
    public function index(){
      $lostFoundTopics = LostFoundTopic::get();
      $rooms=Rooms::get();
      $residents=Residents::get();

      return view('LostFoundTopics',['residents'=>$residents,'lostFoundTopics'=>$lostFoundTopics,'rooms'=>$rooms]);
    }

    public function add_topic(Request $request){
        Log::notice($request);
        $lfTopic = new LostFoundTopic;
        $lfTopic->residentId=$request->residentId;
        $lfTopic->email=$request->email;
        $lfTopic->subject=$request->subject;
        $lfTopic->message=$request->message;
        $lfTopic->date=$request->date;
        $lfTopic->save();

    }


    public function index_reply($id){
      $lostFoundTopic = LostFoundTopic::where('id',$id)->get();
      $lostFoundReplies = LostFoundReply::where('topicId',$id)->get();
      $rooms=Rooms::get();
      $residents=Residents::get();

      return view('LostFoundReplies',['topic'=>$lostFoundTopic,'residents'=>$residents,'lostFoundReplies'=>$lostFoundReplies,'rooms'=>$rooms]);
    }


}
