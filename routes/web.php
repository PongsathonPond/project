<?php

use App\Http\Controllers\AddBookingUserout;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\LocaiotnManageSuperAdmin;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserManageSuperAdmin;
use App\Http\Controllers\user_out\User_RequestController;
use App\Http\Controllers\vice_admin\Vice_RequestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('indexpage');
});
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    //เปลี่ยนหน้า
    Route::get('/index', [RouteController::class, 'index'])->name('index');
    //จัดการข้อมูลผู้ใช้
    Route::get('/usermanage', [UserManageSuperAdmin::class, 'index'])->name('user-manage');
    Route::post('/usermanage/update/{id}', [UserManageSuperAdmin::class, 'update']);
    Route::get('/usermanage/delete/{id}', [UserManageSuperAdmin::class, 'delete']);

    //จัดการห้อง
    Route::get('/locationmanage/', [LocaiotnManageSuperAdmin::class, 'index'])->name('location-manage');
    Route::post('/locationmanage/add', [LocaiotnManageSuperAdmin::class, 'store'])->name('location-manage-add');
    Route::get('/locationmanage/delete/{id}', [LocaiotnManageSuperAdmin::class, 'delete']);
    Route::post('/locationmanage/update/{id}', [LocaiotnManageSuperAdmin::class, 'update']);

    //user ภายนอกส่ง data
    Route::get('/addbooking/', [AddBookingUserout::class, 'index'])->name('add-booking');
    Route::get('/addbooking/{id}', [AddBookingUserout::class, 'edit']);
    Route::post('/addbooking/add', [AddBookingUserout::class, 'store'])->name('booking-add');

    //จัดการปฏิทิน
    Route::get('fullcalender/', [FullCalenderController::class, 'index']);
    Route::get('fullcalender2/{id}', [AddBookingUserout::class, 'index2']);
    Route::post('fullcalenderAjax', [FullCalenderController::class, 'ajax']);
    Route::resource('/booking', FullCalenderController::class);

    //admin จัดการคำขอ
    Route::get('/request/superadmin', [RequestController::class, 'index'])->name('request-manage');
    Route::post('/request/update/{id}', [RequestController::class, 'update']);
    Route::get('/request/delete/{id}', [RequestController::class, 'delete']);

    //sendemail

    Route::post('/sendmail', [EmailController::class, 'sendEmail'])->name('addlist');

    //vice_admin

    //vice_admin จัดการคำขอ
    Route::get('/request/vice_admin', [Vice_RequestController::class, 'index'])->name('request_vice');
    Route::post('/request/vice_admin/update/{id}', [Vice_RequestController::class, 'update']);
    //user_out คำขอของฉัน
    Route::get('/request/user', [User_RequestController::class, 'index'])->name('request_user');
    Route::get('/request/detail/{id}', [User_RequestController::class, 'detail']);

    //staff เพิ่มผู้ดูแลระบบ

    Route::get('/manage/staff', [StaffController::class, 'index'])->name('staff_add');
    Route::get('/manage/delete/{id}', [StaffController::class, 'delete']);
    Route::post('/manage/addrole', [StaffController::class, 'store'])->name('addrole_staff');
    Route::get('/manage/deleteatten/{id}', [StaffController::class, 'deleteatten']);

});

// login staff
Route::get('/staff_login', [AuthController::class, "LoginView"])->name('stafflogin');
Route::post('/do-login', [AuthController::class, "doLogin"]);
Route::post('/do-register', [AuthController::class, "doRegister"]);
Route::get('/dashboard', [AuthController::class, "dashboard"])->name('staff-dashboard');
Route::get('/logout', [AuthController::class, "logout"]);

//จัดการคำขอ

Route::get('/request_staff', [StaffController::class, 'requeststaff'])->name('staff-request');
Route::post('/request_staff/update/{id}', [StaffController::class, 'update']);
