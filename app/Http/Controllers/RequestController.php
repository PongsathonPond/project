<?php

namespace App\Http\Controllers;

use App\Models\BookingList;

class RequestController extends Controller
{
    public function index()
    {
        $booking = BookingList::paginate(10);

        return view('page.admin.request.SuperAdmin.index', compact('booking'));

    }
}
