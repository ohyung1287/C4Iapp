<?php

namespace App\Http\Controllers;

use App\Announcements;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnnouncementController extends Controller
{
    //
    public function index(){
        $announcement = Announcements::get();


        return view('announcement',['announcement'=>$announcement]);
    }


    public function add_announcement(Request $request){
        $announcement = new Announcements();
        $announcement->announce_desc=$request->announce_desc;
        $announcement->time=$request->time;
        $announcement->date=$request->date;
        $announcement->save();
    }

    public function update_announcement(Request $request){
        Announcements::where('id', $request->id)
            ->update(['announce_desc' => $request -> announce_desc,'time' => $request->time,'date' => $request->date]);
        return "Announcement has been updated!";
    }
    public function delete_announcement(Request $request){
        $list=explode(',',$request->remove_list);
        foreach($list as $one){
            Announcements::where('id', $one)->delete();
        }
        return "Announcements has been removed!";
    }
}
