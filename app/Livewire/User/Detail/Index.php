<?php

namespace App\Livewire\User\Detail;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $product, $quantityCount = 1;


    public function incrementQuantity(){
        if($this->quantityCount < 30){
            $this->quantityCount++;
        }
           
    
    }

    public function decrementQuantity(){
        if($this->quantityCount > 1){
            $this->quantityCount--;
        }
    }

    public function addToCart(int $productId){

        if(Auth::check()){

                if($this->product->where('id', $productId)->where('status', '0')->exists())
                {
                        if(Cart::where('user_id',  auth()->user()->id)->where('product_id', $productId)->exists()){

                               $this->dispatch('message',
                                //[
                                    text: 'Product Already Added to Cart',
                                   // 'type' => 'warning',
                                    //'status' => 200
                                //]
                            );   

                        }else{

                            if($this->product->quantity > 0)
                            {
                                    if($this->product->quantity > $this->quantityCount)
                                    {
                                        //Insert Product to Cart
                                        Cart::create([
                                            'user_id' => auth()->user()->id,
                                            'department_id' => auth()->user()->department_id,
                                            'product_id' => $productId,
                                            'quantity' => $this->quantityCount
    
                                        ]);

                                        $this->dispatch('refreshCartCountComponent');
                                        $this->dispatch('refreshModelComponent');
                                        $this->dispatch('refreshShowComponent');
    
                                        $this->dispatch('message',
                                        //[
                                            text : 'Product Added to Cart',
                                            //'type' => 'success',
                                            //'status' => 202
                                        //]
                                    );
    
    
                                    }else{
                                        $this->dispatch('message',
                                        //[
                                            text: 'Only '.$this->product->quantity.' Quantity Available',
                                            // 'type' => 'warning',
                                            // 'status' => 404
                                       // ]
                                    );
                                    }
                            }else{
                                $this->dispatch('message',
                                //[
                                    text:'Out of Stock',
                                //     'type' => 'warning',
                                //     'status' => 404
                                // ]
                            );
                            }
                        }
                        

                }else{
                    $this->dispatch('message',
                    //[
                        text: 'Product does not exists',
                    //     'type' => 'warning',
                    //     'status' => 404
                    // ]
                );
                }
            
        }else{
        
            $this->dispatch('message',
            //[
                text: 'Please login to continue',
            //     'type' => 'info',
            //     'status' => 401
            // ]
        );
        }
        
    }


    
    public function mount($product)
    {
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.user.detail.index', [
            'product' => $this->product        ]);
    }  
}
