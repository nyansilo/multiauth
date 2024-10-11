<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {

        $orders  = Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view("user.order.index",compact('orders'));
        
    }

    public function orderDetail($orderId)
    {

        //Use the method below if you want to pass ID as paremeter 
        // but if the the model was injected
        //Then Model Binding will prefered as it can be used to show the slug in the Url
        //Paremeter instead of an id:eg below 
        //public function propertyDetail($id){
        //$property = Property::findorFail($id);
        //return view('theme.home.property_detail', compact('property'));}
        //if the Model binding is used: then first define the getRouteKeyName(){
        // function in the Model or you can use another technique which 
        // not mention here.

        $order = Order::where('user_id', Auth::user()->id)->where('id', $orderId)->first();
        
        if($order){
            return view('user.order.order_detail', compact('order'));
        }else{
                return redirect()->back()->with('message', 'No Order Found');
        }
        

           
        
    }
}
