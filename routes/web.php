<?php

use App\Http\Controllers\AddBookingUserout;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\LocaiotnManageSuperAdmin;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\UserManageSuperAdmin;
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
    return view('welcome');
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

    //user ภายนอก
    Route::get('/addbooking/', [AddBookingUserout::class, 'index'])->name('add-booking');
    Route::get('/addbooking/{id}', [AddBookingUserout::class, 'edit']);
    Route::post('/addbooking/add', [AddBookingUserout::class, 'store'])->name('booking-add');

    Route::get('fullcalender/', [FullCalenderController::class, 'index']);
    Route::get('fullcalender2/{id}', [AddBookingUserout::class, 'index2']);
    Route::post('fullcalenderAjax', [FullCalenderController::class, 'ajax']);
    Route::resource('/booking', FullCalenderController::class);

});
