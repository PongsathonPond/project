<?php

namespace App\Http\Controllers;

use App\Models\location;

class AddBookingUserout extends Controller
{
    public function index()
    {

        $location = location::all();
        return view('page.user.booking.index', compact('location'));
    }
}
