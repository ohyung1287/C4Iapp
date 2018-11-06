<?php
/**
 * Created by PhpStorm.
 * User: mshao
 * Date: 2018-11-01
 * Time: 9:35 PM
 */


namespace App\Http\Controllers;
use App\Visitors;
use App\Rooms;
use Illuminate\Http\Request;
use Log;
class VisitorController extends Controller
{
    //
    public function index(){
        //here should use where time_out is empty
        $visitors=Visitors::where('time_out',' ')->get();
        //$count = Visitors::where('time_out','')->count();

        $rooms=Rooms::get();

        return view('visitor',['visitors'=>$visitors,'rooms'=>$rooms]);
    }


    public function searchVisitor(Request $value){

        if($value->type == "email"){
            $visitor = Visitors::where('name',$value)->get();
        }

        return view('search',['visitor'=>$visitor]);


    }

    public function getVisitorByDate(){
        $visitor = Visitors::where('time_in','')->get();

        return view();
    }


    public function addVisitor(Request $request){
        Log::notice($request);
        $v = new Visitors;
        $v->name=$request->name;
        $v->email=$request->email;
        $v->phone=$request->phone;
        $v->roomNumber=$request->roomNumber;
        $v->time_in=$request->time_in;
        $v->time_out = $request->time_out;
        $v->save();
    }

}
