<?php

namespace App\Http\Controllers\vice_admin;

use App\Http\Controllers\Controller;

class Vice_RequestController extends Controller
{
    public function index()
    {

        return view('page.vice_admin.request.index');
    }
}
