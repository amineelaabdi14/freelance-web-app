<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProposalController;
use App\Models\Service;
use App\Models\Proposal;
use App\Models\Category;
use App\Models\City;

Route::middleware('auth')->group(function () {

    Route::get('/my-services', function () {
        return view('myservices',['myServices'=>auth()->user()->service()->get()]);
    })->middleware('role:seller');

    Route::get('/add-service', function () {
        return view('addservice',['categories'=>Category::all(),'cities'=>City::all()]);
    })->middleware('role:seller');

    Route::get('/my-proposals', function () {
        return view('myproposals',['proposals'=>auth()->user()->proposal]);
    })->middleware('role:seller');

    Route::put('/mark-proposal/{proposal}', [ProposalController::class, 'markProposal'])->middleware('role:seller')->name('mark-proposal');

    Route::delete('/delete-proposal/{proposal}', [ProposalController::class, 'deleteProposal'])->middleware('role:seller')->name('delete-proposal');

    Route::get('/edit-service/{service}',[ServiceController::class,'getEditService'])->name('get-edit-service')->middleware('role:seller');
    Route::get('/getService/{id}',[ServiceController::class, 'getService']);
});

Route::group(['middleware' => 'auth','controller'=>ServiceController::class], function () {
    Route::post('service', 'create')->name('add-service')->middleware('role:seller');
    Route::put('service/{service}', 'edit')->name('edit-service')->middleware('role:seller');
    Route::delete('delete-service/{service}', 'delete')->name('delete-service')->middleware('role:seller');
    Route::get('all-services', 'read');
});