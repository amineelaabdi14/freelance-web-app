<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\GigController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/profile', function (){
    return view('profile');
});
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login')->name('login');
    Route::post('register', 'register')->name('register');
    Route::post('logout', 'logout');
});

Route::controller(GigController::class)->group(function () {
    Route::post('gig', 'create')->name('create-gig');
    Route::put('gig', 'edit')->name('edit-gig');
    Route::delete('gig/{id}', 'delete')->name('delete-gig');
});

Route::put('/profile', [EditProfileController::class, 'editprofile'])->name('edit-profile');

