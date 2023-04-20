<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\ServiceController;
use App\Models\Service;
use App\Models\Category;

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

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () {
        $services = Service::paginate(20);
        return view('services', compact('services'));
    })->name('home');

    Route::get('/profile', function (){
        return view('profile');
    })->name('profile');

    Route::put('/profile', [EditProfileController::class, 'editprofile'])->name('edit-profile');
});


Route::group(['middleware' => 'guest','controller'=>AuthController::class], function () {
    Route::post('login', 'login')->name('login');
    Route::post('register', 'register')->name('register');
    Route::post('logout', 'logout');
    Route::get('/login', function (){
        return view ('authentication');
    })->name('authenticate');
});

Route::get('/service/{service}',[ServiceController::class,'showService'])->name('show-service');

Route::get('/user/{user}',[UserController::class,'getUser'])->name('get-user');


