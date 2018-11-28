<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repair;

class RepairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repairs =Repair::OrderBy('repairTitle','desc')->paginate();
        return view('repair')->with('repairs',$repairs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('repairCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'roomNumber' => 'required',
            'phone' => 'required',
            'repairTitle' => 'required',
            'repairDetail' => 'required',
            'repairTime' => 'required'
        ]);
        $repairs = new Repair;
        $repairs -> name = $request -> input('name');
        $repairs -> email = $request -> input('email');
        $repairs -> roomNumber = $request -> input('roomNumber');
        $repairs -> phone = $request -> input('phone');
        $repairs -> repairTitle = $request -> input('repairTitle');
        $repairs -> repairDetail = $request -> input('repairDetail');
        $repairs -> repairTime = $request -> input('repairTime');
        $repairs -> save();

        return redirect('/repair')->with('success','Request posted');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $repairs = Repair::find($id);
        return view('repairDetail')->with('repairs',$repairs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
