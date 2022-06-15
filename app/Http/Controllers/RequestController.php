<?php

namespace App\Http\Controllers;

use App\Models\BookingList;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index()
    {
        $booking = BookingList::paginate(10);

        return view('page.admin.request.SuperAdmin.index', compact('booking'));

    }

    public function update(Request $request, $id)
    {

        $request->validate([

            'status' => 'required',

        ],

            ['status.required' => "กรุณาใส่สถานะ",

            ]
        );
        BookingList::find($id)->update([

            'status' => $request->status,

        ]);

        return redirect()->back()->with('update', "อัพเดตข้อมูลเรียบร้อย");
        // return redirect()->route('usermanager')->with('success',"อัพเดตข้อมูลเรียบร้อย");
    }

    public function delete($id)
    {

        //ลบข้อมูล
        $delete = BookingList::find($id)->delete();
        return redirect()->back()->with('delete', "ลบเรียบร้อยแล้ว");

    }
}
