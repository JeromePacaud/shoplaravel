@extends('layouts.app')

@section('title', 'Admin : liste des produits')

@section('content')
    <div class="container" style="min-height: 75vh;">
        <div class="d-flex justify-content-between align-items-center my-4">
            <h1>Produits</h1>
            <a href="#" class="btn btn-primary">Ajouter un utilisateur</a>
        </div>

        <div class="table-responsive mb-5">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Pénom</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Mot de passe</th>
                    <th class>Role</th>
                    <th class="text-end">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->password }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <div class="btn-group d-flex justify-content-end gap-2" role="group">
                                <a href="#" class="btn btn-sm btn-info">Voir</a>
                                <a href="#" class="btn btn-sm btn-warning">Éditer</a>

                                <form action="#" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Aucun utilisateur trouvé !</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
