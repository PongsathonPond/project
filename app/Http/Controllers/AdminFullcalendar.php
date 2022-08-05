<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminFullcalendar extends Controller
{
    //

    public function index()
    {


        return view('page.admin.calendar.index');
    }
}
