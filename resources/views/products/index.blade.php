@extends('layouts.app')

@section('title', 'Catalogues - ShopLaravel')

@section('content')
    <div class="row ">
    <!--
        @forelse($products as $product)
            @include('partials.product-card')
        @empty
            <p>Aucun produit trouvé.</p>
        @endforelse
    -->
        @forelse($products as $product)
            <x-product-card :product="$product" />
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                    <p class="mb-0">Aucun produit trouvé.</p>
                </div>
            </div>
        @endforelse

    </div>

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>
@endsection
