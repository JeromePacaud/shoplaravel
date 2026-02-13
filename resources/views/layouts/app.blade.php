<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>@yield('title')</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary border-bottom border-body" data-bs-theme="light">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="{{ route('home') }}">ShopLaravel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @auth
                        @if(auth()->user()->isAdmin())
                            <li class="nav-item">
                                <a @class(['nav-link', 'active' => str_starts_with($routeName, 'admin')]) href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a @class(['nav-link', 'active' => $routeName === 'home']) href="{{ route('home') }}">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a @class(['nav-link', 'active' => $routeName === 'about']) href="{{ route('about') }}">À propos</a>
                            </li>
                            <li class="nav-item">
                                <a @class(['nav-link', 'active' => str_starts_with($routeName, 'products.')]) href="{{ route('products.index') }}">Catalogue</a>
                            </li>
                            <li class="nav-item">
                                <a @class(['nav-link', 'active' => str_starts_with($routeName, 'categories.')]) href="{{ route('categories.index') }}">Catégories</a>
                            </li>
                            <li class="nav-item">
                                <a @class(['nav-link', 'active' => str_starts_with($routeName, 'cart.')]) href="{{ route('cart.index') }}">
                                    <i class="bi bi-cart"></i> Panier
                                    @if(session()->has('cart') && $countItems > 0)
                                        <span class="badge bg-danger rounded-pill">
                                                {{ $countItems}}
                                            </span>
                                    @endif
                                </a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a @class(['nav-link', 'active' => $routeName === 'home']) href="{{ route('home') }}">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a @class(['nav-link', 'active' => $routeName === 'about']) href="{{ route('about') }}">À propos</a>
                        </li>
                        <li class="nav-item">
                            <a @class(['nav-link', 'active' => str_starts_with($routeName, 'products.')]) href="{{ route('products.index') }}">Catalogue</a>
                        </li>
                        <li class="nav-item">
                            <a @class(['nav-link', 'active' => str_starts_with($routeName, 'categories.')]) href="{{ route('categories.index') }}">Catégories</a>
                        </li>
                    @endauth
                </ul>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                    @auth
                        <li class="nav-item">
                            <span class="navbar-text text-light">{{ auth()->user()->first_name }}</span>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="nav-link btn btn-link text-light text-decoration-none" type="submit">Déconnexion</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <a @class(['nav-link', 'active' => str_starts_with($routeName, 'orders.')]) href="{{ route('orders.index') }}">Mes commandes</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a @class(['nav-link', 'active' => $routeName === 'login']) href="{{ route('login') }}">Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a @class(['nav-link', 'active' => $routeName === 'register']) href="{{ route('register') }}">Inscription</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>
<main class="bg-light">
    <div class="container d-flex flex-column">
        <div class="row justify-content-center">
            <div class="mt-5">
                @if(!in_array($routeName, ['create', 'edit']))
                    <x-session-alert />
                @endif

            </div>
        </div>
        @yield('content')
    </div>
</main>

<div class="container-fluid bg-primary border-bottom border-body" data-bs-theme="light">
    <footer class="py-3 mb-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link px2 text-light">Home</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('products.index') }}" class="nav-link px2 text-light">Catalogue</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('about') }}" class="nav-link px2 text-light">À propos</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('categories.index') }}" class="nav-link px2 text-light">Catégories</a>
            </li>
            @auth
                @if(!auth()->user()->isAdmin())
                    <li class="nav-item">
                        <a href="{{ route('cart.index') }}" class="nav-link px2 text-light">Panier</a>
                    </li>
                @endif
            @endauth
        </ul>
        <p class="text-center text-light">
            &copy; {{ date('Y') }} ShopLaravel - Tous droits réservés
        </p>
    </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
