<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class RouteController extends Controller
{
    public function index()
    {

        $role = Auth::user()->role;

        if ($role == '1') {
            return view('page.admin.routes.index');

        } else {

            return view('page.user.routes.index');
        }
    }
}
