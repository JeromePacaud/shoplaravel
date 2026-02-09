@extends('layouts.app')

@section('title', isset($product) ? 'Modifier un Produit - ShopLaravel' : 'Ajouter un Produit - ShopLaravel')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 align-items-center">

            <form action="{{ isset($product) ? route('products.update', $product) : route('products.store') }}"
                  method="post"
                  enctype="multipart/form-data"
                  class="vstack gap-2 my-5">
                @csrf
                @if(isset($product))
                    @method('PATCH')
                @endif

                <div class="mb-3">
                    <label for="name" class="form-label">Nom du produit</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           id="name"
                           value="{{ old('name', $product->name ?? '') }}">
                    @error('name')
                        <p class="text-danger my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">
                        Slug
                        <small class="text-muted">(optionnel, généré automatiquement si vide)</small>
                    </label>
                    <input type="text"
                           name="slug"
                           class="form-control"
                           id="slug"
                           value="{{ old('slug', $product->slug ?? '') }}">

                    @error('slug')
                        <p class="text-danger my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description"
                              name="description"
                              class="form-control"
                              rows="10">{{ old('description', $product->description ?? '') }}</textarea>

                    @error('description')
                        <p class="text-danger my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image du produit</label>
                    <input type="file" name="image" id="image" accept="image/*" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Prix</label>
                    <input type="number"
                           name="price"
                           class="form-control"
                           id="price"
                           step="0.01"
                           value="{{ old('price', $product->price ?? '') }}">
                    @error('price')
                        <p class="text-danger my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number"
                           name="stock"
                           class="form-control"
                           id="stock"
                           step="1"
                           value="{{ old('stock', $product->stock ?? '') }}">

                    @error('stock')
                        <p class="text-danger my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Catégorie</label>
                    <select name="category_id"
                            id="category_id"
                            class="form-select">
                        <option value="">Sélectionner une catégorie</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                @selected(old('category_id', $product->category_id ?? '') == $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                        @error('category_id')
                            <p class="text-danger my-2">{{ $message }}</p>
                        @enderror
                    </select>
                </div>

                <div class="form-check">
                    <input class="form-check-input"
                           type="checkbox"
                           name="active"
                           value="1"
                           id="active"
                        @checked(old('active', $product->active ?? true))>
                    <label class="form-check-label" for="active">
                        Active
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">
                    {{ isset($product) ? 'Mettre à jour' : 'Créer' }}
                </button>
            </form>

        </div>
    </div>
@endsection
