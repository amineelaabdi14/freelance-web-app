<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\UserController;
use App\Models\Service;
use App\Models\Category;
use App\Models\User;
use App\Models\City;

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

Route::get('/',[ServiceController::class,'search'])->name('home');

Route::group(['middleware' => 'auth'], function () {
        Route::get('/profile', function (){
            return view('profile');
        })->name('profile');
        Route::put('/profile', [EditProfileController::class, 'editprofile'])->name('edit-profile');
        Route::post('/report/{id}',[ReportController::class,'report'])->name('report-service');
        Route::post('/comment/{id}',[CommentController::class,'comment'])->name('add-comment');
        Route::post('/make-seller/{user}',[UserController::class,'makeSeller'])->name('make-seller');
        Route::get('/become-a-seller',function(){
            return view('becomeaseller',['cities'=>City::all()]);
        });
        Route::get('logout', [AuthController::class,'logout'])->name('logout');
        Route::post('add-proposal/{service}', [ProposalController::class,'create'])->name('add-proposal');
});


Route::get('/service/{service}',[ServiceController::class,'showService'])->name('show-service');

Route::get('/user/{user}',function(User $user){
    return view('user',['user'=>$user]);
})->name('get-user');

Route::get('/search',[ServiceController::class,'search'])->name('search');

Route::get('/filter/{category}',[ServiceController::class,'filterByCat'])->name('filter-by-category');


