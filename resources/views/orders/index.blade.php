@extends('layouts.app')

@section('content')
    <div class="container" style="min-height: 75vh;">
        <h1>Mes Commandes</h1>

        @if($orders->isEmpty())
            <p>Vous n'avez pas encore passé de commande.</p>
            <a href="{{ route('products.index') }}" class="btn btn-primary">Découvrir nos produits</a>
        @else
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>N° Commande</th>
                    <th>Date</th>
                    <th>Nombre d'articles</th>
                    <th>Total</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $order->orderItems->sum('quantity') }} article(s)</td>
                        <td>{{ number_format($order->total, 2) }} €</td>
                        <td>
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
                        </td>
                        <td>
                            <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-primary">
                                Voir détails
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
