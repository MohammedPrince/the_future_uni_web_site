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
      
        // SECURITY: disabled/deleted accounts (del = 1) can no longer log in.
        if(auth()->attempt(['username' => $incomingFields['loginusername'] , 'password' => $incomingFields['loginpassword'], 'del' => 0 ])){
           
            $request ->session()->regenerate();
            $usey_type = auth()->user()->isAdmin;

            if($usey_type == 1){
                return redirect('/dashboard')->with('success', $incomingFields['loginusername']." , You have successfully logged in.");
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
                // SECURITY: random initial password (was the guessable username."@FU*#").
                $plainPassword = \Illuminate\Support\Str::random(14);
                $request['password'] = bcrypt($plainPassword);

                if (User::where('username', $request['username'])->count() > 0) {

                    return redirect('/add_user')->with('failure','User '.$request['username'].' already exists !');

                }else{

                    $user = User::create($request->only(['username', 'user_fullname', 'user_phone', 'user_email', 'isAdmin', 'user_faculty', 'user_by', 'password']));

                    if($user){
                        return redirect('/add_user')->with('success','User Account Created Successfully ! Initial password (shown once): '.$plainPassword);
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

                    $fields = $request->only(['username', 'user_fullname', 'user_phone', 'user_email', 'isAdmin', 'user_faculty', 'user_by']);

                    if( $user ->update($fields)){

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
    // SECURITY: register() removed — it created a hardcoded admin/123 account
    // and logged the visitor in. Create admins with `php artisan tinker` instead.


    public function newPage($id){
      
        $user = User::where('id', $id)->get();

        return view("admin.new_edit_user",['user' => $user,'action' => 'edit']);
    }











    public function logout(Request $request){

        $user_name = auth()->user()?->username ?: 'User';

        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/admin_panel")->with('success', $user_name.' , Logged out successfully !');
       
    }
}
