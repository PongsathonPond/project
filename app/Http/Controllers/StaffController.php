<?php

namespace App\Http\Controllers;

use App\Models\Staff;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::all();
        return view('page.admin.managestaff.addstaff', compact('staff'));
    }

    public function delete($id)
    {

        //ลบข้อมูล
        $delete = Staff::find($id)->delete();
        return redirect()->back()->with('delete', "ลบเรียบร้อยแล้ว");

    }

}
