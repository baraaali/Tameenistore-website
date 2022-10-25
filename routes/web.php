<?php

use App\Http\Controllers\UserInformationController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');

    require __DIR__.'/auth.php';

    /** Admin Routs */
        
    // get user information
    Route::get('/user-information',[UserInformationController::class, 'index'])->name('user-information');

    

        /** User Routs */

    //user profile
    Route::get('/show-profile',[UserInformationController::class, 'show'])->name('show-profile');
    Route::get('/edit-profile',[UserInformationController::class, 'edit'])->name('edit-profile');
    Route::get('/update-profile',[UserInformationController::class, 'update'])->name('update-profile');
    Route::get('/destroy-profile{id}',[UserInformationController::class, 'destroy'])->name('destroy-profile');
    
    //subscription

    Route::middleware("auth")->group(function () {
        Route::get('plans', [PlanController::class, 'index']);
        Route::get('plans/{plan}', [PlanController::class, 'show'])->name("plans.show");
        Route::post('subscription', [PlanController::class, 'subscription'])->name("subscription.create");
    });