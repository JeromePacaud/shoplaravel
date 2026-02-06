<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request) {
        $products = Product::all();
        $routeName  = $request->route()->getName();
        $context = [
            'title' => 'Products List',
            'products' => $products,
            'routeName' => $routeName
        ];
        return view('products.index', $context);
    }
    public function show(Request $request, Product $product): View {
        $routeName = $request->route()->getName();
        $context = [
            'product' => $product,
            'routeName' => $routeName
        ];
        return view('products.product_detail', $context);
    }
}
