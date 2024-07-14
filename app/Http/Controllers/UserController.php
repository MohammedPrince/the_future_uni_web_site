<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use App\Models\Department;
use App\Models\MainApp;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    
    public function login(Request $request){
        
        $incomingFields = $request->validate([

            'loginusername' => ['required'],
            'loginpassword' => ['required'],
        ]);
      
        if(auth()->attempt(['username' => $incomingFields['loginusername'] , 'password' => $incomingFields['loginpassword'] ])){
           
            $request ->session()->regenerate();
            $usey_type = auth()->user()->isAdmin;

            if($usey_type == 1){
                return redirect('/add_user')->with('success', $incomingFields['loginusername']." , You have successfully logged in.");
            }elseif($usey_type == 0){
                return redirect('/add_event')->with('success', $incomingFields['loginusername']." , You have successfully logged in.");
            }
           
      
        }else{
           return redirect('/admin_panel')->with('failure','Invaild login credentials , Try again !');
        }
    }

    public function addUser(Request $request , User $user){

        $validate = Validator::make($request->all(), [
            'username' => ['required','min:5' , 'max:20' ,Rule::unique('users' ,'username') ],
            'user_fullname' => ['required','min:5' , 'max:50'],
            'user_phone' => ['required','min:10' , 'max:10'],
            'user_email' => ['required',Rule::unique('users' ,'user_email') ],
            'isAdmin' => ['required'],
            'user_faculty' => ['required'],
        ],[
            'username.required' => 'Name is must.',
            'user_fullname.required' => 'User Full name is must.',
            'user_phone.required' => 'User Phone is must.',
            'user_email.required' => 'User Email is must.',
            'isAdmin.required' => 'User Type is must.',
            'user_faculty.required' => 'User Faculty is must.',
        ]);

            if(!$validate->fails()){

                $request['user_by'] = auth()->user()->id;
                $request['password'] =   bcrypt($request['username']."@FU*#" );

                if (User::where('username', $request['username'])->count() > 0) {

                    return redirect('/add_user')->with('failure','User '.$request['username'].' already exists !');

                }else{

                    $user = User::create($request->all());

                    if($user){
                        return redirect('/add_user')->with('success','User Account Created Successfully !');
                    }else{
                        return redirect('/add_user')->with('failure','Error While Creating User Account !');
                    }
                }
            }else{
                return back()->withErrors($validate->errors())->withInput();
            }
    }

    public function showUser(User $user){

        $user_faculty  = $user->allUsers()->first()->user_faculty  ;
        $dept_name = MainApp::getFacultiesAndOffices($user_faculty);
        $departments = Department::all(); 

        return view('admin.add_user' , [
            'users' =>$user->allUsers(),
            'user_dept' => $dept_name,
            'departments' => $departments,

        ]);
    }

    public function showEditForm(User $user){

        return view("admin.edit_user" , ['user' => $user,'action' => 'edit']);
    }

    public function user_profile(){

        $user = auth()->user();
        return view("admin.profile" , ['user' => $user]);
    }
    public function user_profile(){

        $user = auth()->user();
        return view("admin.profile" , ['user' => $user]);
    }
    public function editUser(Request $request , User $user){

        $validate = Validator::make($request->all(), [
            'username' => ['required','min:5' , 'max:20' ],
            'user_fullname' => ['required','min:5' , 'max:20'],
            'user_phone' => ['required','min:10' , 'max:10'],
            'user_email' => ['required'],
            'isAdmin' => ['required'],
            'user_faculty' => ['required'],
        ],[
            'username.required' => 'Name is must.',
            'user_fullname.required' => 'User Full name is must.',
            'user_phone.required' => 'User Phone is must.',
            'user_email.required' => 'User Email is must.',
            'isAdmin.required' => 'User Type is must.',
            'user_faculty.required' => 'User Faculty is must.',
        ]);

            if(!$validate->fails()){

                $request['user_by'] = auth()->user()->id;

                    if( $user ->update($request->all())){

                        return redirect('/add_user')->with('success','User Account Successfully Updated !');
                    }else{
                        return redirect('/add_user')->with('failure','Error While Update User Account !');
                    }

            }else{
                return back()->withErrors($validate->errors())->withInput();
            }
    }

    public function deleteUser($user_id){

     
        if (User::where('id', $user_id)->update(['del' => '1'])){

            return redirect('/add_user')->with('success','User Account Deleted Successfully !');

        }else{
            return redirect('/add_user')->with('failure','Error While Deleting User Account !');
        }
    }
    public function register(Request $request){


        $username = 'admin';
        $password = bcrypt('123');
        $user_fullname = 'Mohammed Prince';
        $user_phone = '0916554412';
        $user_email = 'mohammed.beng@gmail.com';

        if (User::where('username', $username)->count() > 0) {

            return redirect('/admin_panel')->with('failure','Account already exists !');

        }else{

            $incomingFields = ([

                'username' => $username,
                'password' =>$password,
                'user_fullname' => $user_fullname,
                'user_phone' => $user_phone,
                'user_email' => $user_email,
             
            ]);
    
            $user = User::create($incomingFields);
            auth()->login($user);
            if( $user){
                echo 'Saved !';
                return redirect('/add_user')->with('success', $user_fullname." , You have successfully logged in.");
            }
        }
    }


    public function newPage($id){
      
        $user = User::where('id', $id)->get();

        return view("admin.new_edit_user",['user' => $user,'action' => 'edit']);
    }











    public function logout(){
        $user_name = auth()->user()->username;

        auth()->logout();
        return redirect("/admin_panel")->with('success', $user_name.' , Logged out successfully !');
       
    }
}
