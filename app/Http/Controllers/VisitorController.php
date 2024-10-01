<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;


class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     */




    public function index()
    {
        //
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function user_log(Request $request){

        $ipAddress = $request->ip();

        if ($ipAddress === '127.0.0.1' || $ipAddress === '::1') {
            $ipAddress = ''; 
        }

        $date = date("Y-m-d");
        
        if (Visitor::where('ip_address', $ipAddress)->count() > 0) {

        }else{

        Visitor::create([
            'ip_address' => "$ipAddress",
            'device_name' => "NONE",
            'platform' => "NONE",
            // 'location' => "$city, $region, $country",
            'visit_date' => "{$date}",
        ]);
    }

    }


    public function getVisitorCount()
    {
        return $visitorCount = Visitor::count();
    }




}
