<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {

        //$carts  = Cart::all();
        //return view("user.cart.index",compact('carts'));

        return view("user.checkout.index");
        
    }
}
