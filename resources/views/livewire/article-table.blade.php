<div>
    <div class="mb-3">
        <input wire:model.live.debounce.500ms="search" type="text" class="form-control" placeholder="Search products...">

    </div>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Designation</th>
                <th>Stock</th>
                <th>Prix HT</th>
                <th>Tva</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr class="table-light" key="{{ $product->id }}">
                    <td>{{ $product->designation ?? '-' }}</td>
                    <td>{{ $product->qte ?? '-' }}</td>
                    <td>{{ $product->prix_ht ??  '-' }}</td>
                    <td>{{ $product->tva ?? '-' }}</td>
                    <td>
                        <button class="btn btn-success btn-sm" wire:click="addToCart({{ $product->id }})">Ajouter Panier</button>
                        {{-- <button class="btn btn-danger btn-sm" wire:click="deleteArticle({{ $article->id }})">Delete</button> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div>
</div>

