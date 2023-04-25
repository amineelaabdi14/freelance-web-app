<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\Report;
use App\Models\Service;

Route::group(['middlewere' => 'auth','controller'=>UserController::class], function () {
    Route::get('/manage-users', function (){
        return view ('manageusers',['users'=>User::all()]);
    });
    Route::get('/manage-reports', function (){
        return view ('managereports',['services'=>Service::WhereHas('report')->get()]);
    });
    Route::get('/manage-user/{$user}', function ($user){
        return view ('manageuser',['reports'=>Report::all()]);
    });
});