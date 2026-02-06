<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View {
        $products = Product::all();
        $routeName  = $request->route()->getName();
        $context = [
            'title' => 'Products List',
            'products' => $products,
            'routeName' => $routeName
        ];
        return view('products.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $routeName  = $request->route()->getName();
        $context = [
            'routeName' => $routeName
        ];
        return view('products.create', $context);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse {
        $product = Product::create([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'active' => $request->boolean('active', true),
        ]);
        return redirect()
            ->route('products.index')
            ->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Product $product): View {
        $routeName = $request->route()->getName();
        $context = [
            'product' => $product,
            'routeName' => $routeName
        ];
        return view('products.product_detail', $context);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Product $product): View {
        $routeName  = $request->route()->getName();
        $context = [
            'product' => $product,
            'routeName' => $routeName
        ];
        return view('products.edit', $context);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $product->update([
            ...$validated,
            'slug' => ['required', 'string', Rule::unique('products')->ignore($product->id)],
            'active' => $request->boolean('active'),
        ]);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
