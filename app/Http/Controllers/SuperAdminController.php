<?php

namespace App\Http\Controllers;

use App\Models\OtherUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\WeclcomeManagerMail;
use Illuminate\Support\Facades\Mail;

class SuperAdminController extends Controller
{
    // super admin login register blade file view
    public function superAdminView(){
        return view('SuperAdmin/superAdmin-login-registration');
    }

    // super admin register
    public function SuperAdminRegistration(Request $request){

        // form validation
        $request->validate([
            'user_role' => 'required',
            'fullname' => 'required|max:200',
            'username' => 'required|max:20|unique:users,username',
            'emailaddress' => 'required|unique:users,emailaddress|email',
            'phonenumber' => 'required|unique:users,mobileno|digits:10|numeric',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ],[
            'user_role.required' => 'User Role is Required.',
            'fullname.required' => 'Name is Required.',
            'fullname.max' => 'Name should be maximum 200 Character.',
            'username.required' => 'Username is Required.',
            'username.max' => 'Username size should be 20 character',
            'username.unique' => 'Username Already Exists',
            'emailaddress.required' => 'Email Address is Required.',
            'emailaddress.unique' => 'Email Address Already Exists.',
            'emailaddress.email' => 'Email Address formate is wrong formate.',
            'phonenumber.required' => 'Mobile Number is Required.',
            'phonenumber.unique' => 'Mobile Number Already Exists.',
            'phonenumber.digits' => 'Mobile Number should be 10 charater.',
            'phonenumber.numeric' => 'Mobile Number should be numeric.',
            'password.required' => 'Password is Required.',
            'password.confirmed' => 'Confirm Password Should be same.',
            'password_confirmation.required' => 'Confirm Password is Reuired'
        ]);

        $superAdmin = User::create([
            'userrole' => $request->user_role,
            'fullname' => $request->fullname,
            'username' => $request->username,
            'emailaddress' => $request->emailaddress,
            'mobileno' => $request->phonenumber,
            'password' => $request->password
        ]);

        if($superAdmin){
            return back()->with('regietrsuccess', 'Register Successfull! LogIn Please');
        }else{
            return back()->with('regietrerror', 'Register Unsuccessfull');
        }
    }

    // super admin login 
    public function SuperAdminLogin(Request $request){
        // form validation
        $request->validate([
            'useremail' => 'required',
            'password' => 'required'
        ],[
            'useremail.required' => 'Filed is Required.',
            'password.required' => 'Password is Required.',
        ]);

        $usernameCreadential = [
            'username' => $request->useremail,
            'password' => $request->password
        ];

        $emailCreadential = [
            'emailaddress' => $request->useremail,
            'password' => $request->password
        ];

        if(Auth::attempt($usernameCreadential) || Auth::attempt($emailCreadential)){
            return redirect()->route('logincheck');
        }else{
            return back()->with('loginerror', 'Invalid Creadential');
        }
    }

    // redirect to dashboard page if user login
    public function dashboardPage(){
        if(Auth::check()){
            return view('SuperAdmin/dashboard');
        }else{
            return redirect()->route('superamdin.login');
        }
    }

    // super admin logout
    public function superAdminLogout(){
        Auth::logout();
        return redirect()->route('superamdin.login')->with('loginsuccess', 'Logout Successfull');
    }

    // profile settings view
    public function profileSettingsView(){
        return view('SuperAdmin/profile-settings');
    }

    // profile settings view
    public function profileView(){
        return view('SuperAdmin/profile');
    }

    // super admin profile update
    public function superAdminProfileUpdate(Request $request, $id){
        $profilePicture = $request->file('profilepicture')->store('image', 'public');

        $superAdminProfile = User::where('id', $id)->update([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'emailaddress' => $request->emailaddress,
            'mobileno' => $request->phonenumber,
            'profilepic' => $profilePicture
        ]);

        if($superAdminProfile){
            return back()->with('success', 'Profile Update Successfull');
        }else{
            return back()->with('error', 'Profile Update Failed');
        }
    }

