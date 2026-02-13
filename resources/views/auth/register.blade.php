@extends('layouts.app')

@section('title', 'Inscription - Shop Laravel')

@section('content')
    <div class="row justify-content-center" style="min-height: 75vh;">
        <div class="col-md-8 align-items-center d-flex flex-column justify-content-center">

            <form action="{{ route('register') }}"
                  method="post"
                  class="vstack gap-2 my-5">
                @csrf

                <div class="mb-3">
                    <label for="first_name" class="form-label">Prénom</label>
                    <input type="text"
                           name="first_name"
                           class="form-control"
                           id="first_name"
                           value="{{ old('first_name') }}">
                    @error('first_name')
                    <p class="text-danger my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="last_name" class="form-label">Nom</label>
                    <input type="text"
                           name="last_name"
                           class="form-control"
                           id="last_name"
                           value="{{ old('last_name') }}">
                    @error('last_name')
                    <p class="text-danger my-2">{{ $message }}</p>
                    @enderror
                </div>

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
                    <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                    <input type="password"
                           name="password_confirmation"
                           class="form-control"
                           id="password_confirmation">
                    @error('password_confirmation')
                    <p class="text-danger my-2">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    Se connecter
                </button>
                <p class="text-center mt-2 "><a class="text-decoration-none" href="{{ route('login') }}">Déja inscrit ? Connectez vous</a></p>
            </form>

        </div>
    </div>
@endsection
