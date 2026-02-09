@extends('layouts.app')

@section('title', 'Accueil - ShopLaravel')

@section('content')
    <div class="container">
        <!-- Hero Section -->
        <div class="text-center py-4 py-md-5">
            <h1 class="display-4 display-md-3 text-primary mb-3">
                Bienvenue chez {{ $name }} !
            </h1>
            <p class="lead px-3 px-md-5 mx-auto" style="max-width: 800px;">
                Bienvenue dans ta boutique en ligne simple et chaleureuse, où chaque visite est une découverte.
                Que tu cherches un petit coup de cœur, un cadeau sympa ou un indispensable du quotidien, tu es au bon endroit.
            </p>
        </div>

        <!-- Products Count -->
        <div class="text-center py-3">
            <h4 class="text-dark mb-3">
                Cherche parmi nos <span class="text-primary fw-bold">{{ $nbProducts }}</span> produits !
            </h4>

            <!-- Store Status Badge -->
            @if ($state === 'open')
                <div class="d-inline-flex align-items-center gap-2 px-4 py-2 bg-success bg-opacity-10 rounded-pill">
                    <i class="bi bi-shop text-success fs-5"></i>
                    <span class="text-success fw-semibold">Magasin ouvert !</span>
                </div>
            @else
                <div class="d-inline-flex align-items-center gap-2 px-4 py-2 bg-secondary bg-opacity-10 rounded-pill">
                    <i class="bi bi-shop text-secondary fs-5"></i>
                    <span class="text-secondary fw-semibold">Magasin fermé</span>
                </div>
            @endif
        </div>

        <!-- Call to Action -->
        <div class="text-center py-4 pb-5">
            <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg px-5 py-3">
                <i class="bi bi-basket me-2"></i>Découvrir nos produits
            </a>
        </div>

        <!-- Features Section (Optional) -->
        <div class="row g-4 py-5">
            <div class="col-12 col-md-4">
                <div class="text-center p-4">
                    <i class="bi bi-truck text-primary fs-1 mb-3"></i>
                    <h5>Livraison rapide</h5>
                    <p class="text-muted small">Livraison offerte dès 50€ d'achat</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="text-center p-4">
                    <i class="bi bi-shield-check text-primary fs-1 mb-3"></i>
                    <h5>Paiement sécurisé</h5>
                    <p class="text-muted small">Vos transactions sont 100% sécurisées</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="text-center p-4">
                    <i class="bi bi-arrow-counterclockwise text-primary fs-1 mb-3"></i>
                    <h5>Retours faciles</h5>
                    <p class="text-muted small">30 jours pour changer d'avis</p>
                </div>
            </div>
        </div>
    </div>
@endsection
