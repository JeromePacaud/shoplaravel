@extends('layouts.app')

@section('content')
    <div class="container" style="min-height: 75vh;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Commande #{{ $order->id }}</h1>
            <a href="{{ route('orders.index') }}" class="btn btn-secondary">Retour à mes commandes</a>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Informations de la commande</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-6">
                            <p><strong>Client :</strong> {{ $order->user->getFullName() }}</p>
                        </div>
                        <p><strong>Date :</strong> {{ $order->created_at->format('d/m/Y à H:i') }}</p>
                        <p><strong>Statut :</strong>
                            @switch($order->status)
                                @case('pending')
                                    <span class="badge bg-warning">En attente</span>
                                    @break
                                @case('processing')
                                    <span class="badge bg-info">En cours</span>
                                    @break
                                @case('completed')
                                    <span class="badge bg-success">Livrée</span>
                                    @break
                                @case('cancelled')
                                    <span class="badge bg-danger">Annulée</span>
                                    @break
                            @endswitch
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Nombre d'articles :</strong> {{ $order->orderItems->sum('quantity') }}</p>
                        <p><strong>Total :</strong> <span class="h5 text-success">{{ number_format($order->total, 2) }} €</span></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Détail des produits</h5>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Prix unitaire</th>
                        <th>Quantité</th>
                        <th>Sous-total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->orderItems as $item)
                        <tr>
                            <td>
                                {{ $item->product->name }}
                            </td>
                            <td>{{ number_format($item->unit_price, 2) }} €</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->unit_price * $item->quantity, 2) }} €</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th colspan="3" class="text-end">Total :</th>
                        <th>{{ number_format($order->total, 2) }} €</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
