@props(['article'])
<div>
    <button class="btn btn-success btn-sm" wire:click="addToCart({{ $article->id }})">Ajouter Panier</button>
</div>
