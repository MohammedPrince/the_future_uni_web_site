<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Models\Programs;
use App\Models\fee_structure;

use Illuminate\Validation\Rule;



class Fee_StructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $program = Programs::all();
        $structure_data = fee_structure::where('fee_del','=',0)->get();
        return view("admin.fee_structure",['program'=>$program,'structure_data'=>$structure_data]);
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
        $validate = Validator::make($request->all(), [
            'admission_year' => ['required'],
            'program_code' => ['required'],
            'fee_type' => ['required'],
            'fee' => ['required','numeric'],
      
        ],[
            'admission_year.required' => 'Year is must.',
            'program_code.required' => 'Program is must.',
            'fee_type.required' => 'Fee Type is must.',
            'fee.required' => 'Fee is must.',


        ]);

            if(!$validate->fails()){


                if (fee_structure::where('program_code', $request['program'])->count() > 0) {

                    return redirect('/fee_structure')->with('failure','Fee already exists !');

                }else{

                    $fee_structure = fee_structure::create($request->all());

                    if($fee_structure){
                        return redirect('/fee_structure')->with('success','Fee Created Successfully !');
                    }else{
                        return redirect('/fee_structure')->with('failure','Error While Creating Fee !');
                    }
                }
            }else{
                return back()->withErrors($validate->errors())->withInput();
            }
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
}
