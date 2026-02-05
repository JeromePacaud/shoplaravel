<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    private function getProducts(): array {
        return [
            [
                'id' => 1,
                'name' => 'T-shirt "Laravel"',
                'description' => 'T-shirt "Laravel"',
                'price' => 19.99
            ],
            [
                'id' => 2,
                'name' => 'Mug "PHP Rocks"',
                'description' => 'Mug "PHP Rocks"',
                'price' => 12.50
            ],
            [
                'id' => 3,
                'name' => 'Casquette "Code Life"',
                'description' => 'Casquette "Code Life"',
                'price' => 22.75
            ],
            [
                'id' => 4,
                'name' => 'Sweat "Dev Mode"',
                'description' => 'Sweat "Dev Mode"',
                'price' => 39.99
            ],
            [
                'id' => 5,
                'name' => 'Stickers "Git Master"',
                'description' => 'Stickers "Git Master"',
                'price' => 5.00
            ]
        ];
    }
    public function index(Request $request) {
        $routeName  = $request->route()->getName();
        $context = [
            'title' => 'Products List',
            'products' => $this->getProducts(),
            'routeName' => $routeName
        ];
        return view('products.index', $context);
    }
    public function show(Request $request, $id): View {
        $product =  $this->getProducts()[$id];
        $routeName = $request->route()->getName();
        $context = [
            'product' => $product,
            'routeName' => $routeName
        ];
        return view('products.product_detail', $context);
    }
}
