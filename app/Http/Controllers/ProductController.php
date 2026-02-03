<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = [
            [
                'id' => 1,
                'name' => 'T-shirt "Laravel"',
                'price' => 19.99
            ],
            [
                'id' => 2,
                'name' => 'Mug "PHP Rocks"',
                'price' => 12.50
            ],
            [
                'id' => 3,
                'name' => 'Casquette "Code Life"',
                'price' => 22.75
            ],
            [
                'id' => 4,
                'name' => 'Sweat "Dev Mode"',
                'price' => 39.99
            ],
            [
                'id' => 5,
                'name' => 'Stickers "Git Master"',
                'price' => 5.00
            ]
        ];
        $context = [
            'title' => 'Products List',
            'products' => $products,
        ];
        return view('products.index', $context);
    }
    public function show($id) {
        return 'Affichage du produit : ' . $id;
    }
}
