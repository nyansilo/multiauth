<?php

namespace App\Livewire\User\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartModelComponent extends Component
{

    public $cartItems;
    protected $listeners = ['refreshModelComponent' => '$refresh'];

    public function removeCartItem(int $cartId){
        $cartRemvedItem = Cart::where('user_id', auth()->user()->id)->where('id', $cartId)->first();
        if($cartRemvedItem){
            $cartRemvedItem->delete();
            $this->dispatch('refreshCartCountComponent');
            $this->dispatch('refreshShowComponent');
    
            $this->dispatch('message',
                text : 'Cart item removed successfully',
            );
        }else{
            $this->dispatch('message',
            text : 'Something went wrong!',
        );
        }
           
    
    }

    public function render()
    {
        $this->cartItems = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.user.cart.cart-model-component',
        [
            'cartItems' => $this->cartItems
        ]);
    }
}
