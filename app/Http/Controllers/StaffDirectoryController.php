<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use File;
use Illuminate\Support\Facades\Storage;
use App\Models\Programs;
use App\Models\Staff_information;
use App\Models\staff_cv;            
use App\Models\Department;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class StaffDirectoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           
        $departments = Department::all(); 

       return view('client.Staff-Directory',['departments'=>$departments]);

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


    public function Search_Staff(Request $request){

        // echo "done";

                $staff_dep_id  = $request->input('staff_dep_id'); 
                $keyword = strip_tags($request->input('keyword'));
                $departments = Department::all();

            
                if($staff_dep_id == "" && $keyword !=""){
                    $search_data = DB::table('staff_information as s')
                        ->join('staff_cv as cv', 's.staff_id', '=', 'cv.staff_id')
                        ->join('department as d', 's.staff_dep_id', '=', 'd.deprt_id')
                        ->where(function ($query) use ($keyword) {
                            $query->where('s.staff_name', 'LIKE', '%'.$keyword.'%')
                                  ->orWhere('s.staff_position', 'LIKE', '%'.$keyword.'%');
                        })
                        ->select('*')
                        ->get();
                
                    return view('client.Staff-Directory', ['search_data' => $search_data, 'departments' => $departments]);
                }
                
                if($staff_dep_id != "" && $keyword == ""){
                    $search_data = DB::table('staff_information as s')
                        ->join('staff_cv as cv', 's.staff_id', '=', 'cv.staff_id')
                        ->join('department as d', 's.staff_dep_id', '=', 'd.deprt_id')
                        ->where('d.deprt_id', '=', $staff_dep_id)
                        ->select('*')
                        ->get();
                
                    return view('client.Staff-Directory', ['search_data' => $search_data, 'departments' => $departments]);
                }
        

              

                 // original query
                
            //     $result = DB::table('staff_information as s')
            //    ->join('staff_cv as cv', 's.staff_id', '=', 'cv.staff_id')
            //    ->join('department as d', 's.staff_dep_id', '=', 'd.deprt_id')
            //    ->where('d.deprt_id', '=', 3)
            //    ->select('*')
            //    ->get();
    }


    public function showStaffDetails($encryptedId)  
    {  
        
    $decryptedId = Crypt::decrypt($encryptedId);
    // $decryptedId = $encryptedId;

    $staff_info = Staff_information::where('staff_id',$decryptedId)->first();
    $staff_info_cv = staff_cv::where('staff_id',$decryptedId)->first();
    $departments = Department::all();

    return view("client.staff_details",['staff_info'=>$staff_info,'staff_info_cv'=>$staff_info_cv,'departments' => $departments]);


 
    }


























































































































}
