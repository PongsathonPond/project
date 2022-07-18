<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

   
    public function LoginView()
    {
        return view("test.test");
    }
    protected function guard()
    {
        return Auth::guard('staff');
    }

    public function doLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12',
        ]);

        $userInfo = Staff::where('email', '=', $request->email)->first();

        if (!$userInfo) {
            return back()->with('fail', 'We do not recognize your email address');
        } else {
            //check password
            if (Hash::check($request->password, $userInfo->password)) {
                $data = $request->input();
                $request->session()->put('id', $userInfo->id);
                $request->session()->put('email', $data['email']);

                
                return view('page.staff.routes.index');

            } else {
                return back()->with('fail', 'Incorrect password');
            }
        }

    }

    // public function doLogin(Request $request)
    // {

    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required|email', // required and email format validation
    //         'password' => 'required', // required and number field validation

    //     ]); // create the validations
    //     if ($validator->fails()) //check all validations are fine, if not then redirect and show error messages
    //     {

    //         return back()->withInput()->withErrors($validator);
    //         // validation failed redirect back to form

    //     } else {

    //         //validations are passed try login using laravel auth attemp
    //         if (Auth::attempt(['email' => $request['email'],
    //             'password' => $request['password']])) {
    //             return redirect("dashboard")->with('success', 'Login Successful');
    //         } else {
    //             return back()->withErrors("Invalid credentials"); // auth fail redirect with error
    //         }
    //     }
    // }

    public function doRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'email' => 'required|email|unique:staff,email', // required and email format validation
            'password' => 'required|min:8', // required and number field validation

        ]); // create the validations
        if ($validator->fails()) //check all validations are fine, if not then redirect and show error messages
        {

            return back()->withInput()->withErrors($validator);
            // validation failed redirect back to form

        } else {
            //validations are passed, save new user in database
            $User = new Staff;
            $User->email = $request->email;
            $User->password = bcrypt($request->password);
            $User->save();

            return redirect("manage/staff")->with('success', 'You have successfully registered, Login to access your dashboard');
        }
    }
    // show dashboard
    public function dashboard()
    {
        return view("dashboard");
    }

    // logout method to clear the sesson of logged in user
    public function logout()
    {
        \Auth::logout();
        return redirect("staff_login")->with('success', 'Logout successfully');
    }
}
