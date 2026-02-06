<div class="col-md-3 my-4">
    <div class="card">
        <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxfHxzaG9lfGVufDB8MHx8fDE3MjEwNDEzNjd8MA&ixlib=rb-4.0.3&q=80&w=1080" class="card-img-top" alt="Product Image">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5> <span class="badge text-bg-primary"> {{ $product->stockStatus }}</span>
            <p class="card-text">{{ $product->description }}</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="h5 mb-0">{{ $product->formattedPrice }} €</span>
                <div>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-half text-warning"></i>
                    <small class="text-muted">(4.5)</small>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between bg-light">
            <button class="btn btn-primary btn-sm">Ajouter au panier</button>
            <button class="btn btn-primary btn-sm">
                <a href="{{ route('products.show', ['id' => $product->id]) }}" class="text-light nav-link">Details</a>
            </button>
            <button class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-heart-fill text-danger"></i>
            </button>
        </div>
    </div>
</div>
