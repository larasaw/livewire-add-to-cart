<div class="d-flex justify-content-end mb-3">
    <button class="btn btn-primary me-3" wire:click="clearCounter">Vider Panier</button>

    <div class="position-relative">
        <button class="btn btn-primary">
            <i class="bi bi-cart"></i> Panier
        </button>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            {{ $counter }}
        </span>
    </div>

</div>
