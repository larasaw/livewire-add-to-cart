<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class Cart extends Component
{
    public $article;

    public function mount($article)
    {
        $this->article = $article;
    }

    public function addToCart($id)
    {
        $article = Article::find($id);

    app('App\Http\Controllers\CartController')->addToCart($article);
    $this->dispatch('additem');



    session()->flash('success', 'article added to cart!');
    }
    public function render()
    {
        return view('livewire.cart');
    }
}
