<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View {
        $categories = Category::all();
        $routeName = $request->route()->getName();
        $context = [
            'categories' => $categories,
            'routeName' => $routeName
        ];

        return view('category.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Category $category): View {
        $RouteName = $request->route()->getName();
        $products = $category->products()->paginate(10);
        $context = [
            'category' => $category,
            'products' => $products,
            'routeName' => $RouteName
        ];

        return view('category.show', $context);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
