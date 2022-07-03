<?php

namespace App\Http\Controllers\user_out;

use App\Http\Controllers\Controller;
use App\Models\BookingList;
use Illuminate\Support\Facades\Auth;

class User_RequestController extends Controller
{
    public function index()
    {
        $booking = BookingList::where('user_id', Auth::user()->id)->paginate(5);

        return view('page.user.request.index', compact('booking'));
    }

    public function detail($id)
    {

        $booking = BookingList::find($id);

        return view('page.user.request.detail', compact('booking'));
    }
}
