@extends('layouts.app')

@section('title', 'Liste des catégories - Shop Laravel')

@section('content')
    <div class="row align-items-center mb-5" style="height: 70vh;">
        <div class="col-lg-8 mx-auto">
            <h1 class="mb-4">Catégories</h1>

            <ul class="list-group">
                @forelse($categories as $category)
                    <li class="list-group-item">
                        <a class="nav-link" href="{{ route('categories.show', $category) }}">
                            {{ $category->name }}
                        </a>
                    </li>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                            <p class="mb-0">Aucun catégories trouvée.</p>
                        </div>
                    </div>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
