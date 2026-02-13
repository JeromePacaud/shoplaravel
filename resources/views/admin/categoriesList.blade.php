@extends('layouts.app')

@section('title', 'Admin : liste des produits')

@section('content')
    <div class="container" style="min-height: 75vh;">
        <div class="d-flex justify-content-between align-items-center my-4">
            <h1>Produits</h1>
            <a href="#" class="btn btn-primary">Ajouter une catégorie</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Produits associé</th>
                    <th class="text-end">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->description}}</td>
                        <td>
                            <a class="text-decoration-none" href="{{ route('categories.show', $category) }}">Voir les produits</a>
                        </td>
                        <td>
                            <div class="btn-group d-flex justify-content-end gap-2" role="group">
                                <a href="#" class="btn btn-sm btn-info">Voir</a>
                                <a href="#" class="btn btn-sm btn-warning">Éditer</a>

                                <form action="#" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Aucune catégorie trouvé</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
