<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
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
        // // this libarery to get device information ;
        // // composer require jenssegers/agent
        // // use Jenssegers\Agent\Agent;
        // $appKey = env('APP_KEY');
        

        // $ipAddress = $request->ip();
        // $agent = new Agent();
        // $device = $agent->device();
        // $platform = $agent->platform();
        // $date = date("Y-m-d");
    
        // $locationData = json_decode(file_get_contents("http://ipinfo.io/{$ipAddress}/json?token={$appKey}"), true);
        // $city = $locationData['city'] ?? 'Unknown';
        // $region = $locationData['region'] ?? 'Unknown';
        // $country = $locationData['country'] ?? 'Unknown';
    
        // Visitor::create([
        //     'ip_address' => "$ipAddress",
        //     'device_name' => "$device",
        //     'platform' => "$platform",
        //     'location' => "$city, $region, $country",
        //     'visit_date' => "{$date}",
        // ]);
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

         // this libarery to get device information ;
        // composer require jenssegers/agent
        // use Jenssegers\Agent\Agent;
        $appKey = env('APP_KEY');
        

        $ipAddress = $request->ip();
        if ($ipAddress === '127.0.0.1' || $ipAddress === '::1') {
            // Handle local testing appropriately
            $ipAddress = 'YOUR_EXTERNAL_IP_FOR_TESTING'; // Replace with a real IP for testing
        }
        $agent = new Agent();
        $device = $agent->device();
        $platform = $agent->platform();
        $date = date("Y-m-d");

        if (Visitor::where('ip_address', $ipAddress)->count() > 0) {

            // return redirect('/linkage')->with('failure','Linkage already exists !');

        }else{
    
  
    
        Visitor::create([
            'ip_address' => "$ipAddress",
            'device_name' => "$device",
            'platform' => "$platform",
            // 'location' => "$city, $region, $country",
            'visit_date' => "{$date}",
        ]);

    }

    }


    public function getVisitorCount()
    {
        // Execute the query to get the visitor count
        return $visitorCount = Visitor::count();

       

        // Return the count to the view
        // return view('your_view_name', ['visitorCount' => $visitorCount]);
    }













}
