<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(Request $request): View {
        $routeName  = $request->route()->getName();

        $context = [
            'name' => 'ShopLaravel',
            'nbProducts' => 50,
            'state' => 'open',
            'routeName' => $routeName
        ];

        return view('index', $context);
    }

    public function about(Request $request): View {
        $routeName  = $request->route()->getName();
        return view('about', compact('routeName'));
    }
}
