@extends('layouts.app')

@section('title', 'Mon Panier - Shop Laravel')

@section('content')
    <div class="row align-items-center my-5" style="min-height: 75vh;">
        <h1 class="mb-4">Mon Panier</h1>

        @if($cart->isEmpty())
            <div class="alert alert-info text-center">
                <i class="bi bi-cart-x fs-1 d-block mb-2"></i>
                <p class="mb-0">Votre panier est vide.</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary mt-3">Continuer mes achats</a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Prix unitaire</th>
                        <th>Quantité</th>
                        <th>Sous-total</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cart as $id => $details)
                        <tr>
                            <td>{{ $details['name'] }}</td>
                            <td>{{ number_format($details['price'], 2) }} €</td>
                            <td>
                                <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex align-items-center">
                                    @csrf
                                    @method('PATCH')
                                    <input type="" name="quantity" value="{{ old('quantity', $details['quantity']) }}"
                                           min="1" class="form-control form-control-sm" style="width: 70px;">
                                    <button type="submit" class="btn btn-sm btn-primary ms-2">
                                        <i class="bi bi-check"></i>
                                    </button>
                                    @error('quantity')
                                        <p class="text-danger ms-2">{{ $message }}</p>
                                    @enderror
                                </form>
                            </td>
                            <td>{{ number_format($details['price'] * $details['quantity'], 2) }} €</td>
                            <td>
                                <form action="{{ route('cart.remove', $id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="3" class="text-end"><strong>Total :</strong></td>
                        <td colspan="2"><strong>{{ number_format($total, 2) }} €</strong></td>
                    </tr>
                    </tfoot>
                </table>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <form action="{{ route('cart.clear') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">
                        <i class="bi bi-trash"></i> Vider le panier
                    </button>
                </form>

                <div class="hstack gap-3">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Continuer mes achats</a>
                    <form action="{{ route('orders.store') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            Passer commande
                        </button>
                    </form>
                </div>

            </div>
        @endif
    </div>
@endsection
