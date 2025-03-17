<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $cart = Cart::session()->first();
        $prices = $cart->courses->pluck('stripe_price_id')->toArray();
        $sessionOptions = [
//            'success_url' => route('home', ['message' => 'Payment successful!']),
//            'cancel_url' => route('home', ['message' => 'Payment fail!']),
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.cancel') . '?session_id={CHECKOUT_SESSION_ID}',
            'billing_address_collection' => 'required',
            'phone_number_collection' => [
                'enabled' => true
            ],
            "payment_method_types" => [
                "card"
            ],
            'metadata' => [
                'cart_id' => $cart->id,
            ]
        ];
        $customerOptions = [
            'metadata' => [
                'my_code' => 123423123536,
            ]
        ];
        return Auth::user()->checkout($prices, $sessionOptions, $customerOptions);

    }

    public function success(Request $request)
    {
//        dd($request->get('session_id'));
        $session = $request->user()->stripe()->checkout->sessions->retrieve($request->get('session_id'));
        dd($session);
    }

    public function cancel(Request $request)
    {
//        dd($request->get('session_id'));
        $session = $request->user()->stripe()->checkout->sessions->retrieve($request->get('session_id'));
        dd($session);
    }

}
