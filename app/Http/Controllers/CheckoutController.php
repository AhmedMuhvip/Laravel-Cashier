<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\PaymentIntent;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $cart = Cart::session()->first();
        $prices = $cart->courses->pluck('stripe_price_id')->toArray();
        $sessionOptions = [
            'success_url' => route('home', ['message' => 'Payment successful!']),
            'cancel_url' => route('home', ['message' => 'Payment fail!']),
            'billing_address_collection' => 'required',
            'phone_number_collection' => [
                'enabled' => true
            ],
            "payment_method_types" => [
                "card"
            ],
        ];
        return Auth::user()->checkout($prices, $sessionOptions);

    }

}
