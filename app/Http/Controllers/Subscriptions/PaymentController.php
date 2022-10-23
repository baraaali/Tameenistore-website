<?php

namespace App\Http\Controllers\Subscriptions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index() {
        
        $user = Auth()->user();

        return view('update-payment-method', [
            'intent' => $user->createSetupIntent()
        ]);
        
    }

    public function store(Request $request) {
        
        $this->validate($request, [
            'token' => 'required'
        ]);

        $plan = Plans::where('identifier', $request->plan)
            ->orWhere('identifier', 'basic')
            ->first();
        
        $request->user()->newSubscription('default', $plan->stripe_id)->create($request->token);

        return back();
    }
}
