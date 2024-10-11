<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index()
    {

        //$carts  = Cart::all();
        //return view("user.cart.index",compact('carts'));

        return view("user.cart.index");
        
    }
}
