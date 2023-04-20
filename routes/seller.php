<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\ServiceController;
use App\Models\Service;
use App\Models\Category;

Route::middleware('auth')->group(function () {

    Route::get('/my-services', function () {
        return view('myservices',['myServices'=>Service::all()]);
    });

    Route::get('/add-service', function () {
        return view('addservice',['categories'=>Category::all()]);
    });

    Route::get('/edit-service/{id}', function ($id) {
        return view('editservice',['service'=>Service::find($id),'categories'=> Category::all()]);
    });

    Route::get('/getService/{id}',[ServiceController::class, 'getService']);
});

Route::group(['middleware' => 'auth','controller'=>ServiceController::class], function () {
    Route::post('service', 'create')->name('add-service');
    Route::put('service', 'edit')->name('edit-gig');
    Route::delete('delete-service/{service}', 'delete')->name('delete-service');
    Route::get('all-services', 'read');
    Route::get('service/{id}', 'select');
});