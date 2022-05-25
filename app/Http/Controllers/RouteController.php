<?php

namespace App\Http\Controllers;

use App\Models\BookingList;
use Illuminate\Support\Facades\Auth;

class RouteController extends Controller
{
    public function index()
    {

        $role = Auth::user()->role;
        $booking = BookingList::all();
        if ($role == '1') {
            return view('page.admin.routes.index');

        } else {

            return view('page.user.routes.index', compact('booking'));
        }
    }
}
