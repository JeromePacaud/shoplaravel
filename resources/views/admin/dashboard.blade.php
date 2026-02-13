@extends('layouts.app')

@section('title', 'Admin Dashboard - Shop Laravel')

@section('content')
    <div class="row" style="min-height: 75vh;">
        <h1 class="h1">DashBoard</h1>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.productsList') }}">
                    <i class="bi bi-box-seam"></i> Voir les produits
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.categoriesList') }}">
                    <i class="bi bi-tags"></i> Voir les catégories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.usersList') }}">
                    <i class="bi bi-people"></i> Voir les utilisateurs
                </a>
            </li>
        </ul>
    </div>
@endsection
