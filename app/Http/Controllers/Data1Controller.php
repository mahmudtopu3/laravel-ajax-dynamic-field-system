<?php

namespace App\Http\Controllers;

use App\Data1;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
class Data1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Redirector $redirect)
    {
        //
        if(\Auth::user()->approve_status != 1){
            $redirect->to('/not_approved')->send();
            
        }
        $data = Data1::get();
        return view('admin.data1',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Data1  $data1
     * @return \Illuminate\Http\Response
     */
    public function show(Data1 $data1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Data1  $data1
     * @return \Illuminate\Http\Response
     */
    public function edit(Data1 $data1)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Data1  $data1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Data1 $data1)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Data1  $data1
     * @return \Illuminate\Http\Response
     */
    public function destroy(Data1 $data1)
    {
        //
    }
}
