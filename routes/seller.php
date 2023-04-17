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

    Route::get('/dashboard', function () {
        return view('dashboard',['myServices'=>Service::all()]);
    })->name('profile.edit');

    Route::get('/add-service', function () {
        return view('addservice',['categories'=>Category::all()]);
    })->name('profile.update');

    Route::get('/edit-service/{id}', function ($id) {
        return view('editservice',['service'=>Service::find($id),'categories'=> Category::all()]);
    })->name('profile.destroy');
});