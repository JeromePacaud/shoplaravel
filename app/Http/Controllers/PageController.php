<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() {
        $context = [
            'title' => 'Home',
            'name' => 'ShopLaravel',
            'nbProducts' => 50,
            'state' => 'open',
        ];
        return view('index', $context);
    }

    public function about() {
        return
            '
                ShopLaravel est une boutique en ligne conviviale, pensée pour rendre le shopping facile et agréable.
                Ici, tu trouveras un peu de tout : des objets utiles, des idées cadeaux, des articles tendance et des
                essentiels du quotidien.

                Notre objectif est simple : te proposer une sélection de produits variés, de qualité, à des prix
                accessibles, le tout dans une ambiance chaleureuse et sans prise de tête.

                N’hésite pas à parcourir les catégories, découvrir de nouveaux produits et profiter d’une expérience
                d’achat rapide et sécurisée.
            ';
    }
}
