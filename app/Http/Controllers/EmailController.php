<?php

namespace App\Http\Controllers;

use App\Jobs\CustomerJob;
use Illuminate\Http\Request;


class EmailController extends Controller
{
    //
    public function sendEmail(Request $request)
    {

        $name['name'] = 'POND';
        $email['email'] = $request->email;
        $content['content'] = $request->content;

        dispatch(new CustomerJob($email, $name, $content));

        return redirect()->back()->with('ok', "ลบเรียบร้อยแล้ว");


    }



 }
