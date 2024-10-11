<?php

namespace App\Livewire\User\Dashboard;

use Livewire\Component;

class Index extends Component
{
    public $products;
    public function mount($products)
    {
        $this->products = $products;
    }
    public function render()
    {
        return view('livewire.user.dashboard.index', [
            'products' => $this->products
        ]);
    }
}
