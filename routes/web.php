<?php

use App\Models\UserInformation;
use Illuminate\Support\Facades\Route;

    /** Admin Routs */
        
    // get user information
    Route::get('/user-information',[UserInformation::class, 'index']);






        /** User Routs */

    //user account
    Route::resource('/user-account',UserInformation::class);