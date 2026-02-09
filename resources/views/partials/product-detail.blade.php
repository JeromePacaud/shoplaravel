<div class="container py-3 py-md-5">
    <div class="row">
        <!-- Product Images -->
        <div class="col-12 col-lg-6 mb-4">
            <div class="card">
                <img src="https://images.unsplash.com/photo-1444881421460-d838c3b98f95?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw1fHx3YXRjaHxlbnwwfDB8fHwxNzM0OTY1MTc4fDA&ixlib=rb-4.0.3&q=80&w=1080" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <div class="row g-2">
                        <div class="col-3">
                            <img src="https://images.unsplash.com/photo-1434056886845-dac89ffe9b56?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwyfHx3YXRjaHxlbnwwfDB8fHwxNzM0OTY1MTc4fDA&ixlib=rb-4.0.3&q=80&w=1080" class="img-thumbnail" alt="Thumbnail 1">
                        </div>
                        <div class="col-3">
                            <img src="https://images.unsplash.com/photo-1495857000853-fe46c8aefc30?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw2fHx3YXRjaHxlbnwwfDB8fHwxNzM0OTY1MTc4fDA&ixlib=rb-4.0.3&q=80&w=1080" class="img-thumbnail" alt="Thumbnail 2">
                        </div>
                        <div class="col-3">
                            <img src="https://images.unsplash.com/photo-1451859757691-f318d641ab4d?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw3fHx3YXRjaHxlbnwwfDB8fHwxNzM0OTY1MTc4fDA&ixlib=rb-4.0.3&q=80&w=1080" class="img-thumbnail" alt="Thumbnail 3">
                        </div>
                        <div class="col-3">
                            <img src="https://images.unsplash.com/photo-1490915785914-0af2806c22b6?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwzfHx3YXRjaHxlbnwwfDB8fHwxNzM0OTY1MTc4fDA&ixlib=rb-4.0.3&q=80&w=1080" class="img-thumbnail" alt="Thumbnail 4">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Details -->
        <div class="col-12 col-lg-6">
            <h1 class="h2 h1-md mb-3">{{ $product->name }}</h1>
            <div class="mb-3">
                <span class="h3 h4-md me-2">{{ $product->formattedPrice }}</span>
                <span class="badge text-bg-{{ $product->active ? 'success' : 'secondary' }}">
                    {{ $product->active ? 'Actif' : 'Inactif' }}
                </span>
            </div>

            <div class="mb-3">
                <div class="d-flex align-items-center flex-wrap">
                    <div class="text-warning me-2 mb-2 mb-sm-0">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                    </div>
                    <span class="text-muted">(128 commentaires)</span>
                </div>
            </div>

            <p class="mb-4">
                {{ $product->description }}
            </p>

            <!-- Color Selection -->
            <div class="mb-4">
                <h6 class="mb-2">Couleur</h6>
                <div class="btn-group d-flex flex-wrap" role="group">
                    <input type="radio" class="btn-check" name="color" id="silver" checked>
                    <label class="btn btn-outline-secondary btn-sm" for="silver">Silver</label>
                    <input type="radio" class="btn-check" name="color" id="gold">
                    <label class="btn btn-outline-secondary btn-sm" for="gold">Gold</label>
                    <input type="radio" class="btn-check" name="color" id="black">
                    <label class="btn btn-outline-secondary btn-sm" for="black">Black</label>
                </div>
            </div>

            <!-- Quantity -->
            <div class="mb-4">
                <div class="d-flex align-items-center flex-wrap gap-2">
                    <label class="mb-0">Quantité:</label>
                    <select class="form-select form-select-sm" style="max-width: 80px;">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                    <span class="badge text-bg-primary ms-2">{{ $product->stockStatus }}</span>
                </div>
            </div>

            <!-- Actions -->
            <div class="d-grid gap-2 mb-4">
                <button class="btn btn-primary btn-lg" type="button">
                    <i class="bi bi-cart-plus me-2"></i>Ajouter au panier
                </button>
                <button class="btn btn-outline-secondary" type="button">
                    <i class="bi bi-heart-fill text-danger me-1"></i>Ajouter à la liste de souhaits
                </button>
            </div>

            <!-- Admin Actions (visible uniquement pour les admins) -->
            <div class="d-grid gap-2 mb-4">
                <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">
                    <i class="bi bi-pencil me-2"></i>Éditer ce produit
                </a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger w-100">
                        <i class="bi bi-trash me-2"></i>Supprimer ce produit
                    </button>
                </form>
            </div>

            <!-- Additional Info -->
            <div class="mt-4">
                <div class="d-flex align-items-start mb-3">
                    <i class="bi bi-truck text-primary me-3 fs-5"></i>
                    <span class="small">Frais de port offerts pour les achats supérieurs à 50€</span>
                </div>
                <div class="d-flex align-items-start mb-3">
                    <i class="bi bi-arrow-counterclockwise text-primary me-3 fs-5"></i>
                    <span class="small">Politique de retour de 30 jours</span>
                </div>
                <div class="d-flex align-items-start">
                    <i class="bi bi-shield-check text-primary me-3 fs-5"></i>
                    <span class="small">Garantie 2 ans</span>
                </div>
            </div>
        </div>
    </div>
</div>
