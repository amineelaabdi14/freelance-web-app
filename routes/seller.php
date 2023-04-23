<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\ServiceController;
use App\Models\Service;
use App\Models\Category;
use App\Models\City;

Route::middleware('auth')->group(function () {

    Route::get('/my-services', function () {
        return view('myservices',['myServices'=>auth()->user()->service()->get()]);
    });

    Route::get('/add-service', function () {
        return view('addservice',['categories'=>Category::all(),'cities'=>City::all()]);
    });

    Route::get('/edit-service/{service}',[ServiceController::class,'getEditService'])->name('get-edit-service');

    Route::get('/getService/{id}',[ServiceController::class, 'getService']);
});

Route::group(['middleware' => 'auth','controller'=>ServiceController::class], function () {
    Route::post('service', 'create')->name('add-service');
    Route::put('service', 'edit')->name('edit-service');
    Route::delete('delete-service/{service}', 'delete')->name('delete-service');
    Route::get('all-services', 'read');
});