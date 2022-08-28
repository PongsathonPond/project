<?php

namespace App\Http\Controllers\loginOutsider;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthOutsiderController extends Controller
{

    public function doLogin(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $userInfo = User::where('email', '=', $request->email)->first();

        if (!$userInfo) {
            return back()->with('fail', 'We do not recognize your email address');
        } else {
            //check password
            if (Hash::check($request->password, $userInfo->password)) {
                $data = $request->input();
                $request->session()->put('id', $userInfo->id);
                $request->session()->put('email', $data['email']);
                $request->session()->put('first_name', $userInfo->first_name);
                $request->session()->put('last_name', $userInfo->last_name);

                // return view('page.staff.routes.index');
                return redirect()->route('index');
            } else {
                return back()->with('fail', 'Incorrect password');
            }
        }

    }

    public function doRegister(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required', // required and email format validation
            'last_name' => 'required', // required and number field validation
            'email' => 'required|email|unique:admins,email', // required and email format validation
            'password' => 'required|min:8', // required and number field validation

        ]); // create the validations
        if ($validator->fails()) //check all validations are fine, if not then redirect and show error messages
        {

            return back()->withInput()->withErrors($validator);
            // validation failed redirect back to form

        } else {
            //validations are passed, save new user in database
            $User = new Admin;
            $User->email = $request->email;
            $User->first_name = $request->first_name;
            $User->last_name = $request->last_name;

            $User->password = bcrypt($request->password);
            $User->save();

            return redirect("/usermanage")->with('success', 'You have successfully registered, Login to access your dashboard');
        }
    }
    // show dashboard

    // logout method to clear the sesson of logged in user
    public function logout()
    {
        \Auth::logout();
        return redirect("admin_login")->with('success', 'Logout successfully');
    }
}
