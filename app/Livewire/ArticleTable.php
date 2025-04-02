<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $article;
    public function addToCart($id)
    {
        $article = Article::find($id);

        app('App\Http\Controllers\CartController')->addToCart($article);
        $this->dispatch('additem');



        session()->flash('success', 'article added to cart!');
    }


    public function render()
    {
        $products = Article::where('designation', 'like', '%' . $this->search . '%')->paginate(3);
        return view('livewire.article-table', compact('products'));
    }
}
