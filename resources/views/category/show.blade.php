@extends('layouts.app')

@section('title', 'Produits par catégorie')

@section('content')
    <div class="container py-4">
        <div class="mb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Catalogue</a></li>
                    <li class="breadcrumb-item active">{{ $category->name }}</li>
                </ol>
            </nav>

            <h1 class="h2 fw-bold">{{ $category->name }}</h1>
            @if($category->description)
                <p class="text-muted">{{ $category->description }}</p>
            @endif
        </div>

        <div class="row g-3">
            @forelse($products as $product)
                <x-product-card :product="$product" />
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                        <p class="mb-0">Aucun produit dans cette catégorie.</p>
                    </div>
                </div>
            @endforelse
        </div>

        @if($products->hasPages())
            <div class="mt-4 d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        @endif
    </div>
@endsection
