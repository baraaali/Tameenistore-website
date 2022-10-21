<?php
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Models\UserInformation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;

    /** Admin Routs */
        
    // get user information
    Route::get('/user-information',[UserInformation::class, 'index']);






        /** User Routs */

    //user account
    Route::resource('/user-account',UserInformation::class);

    Route::resource('/plan', PlanController::class);