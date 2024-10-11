<?php

namespace App\Livewire\User\Checkout;

use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CheckoutShowComponent extends Component
{
    public      $user_id,
                $tracking_no,
                $user_sign,
                $status_message;

    protected $placeOrder;   
    
    public $cartCount;

    protected $listeners = ['refreshCartCountComponent' => 'checkCartCount'];

    public $cartItems;

    public function checkCartCount()
    {
        if(Auth::check()){
            return $this->cartCount = Cart::where('user_id', auth()->user()->id)->count();
        }else{
            return $this->cartCount = 0;
        }
    }


    public function placeOrder(){

        $order = Order::create([
            'user_id'         =>   auth()->user()->id,
            'tracking_no'     =>  'CBE-'.Str::random(10),
            'department_id'   =>  auth()->user()->department_id,
            'user_sign'       =>  substr(auth()->user()->first_name, 0,1) .".". substr(auth()->user()->last_name,0,1),
            'status_message'  =>  "In Progress",
        ]);

        foreach($this->cartItems as $cartItem){
            $orderItems = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity
            ]);
        }  
        return $order;

    }
    


    public function submitOrder(){

        $placeOrder = $this->placeOrder();
        if($placeOrder){
            Cart::where('user_id', auth()->user()->id)->delete();
            $this->dispatch('message',
                text : 'Order placed successfully',
            );

            return redirect()->route('user.thankyou');
    
        }else{
    
            $this->dispatch('message',
                text : 'Something went wrong',
            );
    
        }
    }

    public function render()
    {

        // $this->user_id         =  auth()->user()->user_id;
        // $this->tracking_no     =  auth()->user()->tracking_no;
        // $this->full_name       =  auth()->user()->full_name;
        // $this->email           =  auth()->user()->email;
        // $this->phone           =  auth()->user()->phone;
        // $this->signature       =  auth()->user()->signature;
        // $this->status_message  =  auth()->user()->status_message;

        $this->cartCount = $this->checkCartCount();
        $this->cartItems = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.user.checkout.checkout-show-component',
        [
            'cartItems' => $this->cartItems,
            'cartCount' => $this->cartCount,
        ]);
    }
}
