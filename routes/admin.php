<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Models\User;
use App\Models\Report;
use App\Models\Service;

Route::group(['middleware' => 'auth','controller'=>UserController::class], function () {
    Route::get('/manage-users', function (){
        return view ('manageusers',['users'=>User::all()]);
    });
    Route::get('/manage-user/{user}','manageUser')->name('manage-user');

    Route::delete('/restric-user/{user}','restricUser')->name('restric-user');
});

Route::group(['middlewere'=>'auth','controller'=>ServiceController::class],function(){
    Route::delete('/delete-service-byadmin/{service}','deleteServiceByAdmin')->name('delete-service-byadmin');
});