<?php

namespace App\Http\Controllers;

use Validator;
use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Programs;
use App\Models\Staff_information;
use App\Models\staff_cv;            
use App\Models\Department;
use Illuminate\Validation\Rule;


class StaffInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $program = Programs::all();
      
        $departments = Department::all(); 
   
        $staff_data = Staff_information::select('staff_information.*', 'department.Department_name_en as Department_name_en')
                ->join('department', 'staff_information.staff_dep_id', '=', 'department.deprt_id')
                ->get();
        return view("admin.add_staff",['program'=>$program,'staff_data'=>$staff_data,'departments'=>$departments]);
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
            'staff_name' => ['required','string','max:255',Rule::unique('Staff_information' ,'staff_name') ],
            'staff_dep_id' => ['required'],
            'staff_email' => ['required','email','max:255'],
            'staff_position' => ['required','string','max:255'],
            'staff_phone' => ['required','string','max:200'],
            
        ],[
            'staff_name.required' => 'Staff Name is Required.',
            'staff_dep_id.required' => 'Staff Department Required.',
            'staff_email.required' => 'Staff Email Is Requierd.',
            'staff_position.required' => 'Staff Position Is Requierd.',
            'staff_phone.required' => 'Phone Number Requierd.',
        ]);

            if(!$validate->fails()){

           

                if (Staff_information::where('staff_name', $request['staff_name'])->count() > 0) {

                    return redirect('/staff')->with('failure','Staff already exists !');

                }else{

                    $staff_info = Staff_information::create([
                        'staff_name' => $request->input('staff_name'),
                        'staff_dep_id' => $request->input('staff_dep_id'),
                        'staff_email' => $request->input('staff_email'),
                        'staff_position' => $request->input('staff_position'),
                        'staff_phone' => $request->input('staff_phone'),        
                    ]);
                    // $user = User::create($request->all());

                    if($staff_info){
                        return redirect('/staff')->with('success','Staff Created Successfully !');
                    }else{
                        return redirect('/staff')->with('failure','Error While Creating Staff !');
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
    // $program = Programs::all();
    $departments = Department::all();
    $staff_data = Staff_information::select('staff_information.*', 'department.Department_name_en as Department_name_en')
    ->join('department', 'staff_information.staff_dep_id', '=', 'department.deprt_id')
    ->where('staff_information.staff_id' , '=' , $id)
    ->first();

    // dd($staff_data);
     return view("admin.edit_staff",['staff_data'=>$staff_data,'departments'=>$departments]);
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
        $validate = Validator::make($request->all(), [
            'staff_name' => ['required'],
            'staff_dep_id' => ['required'],
            'staff_email' => ['required','email','max:255'],
            'staff_position' => ['required','string','max:255'],
            'staff_phone' => ['required','string','max:200'],
            
        ],[
            'staff_name.required' => 'Staff Name is Required.',
            'staff_dep_id.required' => 'Staff Department Required.',
            'staff_email.required' => 'Staff Email Is Requierd.',
            'staff_position.required' => 'Staff Position Is Requierd.',
            'staff_phone.required' => 'Phone Number Requierd.',
        ]);

            if(!$validate->fails()){
                
                $staff_info = Staff_information::where('staff_id', $id)
                ->update([
                        'staff_name' => $request->input('staff_name'),
                        'staff_dep_id' => $request->input('staff_dep_id'),
                        'staff_email' => $request->input('staff_email'),
                        'staff_position' => $request->input('staff_position'),
                        'staff_phone' => $request->input('staff_phone'),        
                    ]);
                    // $user = User::create($request->all());

                    if($staff_info){
                        return redirect('/staff')->with('success','Staff Created Successfully !');
                    }else{
                        return redirect('/staff')->with('failure','Error While Creating Staff !');
                    }
           
            }else{
                return back()->withErrors($validate->errors())->withInput();
            }
        
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

    // //////// CV PART 


    public function Show_cv($id)
    {
        // echo $id;
        $staff_info = Staff_information::where('staff_id',$id)->first();
        $staff_info_cv = staff_cv::where('staff_id',$id)->first();

   
        
        return view("admin.staff_cv",['staff_info'=>$staff_info,'staff_info_cv'=>$staff_info_cv]);
    }


    public function Add_cv(Request $request)
    {

        // echo "done";
        $validate = Validator::make($request->all(), [
            'cv_image' => ['nullable','mimes:png,jpg,jpeg,ico','max:2048'],
            'about' => ['nullable'],
            'work_experience' => ['nullable'],
            'staff_id' => ['nullable'],
            'education' => ['nullable'],
            'skills' => ['nullable'],
            'publication' => ['nullable'],
            'teaching_and_supervision' => ['nullable'],
            'academic_recognition_and_leadership' => ['nullable'],
            'old_image' => ['nullable'],
            'contact' => ['nullable'],
            
        ]
        // ,[
        //     'staff_name.required' => 'Staff Name is Required.',
        //     'staff_dep_id.required' => 'Staff Department Required.',
        //     'staff_email.required' => 'Staff Email Is Requierd.',
        //     'staff_position.required' => 'Staff Position Is Requierd.',
        //     'staff_phone.required' => 'Phone Number Requierd.',
        // ]
    );

            if(!$validate->fails()){

           

                if (staff_cv::where('staff_id', $request->input('staff_id'))->count() > 0) {

                    $imagePath = null;
                    $imageName = staff_cv::where('staff_id', $request->input('staff_id'))->value('cv_image');
                    if ($request->hasFile('cv_image')) {
                        $image = $request->file('cv_image');
                        $imageName = $image->getClientOriginalName();
                        $imagePath = $image->storeAs('staff_imgs', $imageName, 'public');
                        $old_image_path = staff_cv::where('staff_id', $request->input('staff_id'))->value('cv_image');

                        // delete old photo code
                        if ($old_image_path && Storage::disk('public')->exists('staff_imgs/' . $old_image_path)) {
                            Storage::disk('public')->delete('staff_imgs/' . $old_image_path);
                        }
                    }
         

                 $staff_cv_info = staff_cv::where('staff_id', $request->input('staff_id'))
                 ->update([
                 'about' => $request->input('about'),
                 'work_experience' => $request->input('work_experience'),
                 'education' => $request->input('education'),
                 'skills' => $request->input('skills'),
                 'publication' => $request->input('publication'),
                 'teaching_and_supervision' => $request->input('teaching_and_supervision'),
                 'academic_recognition_and_leadership' => $request->input('academic_recognition_and_leadership'),
                 'contact' =>  $request->input('contact'),
                 'cv_image' =>  $imageName,

                ]);

                    if($staff_cv_info){
                        return redirect('/staff')->with('success','CV Updated Successfully !');
                    }else{
                        return redirect('/staff')->with('failure','Error While Updateing Staff CV !');
                    }

                }else{
                    $imagePath = null;
                    $imageName = null;
                    if ($request->hasFile('cv_image')) {
                        $image = $request->file('cv_image');
                        $imageName = $image->getClientOriginalName();
                    
                        $imagePath = $image->storeAs('staff_imgs', $imageName, 'public');

                       
                    }

                    $staff_cv = staff_cv::create([
                    'staff_id' => $request->input('staff_id'), 
                    'about' => $request->input('about'),
                    'work_experience' => $request->input('work_experience'),
                    'education' => $request->input('education'),
                    'skills' => $request->input('skills'),
                    'publication' => $request->input('publication'),
                    'teaching_and_supervision' => $request->input('teaching_and_supervision'),
                    'academic_recognition_and_leadership' => $request->input('academic_recognition_and_leadership'),
                    'contact' =>  $request->input('contact'),
                    'cv_image' =>  $imageName,

                    ]);
                    // $user = User::create($request->all());

                    if($staff_cv){
                        return redirect('/staff')->with('success','CV Created Successfully !');
                    }else{
                        return redirect('/staff')->with('failure','Error While Creating CV !');
                    }
                }
            }else{
                return back()->withErrors($validate->errors())->withInput();
            }
     


     
    }





























































    
}
