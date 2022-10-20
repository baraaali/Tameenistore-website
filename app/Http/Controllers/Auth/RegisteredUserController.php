<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Stevebauman\Location\Facades\Location;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // get user location 
        $currentUserInfo =  Location::get('https://'.$request->ip());
        $country_name = $currentUserInfo->countryName;
        $country_code = $currentUserInfo->countryCode;
        $city = $currentUserInfo->cityName;
        $region = $currentUserInfo->regionName;
        
        Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'string','unique:users'],
            'account_type' => ['required', 'string','in:normal_user,agency,insurance_company,maintenance_center'],
            'country' => ['required', 'string'] ,
            'country_code' => ['required', 'string'] ,
            'city' => ['required', 'string'] ,
            'region'=> ['required', 'string'] ,
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'account_type' => $request->account_type,
            'country' => $country_name,
            'country_code' => $country_code,
            'city' => $city,
            'region' => $region,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
