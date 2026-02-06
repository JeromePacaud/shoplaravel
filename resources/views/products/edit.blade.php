@extends('layouts.app')

@section('title', 'Modifier un Produit - ShopLaravel')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 align-items-center">

            <form action="{{ route('products.update', $product)}}" method="post" class="vstack gap-2 my-5">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label for="name" class="form-label">Nom du produit</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $product->name) }}">
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control" id="slug" value="{{ old('slug', $product->slug) }}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" class="form-control" rows="10">{{ old('description', $product->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" id="price" step="1" value="{{ old('price', $product->price) }}">
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" name="stock" class="form-control" id="stock" step="1" {{ old('stock', $product->stock) }}>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="active" value="{{ old('active', $product->active) ? 'checked' : '' }}" id="active" checked>
                    <label class="form-check-label" for="active">
                        Active
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
@endsection

