<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditProfileController;
use App\Models\User;
use App\Http\Controllers\AuthController;

Route::group(['middleware' => 'guest','controller'=>AuthController::class], function () {
    Route::post('login', 'login')->name('login');
    Route::post('register', 'register')->name('register');
    Route::get('/login', function (){
        return view ('authentication');
    })->name('authenticate');
});