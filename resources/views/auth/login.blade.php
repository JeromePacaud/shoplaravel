@extends('layouts.app')

@section('title', 'Connexion - Shop Laravel')

@section('content')
    <div class="row justify-content-center" style="min-height: 75vh;">
        <div class="col-md-8 align-items-center d-flex flex-column justify-content-center">

            <form action="{{ route('login') }}"
                  method="post"
                  class="vstack gap-2 my-5">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text"
                           name="email"
                           class="form-control"
                           id="email"
                           value="{{ old('email') }}">
                    @error('email')
                        <p class="text-danger my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password"
                           name="password"
                           class="form-control"
                           id="password">
                    @error('password')
                        <p class="text-danger my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        <input type="checkbox" name="remember" id="remember">
                        Se souvenir de moi
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">
                    Se connecter
                </button>
                <p class="text-center mt-2"><a class="text-decoration-none" href="{{ route('register') }}">Pas encore inscrit ? Créer un compte</a></p>
            </form>

        </div>
    </div>
@endsection
