<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Models\User;
use App\Models\Report;
use App\Models\Category;

Route::group(['middleware' => 'auth','controller'=>UserController::class], function () {
    Route::get('/manage-users', function (){
        return view ('manageusers',['users'=>User::all()]);
    });
    Route::get('/manage-user/{user}','manageUser')->name('manage-user');

    Route::get('/categories',function(){
        return view('managecategories',['categories'=>Category::all()]);
    });

    Route::delete('/restric-user/{user}','restricUser')->name('restric-user');
});

Route::group(['middlewere'=>'auth','controller'=>ServiceController::class],function(){
    Route::delete('/delete-service-byadmin/{service}','deleteServiceByAdmin')->name('delete-service-byadmin');
});


Route::group(['middlewere'=>'auth','controller'=>CategoryController::class],function(){
    Route::post('/add-category','addCategory')->name('add-category');
    Route::post('/edit-category/{category}','editCategory')->name('edit-category');
    Route::delete('/delete-category/{category}','deleteCategory')->name('delete-category');
});