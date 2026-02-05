<div class="container py-5">
    <div class="row">
        <!-- Product Images -->
        <div class="col-md-6 mb-4">
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
        <div class="col-md-6">
            <h1 class="h2 mb-3">{{ $product->name }}</h1>
            <div class="mb-3">
                <span class="h4 me-2">{{ $product->price }} €</span>
            </div>

            <div class="mb-3">
                <div class="d-flex align-items-center">
                    <div class="text-warning me-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <span class="text-muted">(128 commentaires)</span>
                </div>
            </div>

            <p class="mb-4">
                {{ $product->descriptions }}
            </p>

            <!-- Color Selection -->
            <div class="mb-4">
                <h6 class="mb-2">Couleur</h6>
                <div class="btn-group" role="group">
                    <input type="radio" class="btn-check" name="color" id="silver" checked>
                    <label class="btn btn-outline-secondary" for="silver">Argent</label>
                    <input type="radio" class="btn-check" name="color" id="gold">
                    <label class="btn btn-outline-secondary" for="gold">Or</label>
                    <input type="radio" class="btn-check" name="color" id="black">
                    <label class="btn btn-outline-secondary" for="black">Noir</label>
                </div>
            </div>

            <!-- Quantity -->
            <div class="mb-4">
                <div class="d-flex align-items-center">
                    <label class="me-2">Quantité:</label>
                    <select class="form-select w-auto">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>

            <!-- Actions -->
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="button">Ajouter au panier</button>
                <button class="btn btn-outline-secondary" type="button">
                    <i class="bi bi-heart-fill text-danger me-1"></i>Ajouter à la liste de souhait
                </button>
            </div>

            <!-- Additional Info -->
            <div class="mt-4">
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-truck text-primary me-2"></i>
                    <span>Frais de port offert au dela de 50€ d'achat</span>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-undo text-primary me-2"></i>
                    <span>Police de retour de 30 jours</span>
                </div>
                <div class="d-flex align-items-center">
                    <i class="fas fa-shield-alt text-primary me-2"></i>
                    <span>2 ans de garentie</span>
                </div>
            </div>
        </div>
    </div>
</div>
