<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Models\User;
use App\Models\Report;
use App\Models\Category;
use App\Models\Service;

Route::group(['middleware' => 'auth','controller'=>UserController::class], function () {
    Route::get('/manage-users', function (){
        return view ('manageusers',['users'=>User::with('service.report')->get()]);
    })->middleware('role:admin');
    Route::get('/manage-user/{user}','manageUser')->name('manage-user');

    Route::get('/categories',function(){
        return view('managecategories',['categories'=>Category::all()]);
    })->middleware('role:admin');

    Route::delete('/restric-user/{user}','restricUser')->name('restric-user')->middleware('role:admin');

    Route::post('/add-admin/{user}','addAdmin')->name('make-admin')->middleware('role:admin');
});

Route::group(['middlewere'=>'auth','controller'=>ServiceController::class],function(){
    Route::delete('/delete-service-byadmin/{service}','deleteServiceByAdmin')->name('delete-service-byadmin')->middleware('role:admin');
});


Route::group(['middlewere'=>'auth','controller'=>CategoryController::class],function(){
    Route::post('/add-category','addCategory')->name('add-category')->middleware('role:admin');
    Route::post('/edit-category/{category}','editCategory')->name('edit-category')->middleware('role:admin');
    Route::delete('/delete-category/{category}','deleteCategory')->name('delete-category')->middleware('role:admin');
});