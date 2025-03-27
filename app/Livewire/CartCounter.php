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
        $counter = 0;
        // $counter = count(Cart::getCartStatic());
        foreach(Cart::getCartStatic() as $item){
            $counter += $item['quantity'];
        }

        return view('livewire.cart-counter', compact('counter'));
    }


}
