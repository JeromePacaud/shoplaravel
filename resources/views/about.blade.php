@extends('layouts.app')

@section('title', 'À propos - ShopLaravel')

@section('content')
    <div class="container">
        <div class="text-center py-4 py-md-5">
            <h1 class="display-4 text-primary mb-3">À propos</h1>
            <p class="lead text-muted">Découvrez qui nous sommes</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">
                <div class="card border-0 rounded-4 shadow-sm mb-5">
                    <div class="card-body p-4 p-md-5">
                        <div class="mb-4">
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-shop-window text-primary fs-3 me-3"></i>
                                <h3 class="h4 mb-0">Notre histoire</h3>
                            </div>
                            <p class="text-secondary lh-lg">
                                ShopLaravel est une boutique en ligne conviviale, pensée pour rendre le shopping facile et agréable.
                                Ici, tu trouveras un peu de tout : des objets utiles, des idées cadeaux, des articles tendance et des
                                essentiels du quotidien.
                            </p>
                        </div>

                        <div class="mb-4">
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-bullseye text-primary fs-3 me-3"></i>
                                <h3 class="h4 mb-0">Notre mission</h3>
                            </div>
                            <p class="text-secondary lh-lg">
                                Notre objectif est simple : te proposer une sélection de produits variés, de qualité, à des prix
                                accessibles, le tout dans une ambiance chaleureuse et sans prise de tête.
                            </p>
                        </div>

                        <div class="mb-0">
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-heart text-primary fs-3 me-3"></i>
                                <h3 class="h4 mb-0">Notre engagement</h3>
                            </div>
                            <p class="text-secondary lh-lg mb-0">
                                N'hésite pas à parcourir les catégories, découvrir de nouveaux produits et profiter d'une expérience
                                d'achat rapide et sécurisée.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row g-3 g-md-4 mb-5">
                    <div class="col-6 col-md-3">
                        <div class="text-center p-3 bg-light rounded">
                            <i class="bi bi-award text-primary fs-2 mb-2"></i>
                            <p class="small fw-semibold mb-0">Qualité garantie</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="text-center p-3 bg-light rounded">
                            <i class="bi bi-piggy-bank text-primary fs-2 mb-2"></i>
                            <p class="small fw-semibold mb-0">Prix accessibles</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="text-center p-3 bg-light rounded">
                            <i class="bi bi-lightning text-primary fs-2 mb-2"></i>
                            <p class="small fw-semibold mb-0">Livraison rapide</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="text-center p-3 bg-light rounded">
                            <i class="bi bi-emoji-smile text-primary fs-2 mb-2"></i>
                            <p class="small fw-semibold mb-0">Service client</p>
                        </div>
                    </div>
                </div>

                <div class="text-center py-4 mb-5">
                    <h4 class="mb-3">Prêt à découvrir nos produits ?</h4>
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg px-5">
                        <i class="bi bi-basket me-2"></i>Voir la boutique
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
