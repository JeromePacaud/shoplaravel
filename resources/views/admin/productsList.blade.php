@extends('layouts.app')

@section('title', 'Admin : liste des produits')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center my-4">
            <h1>Produits</h1>
            <a href="{{ route('products.create') }}" class="btn btn-primary">Ajouter un produit</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Slug</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Statut</th>
                    <th class="text-end">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->slug }}</td>
                        <td>{{ number_format($product->price, 2) }} €</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            <span class="badge {{ $product->active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $product->active ? 'Actif' : 'Inactif' }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group d-flex justify-content-end gap-2" role="group">
                                <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-info">Voir</a>
                                <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Éditer</a>

                                <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Aucun produit trouvé</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
