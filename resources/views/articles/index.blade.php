<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@livewireStyles
    <title>Document</title>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Articles</h1>
    <livewire:cart-counter />
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
            @foreach($articles as $article)
                <tr>
                    <td>{{ $article->designation ?? '-' }}</td>
                    <td>{{ $article->qte ?? '-' }}</td>
                    <td>{{ $article->prix_ht ??  '-' }}</td>
                    <td>{{ $article->tva ?? '-' }}</td>
                    <td>
                       <livewire:cart :article="$article" :key="$article->id" />
                        {{-- <button class="btn btn-danger btn-sm" wire:click="deleteArticle({{ $article->id }})">Delete</button> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-4">
        {{ $articles->links() }}
    </div>

    <div class="mt-5">
        <h2>Cart</h2>
        <livewire:cart-list />
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@livewireScripts

</body>
</html>
