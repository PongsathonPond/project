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
        $head['head'] = $request->head;
        $location['location'] = $request->location;
        $start['start'] = $request->start;
        $end['end'] = $request->end;
        $status['status'] = $request->status;

        dispatch(new CustomerJob(
            $email, $name, $content,
            $head, $location, $start,
            $end, $status));

        return redirect()->back()->with('ok', "ลบเรียบร้อยแล้ว");

    }

}
