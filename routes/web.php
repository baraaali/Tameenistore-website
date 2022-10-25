<?php
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Models\UserInformation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Subscriptions;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\PaymentController;
use App\Plan;
    /** Admin Routs */
        
    // get user information
    Route::get('/user-information',[UserInformation::class, 'index']);






        /** User Routs */

    //user account
    Route::resource('/user-account',UserInformation::class);

    //subscriptions plans and payment
    Route::group(['namespace' => 'Subscriptions'], function() {
        Route::get('/plans', [SubscriptionController::class, 'index'])->name('plans');
        Route::get('/payments',[PaymentController::class,'index'])->name('payments');
        Route::post('/payments', [PaymentController::class,'store'])->name('payments.store');
    });

    