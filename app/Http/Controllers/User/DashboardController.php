<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;

class DashboardController extends Controller
{
    public function dashboard()
    {

        $products  = Product::with('category')->get();
        return view("user.dashboard",compact('products'));
        
    }



    public function productDetail(Product $product)
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

        //$products = Product::with('category')->get(); 
        $products = Product::with('category')->get(); 
        return view('user.product_detail', compact('products','product'));

           
        
    }

    public function thankYou()
    {

        return view("user.thank_you.index");
        
    }

    
}
