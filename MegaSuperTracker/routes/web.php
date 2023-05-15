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
    return view('home');
});

//Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users');
Route::get('/timesheets', [App\Http\Controllers\TimesheetController::class, 'index'])->name('timesheets');
Route::post('/timesheets', [App\Http\Controllers\TimesheetController::class, 'store'])->name('timesheets');

Route::get('/login/admin', [App\Http\Controllers\Auth\LoginController::class, 'showAdminLoginForm']);
Route::post('/login/admin', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin']);

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('/admin/users', [App\Http\Controllers\AdminController::class, 'users'])->name('users');
Route::post('/admin/users/delete', [App\Http\Controllers\AdminController::class, 'delete_user'])->name('users');
Route::post('/admin/users/new', [App\Http\Controllers\AdminController::class, 'create_user'])->name('users');
