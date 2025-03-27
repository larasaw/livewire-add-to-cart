<?php

namespace App\Livewire;

use App\Services\Cart;
use Livewire\Attributes\On;
use Livewire\Component;

class CartList extends Component
{
    public $cartid=0;
    public $quantity=1;

    public function edit($id)
    {
        $item=Cart::getItem($id);
        $this->quantity=$item['quantity'];
        $this->cartid=$id;

    }

    public function update()
    {
        app('App\Http\Controllers\CartController')->update($this->cartid,$this->quantity);
        $this->cartid=0;
    }

    #[On('additem')]
    public function render()
    {
       $cart=Cart::getCartStatic();
        return view('livewire.cart-list',compact('cart'));
    }

    public function removeItem($id)
    {
        app('App\Http\Controllers\CartController')->remove($id);
        $this->dispatch('additem');
    }
}
