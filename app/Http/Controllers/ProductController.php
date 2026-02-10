<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View {
        $routeName  = $request->route()->getName();
        $context = [
            'title' => 'Products List',
            'products' => Product::with(['category', 'tags'])->paginate(10),
            'routeName' => $routeName
        ];

        return view('products.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View {
        $routeName  = $request->route()->getName();
        $categories = Category::select(['name', 'id'])->get();
        $tags = Tag::select(['name', 'id'])->get();

        $context = [
            'routeName' => $routeName,
            'categories' => $categories,
            'tags' => $tags,
            'tagsIds' => collect([])
        ];

        return view('products.create', $context);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormProductRequest $request): RedirectResponse {
        $validate = $request->validated();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $validate['image'] = $path;
        }

        $tags = $validate['tags'] ?? [];
        unset($validate['tags']);

        $product = Product::create($validate);

        if (!empty($tags)) {
            $product->tags()->sync($tags);
        }


        return redirect()
            ->route('products.index')
            ->with('success', 'Produit créer avec succès');
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
        $categories = Category::select(['name', 'id'])->get();
        $tags = Tag::select(['name', 'id'])->get();
        $tagsIds = $product->tags->pluck('id');
        $context = [
            'product' => $product,
            'routeName' => $routeName,
            'categories' => $categories,
            'tags' => $tags,
            'tagsIds' => $tagsIds
        ];

        return view('products.edit', $context);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormProductRequest $request, Product $product): RedirectResponse {
        $product->update($request->validated());
        $product->tags()->sync($request->validated('tags')) ?? [];

        return redirect()
            ->route('products.index')
            ->with('success', 'Produit mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Produit supprimé avec succès');
    }
}