    // superadmin password change
    public function superAdminPasswordUpdate(Request $request, $id){
        $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ],[
            'oldpassword.required' => 'Current Password Should Be Filed',
            'password.required' => 'Password Should Be Filed',
            'password.confirmed' => 'Password & Confirm Password Should Be Same',
            'password_confirmation.required' => 'Confirm Password Should Be Filed'
        ]);

        $oldPasswordGet = User::where('id', $id)->first();

        $dbOldPassword = $oldPasswordGet->password; // db old password

        $oldPassword = $request->oldpassword;   // field old password

        $password = $request->password; // new password

        if(! Hash::check($oldPassword, $dbOldPassword)){
            return back()->with('error', 'old password Dosen\'t match');
        }else{
            $passwordUpdate = User::where('id', $id)->update([
                'password' => Hash::make($password)
            ]);

            if($passwordUpdate){
                Auth::logout();
                return redirect()->route('superamdin.login')->with('success', 'Password Updated Successfull');
            }else{
                return back()->with('error', 'Password Not Update');
            }
        }

    }

    // all manager lis view in super admin manager tab
    public function managerListSuperAdmin(){
        $managers = OtherUser::where('userrole', 'Manager')->orderBy('id', 'desc')->get();
        return view('SuperAdmin/manager-list', compact('managers'));
    }

    // all manager lis view in super admin project tab
    public function managerList(){
        $managers = OtherUser::where('userrole', 'Manager')->orderBy('id', 'desc')->get();
        return view('SuperAdmin/projects-add', compact('managers'));
    }

    // super admin add others
    public function SuperAdminOtherUsersRegistration(Request $request){
        // form validation
        $request->validate([
            'user_role' => 'required',
            'fullname' => 'required|max:200',
            'username' => 'required|max:20|unique:users,username',
            'emailaddress' => 'required|unique:users,emailaddress|email',
            'phonenumber' => 'required|unique:users,mobileno|digits:10|numeric',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ],[
            'user_role.required' => 'User Role is Required.',
            'fullname.required' => 'Name is Required.',
            'fullname.max' => 'Name should be maximum 200 Character.',
            'username.required' => 'Username is Required.',
            'username.max' => 'Username size should be 20 character',
            'username.unique' => 'Username Already Exists',
            'emailaddress.required' => 'Email Address is Required.',
            'emailaddress.unique' => 'Email Address Already Exists.',
            'emailaddress.email' => 'Email Address formate is wrong formate.',
            'phonenumber.required' => 'Mobile Number is Required.',
            'phonenumber.unique' => 'Mobile Number Already Exists.',
            'phonenumber.digits' => 'Mobile Number should be 10 charater.',
            'phonenumber.numeric' => 'Mobile Number should be numeric.',
            'password.required' => 'Password is Required.',
            'password.confirmed' => 'Confirm Password Should be same.',
            'password_confirmation.required' => 'Confirm Password is Reuired'
        ]);

        $employeeId = 'WW'.rand(001, 100000);

        $addUser = OtherUser::create([
            'empId' => $employeeId,
            'userrole' => $request->user_role,
            'fullname' => $request->fullname,
            'username' => $request->username,
            'emailaddress' => $request->emailaddress,
            'mobileno' => $request->phonenumber,
            'password' => $request->password,
            'added_by' => $request->added_by
        ]);

        $toMail = $request->emailaddress;
        $subject = "Account Created Successfull";
        $emailAddress = $request->emailaddress;
        $username = $request->username;
        $password = $request->password;

        if($addUser){
            Mail::to($toMail)->send(new WeclcomeManagerMail($subject, $emailAddress, $username, $password));
            return back()->with('success', 'Register Successfull!');
        }else{
            return back()->with('error', 'Register Unsuccessfull');
        }
    }

    // single manager view by super admin
    public function ManagerSingleView(string $id){
        $manager = OtherUser::with('managername')->find($id);
        return view('SuperAdmin/managerDetailsView', compact('manager'));
    }

    // delete single manager by super admin 
    public function MnagerDelete(string $id){
        $managerDelete = OtherUser::find($id)->delete();
        if($managerDelete){
            return back()->with('success', 'Delete Successfull');
        }else{
            return back()->with('error', 'Delete Failed');
        }
    }

    public function projectAdd(Request $request){
        return $request->validate([
            'projectname' => 'required',
            'client_name' => 'required',
            'techonology' => 'required',
            'paymenttype' => 'required',
            'enddate' => 'required',
            'manager_name' => 'required',
        ]);

    }
}
