<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function dashboard(Request $request): View {
        $routeName = $request->route()->getName();
        $context = [
            'routeName' => $routeName,
        ];

        return view('admin.dashboard', $context);
    }

    public function productsList(Request $request): View {
        $routeName = $request->route()->getName();
        $products = Product::all();
        $context = [
            'products' => $products,
            'routeName' => $routeName
        ];

        return view('admin.productsList', $context);
    }

    public function categoriesList(Request $request): View {
        $routeName = $request->route()->getName();
        $categories = Category::all();
        $context = [
            'categories' => $categories,
            'routeName' => $routeName
        ];
        return view('admin.categoriesList', $context);
    }

    public function usersList(Request $request): View {
        $routeName = $request->route()->getName();
        $users = User::all();
        $context = [
            'users' => $users,
            'routeName' => $routeName
        ];

        return view('admin.usersList', $context );
    }
}
