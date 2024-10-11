<?php

namespace App\Livewire\User\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartShowComponent extends Component
{
    public $cartItems;

    protected $listeners = ['refreshShowComponent' => '$refresh'];

    
    public function incrementQuantity(int $cartId){

        $cartItem= Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if($cartItem){

            if($cartItem->product->quantity > $cartItem->quantity){
                $cartItem->increment('quantity');
                $this->dispatch('refreshModelComponent');
                $this->dispatch('message',
                    text : 'Quantity Updated',
                );
            }else{
                $this->dispatch('message',
                    text : 'only '.$cartItem->product->quantity.' quantity  available ',
                );
            }
            
        }else{
            $this->dispatch('message',
                text : 'Something went wrong!',
            );
        }
           
    
    }

    public function decrementQuantity(int $cartId){
        $cartItem= Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();

        if($cartItem){

            if($cartItem->quantity >1){
                $cartItem->decrement('quantity');
                 $this->dispatch('refreshModelComponent');
                $this->dispatch('message',
                    text : 'Quantity Updated',
                );
            }else{
                $this->dispatch('message',
                    text : 'You should have atlest '.$cartItem->quantity.' quantity in your cart ',
                );
            }
            
        }else{
            $this->dispatch('message',
                text : 'Something went wrong!',
            );
        }
           
    }


    public function removeCartItem(int $cartId){
        $cartRemvedItem = Cart::where('user_id', auth()->user()->id)->where('id', $cartId)->first();
        if($cartRemvedItem){
            $cartRemvedItem->delete();
            $this->dispatch('refreshCartCountComponent');
            $this->dispatch('refreshModelComponent');
    
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
        return view('livewire.user.cart.cart-show-component', 
        [
            'cartItems' => $this->cartItems
        ]);
    }
}
