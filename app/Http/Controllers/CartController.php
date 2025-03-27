<?php

namespace App\Http\Controllers;

use App\Services\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }


    public function addToCart($article)
    {
        $item = [
            'id' => $article->id, // assuming this is the product ID
            'name' => $article->designation,
            'price' => $article->prix_ht,
            'tva' => $article->tva,
            // 'quantity' => 1,
        ];

        // $this->cart->clearCart();
        $this->cart->add($item['id'], $item['name'], $item['price'], $item['tva']);


        // dd('cart controller : ',$this->cart->getCart());

        return redirect()->back()->with('success', 'Item added to cart!');
    }

    public function remove($itemId)
    {
        $this->cart->remove($itemId);

        return redirect()->back()->with('success', 'Item removed from cart!');
    }

    public function update($itemId, $quantity)
    {
        $this->cart->update($itemId, $quantity);

        return redirect()->back()->with('success', 'Cart updated!');
    }

    public function viewCart()
    {
        $cartItems = $this->cart->getCart();
        $totalPrice = $this->cart->getTotalPrice();

        return view('cart.index', compact('cartItems', 'totalPrice'));
    }
}
