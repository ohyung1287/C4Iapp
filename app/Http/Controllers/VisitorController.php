<?php
/**
 * Created by PhpStorm.
 * User: mshao
 * Date: 2018-11-01
 * Time: 9:35 PM
 */

namespace App\Http\Controllers;
use App\visitors;
use App\Rooms;
use Illuminate\Http\Request;
use Log;
use Carbon\Carbon;
class VisitorController extends Controller
{
    public function index(){
        //....
        $visitors=Visitors::orderby('id','')->get();
        //$visitors= DB::select("");
//        where('created_at','==','updated_at')->get();
        $rooms=Rooms::get();

        return view('visitor',['visitors'=>$visitors,'rooms'=>$rooms]);
    }
    public function addVisitor(Request $request){
        $v = new visitors;
        $v->name=$request->name;
        $v->email=$request->email;
        $v->phone=$request->phone;
        $v->roomNumber=$request->roomid;

        $v->save();
    }
    public function searchVisitor(Request $request){

        if($request->searchBy == "name"){
            $visitor = Visitors::where('name',$request->searchKey)->get();
        }else if($request->searchBy == "email"){
            $visitor = Visitors::where('email',$request->searchKey)->get();
        }else if($request->searchBy == "phone"){
            $visitor = Visitors::where('phone',$request->searchKey)->get();
        }else{
            $visitor = Visitors::where('date',$request->searchKey)->get();
        }
        $all = Array();
        foreach($visitor as $one){
        $arr=array('0'=>$one->name,'1'=>$one->email,'2'=>$one->phone,'3'=>$one->roomNumber
            ,'4'=>Carbon::createFromFormat('Y-m-d H:i:s', $one->created_at)->toDateTimeString());
        array_push($all,$arr);
        }
        return $all;
    }

}
