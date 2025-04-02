<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;

class Cart
{
    protected $cartKey = 'cart';


    /**
     * Get the cart items.
     *
     * @return array
     */
    public function getCart()
    {
        return Session::get($this->cartKey, []);
    }

    public static function getItem($id)
    {
       $cart =Session::get('cart', []);
        return $cart[$id];
    }

    public static function getCartStatic()
    {
        return Session::get('cart', []);
    }

    /**
     * Add an item to the cart.
     *
     * @param array $item
     * @return void
     */
    public function add($id,$name,$price,$tva,$qte=1)
    {
        $cart = Session::get($this->cartKey, []);
        // Check if item already exists, then increase quantity
        // dd('isset cart ',isset($cart[$id]));
        if(isset($cart[$id])){
            // dd('cart service',$cart[$id]);
            $cart[$id]['quantity'] += $qte;
        }else{
            $cart[$id] = [
                'id' => $id,
                'name' => $name,
                'price' => $price,
                'tva' => $tva,
                'quantity' => $qte,
            ];
        }

        Session::put($this->cartKey, $cart);
    }

    /**
     * Remove an item from the cart.
     *
     * @param int $itemId
     * @return void
     */
    public function remove($id)
    {
        $cart = Session::get($this->cartKey);

        if(isset($cart[$id])){
            unset($cart[$id]);
        }
        Session::put($this->cartKey, $cart);
    }

    /**
     * Update the quantity of an item in the cart.
     *
     * @param int $itemId
     * @param int $quantity
     * @return void
     */

public function update($id, $quantity){
    $cart = Session::get($this->cartKey);
    if(isset($cart[$id])){
        $cart[$id]['quantity'] = $quantity;
    }
    Session::put($this->cartKey, $cart);
}
    /**
     * Clear the cart.
     *
     * @return void
     */
    public function clearCart()
    {
        Session::forget($this->cartKey);
    }

    /**
     * Get the total price of the items in the cart.
     *
     * @return float
     */
    public function getTotalPrice()
    {
        $total = 0;
        foreach ($this->getCart() as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    public function searchCard($search){
        $cart = Session::get($this->cartKey, []);
        $result = [];
        foreach ($cart as $item) {
            if (stripos($item['name'], $search) !== false) {
                $result[] = $item;
            }
        }
        return $result;
    }
}
