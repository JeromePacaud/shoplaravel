<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
//    public function home() {
//        return
//            '
//                Bienvenue chez ShopLaravel !
//                Bienvenue dans ta boutique en ligne simple et chaleureuse, où chaque visite est une découverte. Que tu
//                cherches un petit coup de cœur, un cadeau sympa ou un indispensable du quotidien, tu es au bon endroit.
//            ';
//    }
    public function home() {
        return redirect()->route('products.show', ['id' => 1]);
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
