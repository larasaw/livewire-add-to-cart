<?php

namespace App\Livewire;

use App\Services\Cart;
use Livewire\Attributes\On;
use Livewire\Component;

class CartCounter extends Component
{
    #[On('additem')]
    public function render()
    {
        // $counter = Cart::getCartStatic();
        $counter = count(Cart::getCartStatic());
        return view('livewire.cart-counter', compact('counter'));
    }


}
