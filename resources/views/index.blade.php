@extends('layouts.app')

@section('title', 'Accueil - ShopLaravel')

@section('content')
    <h1 class="h1 text-center text-primary py-5">Bienvenue chez {{ $name }}l !</h1>
    <h3 class="py-2">
        Bienvenue dans ta boutique en ligne simple et chaleureuse, où chaque visite est une découverte. Que tu
        cherches un petit coup de cœur, un cadeau sympa ou un indispensable du quotidien, tu es au bon endroit.
    </h3>
    <h4 class="text-dark pt-3">Cherche parmis nos {{ $nbProducts }} produits !</h4>
    @if ($state === 'open')
        <p class="pt-3 text-success">Magasin ouvert !</p>
    @else
        <p>Magasin fermer.</p>
    @endif

@endsection
