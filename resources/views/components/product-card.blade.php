<div class="col-12 col-sm-6 col-md-4 col-lg-3 my-4">
    <div class="card h-100">
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
        @else
            <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxfHxzaG9lfGVufDB8MHx8fDE3MjEwNDEzNjd8MA&ixlib=rb-4.0.3&q=80&w=1080" class="card-img-top" alt="Product Image">
        @endif
        <div class="card-body d-flex flex-column">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <h5 class="card-title mb-0">{{ $product->name }}</h5>
                <span class="badge text-bg-{{ $product->active ? 'success' : 'secondary' }}">
                    {{ $product->active ? 'Actif' : 'Inactif' }}
                </span>
            </div>
            @if($product->category)
                <p class="small">Catégorie : <strong>{{ $product->category?->name }}</strong></p>
            @endif
            <span class="badge text-bg-primary mb-2 align-self-start">{{ $product->stockStatus }}</span>
            <p class="card-text flex-grow-1">{{ $product->description }}</p>
            <div class="d-flex justify-content-between align-items-center mt-auto">
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
        <div class="card-footer bg-light">
            <div class="d-flex flex-wrap gap-2 mb-2">
                <button class="btn btn-primary btn-sm flex-fill">
                    <i class="bi bi-cart-plus"></i> Panier
                </button>
                <a href="{{ route('products.show', $product) }}" class="btn btn-info btn-sm flex-fill">
                    <i class="bi bi-eye"></i> Détails
                </a>
                <button class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-heart-fill text-danger"></i>
                </button>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm flex-fill">
                    <i class="bi bi-pencil"></i> Éditer
                </a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" class="flex-fill" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm w-100">
                        <i class="bi bi-trash"></i> Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
