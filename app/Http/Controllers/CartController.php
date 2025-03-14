<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Course;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::with('courses')->where('session_id', session()->getId())->first();
        return view('cart.index', get_defined_vars());
    }

    public function addtoCart(Course $course)
    {
        $cart = Cart::firstOrCreate([
            'session_id' => session()->getId(),
        ]);
        $cart->courses()->syncWithoutDetaching($course);
        return redirect()->back();
    }
}
