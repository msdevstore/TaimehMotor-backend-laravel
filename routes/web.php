<?php

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
    return view('auth/login');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('user','fireauth');
Route::post('/home/store', [App\Http\Controllers\HomeController::class, 'store'])->name('add_member')->middleware('user','fireauth');
Route::post('/home/edit', [App\Http\Controllers\HomeController::class, 'update'])->name('edit_user')->middleware('user','fireauth');
Route::post('/delete_user', [App\Http\Controllers\HomeController::class, 'destroy'])->name('user_del')->middleware('user','fireauth');
Route::post('/view_user', [App\Http\Controllers\HomeController::class, 'show'])->name('view_user')->middleware('user','fireauth');

// Route::get('/home/customer', [App\Http\Controllers\HomeController::class, 'customer'])->middleware('user','fireauth');

Route::get('/email/verify', [App\Http\Controllers\Auth\ResetController::class, 'verify_email'])->name('verify')->middleware('fireauth');

Route::post('login/{provider}/callback', 'Auth\LoginController@handleCallback');

Route::resource('/home/profile', App\Http\Controllers\Auth\ProfileController::class)->middleware('user','fireauth');

Route::resource('/password/reset', App\Http\Controllers\Auth\ResetController::class);

Route::resource('/img', App\Http\Controllers\ImageController::class);

Route::get('/motorcycles', [App\Http\Controllers\MotorController::class, 'index'])->name('motorcycles')->middleware('user','fireauth');
Route::post('/motorcycles/store', [App\Http\Controllers\MotorController::class, 'store'])->name('add_motors')->middleware('user','fireauth');
Route::post('/motorcycles/update_motor', [App\Http\Controllers\MotorController::class, 'update_motor'])->name('update_motor')->middleware('user','fireauth');
Route::post('/motorcycles/view_motor', [App\Http\Controllers\MotorController::class, 'view_motor'])->name('view_motor')->middleware('user','fireauth');
Route::post('/delete', [App\Http\Controllers\MotorController::class, 'delete'])->name('motor_del')->middleware('user','fireauth');
Route::get('/request', [App\Http\Controllers\RequestController::class, 'index'])->name('request')->middleware('user','fireauth');

Route::get('/store', [App\Http\Controllers\StoreController::class, 'index'])->name('store')->middleware('user','fireauth');
Route::get('/store_production', [App\Http\Controllers\StoreController::class, 'store_production'])->name('store_production')->middleware('user','fireauth');
Route::get('/store_production', [App\Http\Controllers\ProductController::class, 'production'])->name('production')->middleware('user','fireauth');
Route::post('/update_state', [App\Http\Controllers\ProductController::class, 'update_status'])->name('update_status')->middleware('user','fireauth');

Route::get('/maintenance', [App\Http\Controllers\MaintenanceController::class, 'index'])->name('maintenance')->middleware('user','fireauth');
Route::get('/inmaintain', [App\Http\Controllers\MaintenanceController::class, 'maintain_assign'])->name('inmaintain')->middleware('user','fireauth');
Route::get('/inmaintain', [App\Http\Controllers\InmaintainController::class, 'maintain'])->name('maintainassign')->middleware('user','fireauth');
Route::post('/update_state', [App\Http\Controllers\InmaintainController::class, 'update_status'])->name('update_status')->middleware('user','fireauth');
