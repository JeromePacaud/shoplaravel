<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class CartController extends Controller
{
    // Afficher le panier
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function index(Request $request): View {
        $routeName = $request->route()->getName();

        // recupérer le panier en sessions ou une collection vide
        $cart = collect(session()->get('cart', []));

        // Recupérer l'id des produits dans le panier
        $productIds = $cart->keys();
        // Récupérer les produits depuis la BDD
        $products = Product::whereIn('id', $productIds)->get()->keyBy('id');

        $total = $cart->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        $context = [
            'cart' => $cart,
            'products' => $products,
            'total' => $total,
            'routeName' => $routeName,
        ];

        return view('cart.index', $context);
    }

    // Ajouter un produit au panier

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function add(Product $product): RedirectResponse {
        // Récupérer le panier
        $cart = collect(session()->get('cart', []));

        // Si la le panier contient l'article
        if ($cart->has($product->id)) {
            // On le recupère
            $item = $cart->get($product->id);
            // on augmente la quantité de 1
            $item['quantity']++;
            // On enregistre la nouvelle quantité
            $cart->put($product->id, $item);
        } else {
            $cart->put($product->id, [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
            ]);
        }
        // On sauvegarde le panier
        session()->put('cart', $cart->toArray());

        return redirect()->back()->with('success', 'Produit ajouté au panier !');
    }

    // Modifier la quantité d'un produit

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function update(Product $product, Request $request): RedirectResponse {
        $request->validate(
            ['quantity' => ['required', 'numeric', 'min:1', 'max:10']],
            ['quantity.numeric' => 'Le chant doit être un nombre']
        );
        $cart = collect(session()->get('cart', []));

        if ($cart->has($product->id)) {
            $item = $cart->get($product->id);
            $item['quantity'] = $request->quantity;
            $cart->put($product->id, $item);
            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Quantité mise à jour !');
        }

        return redirect()->back()->with('error', 'Produit introuvable dans le panier.');
    }

    // Retirer un produit du panier
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function remove(Product $product): RedirectResponse {
        $cart = collect(session()->get('cart', []));
        if ($cart->has($product->id)) {
            $cart->forget([$product->id]);
            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Produit retiré du panier !');
        }

        return redirect()->back()->with('error', 'Produit introuvable dans le panier.');
    }

    // Vider le panier
    public function clear(): RedirectResponse {
        session()->forget('cart');

        return redirect()->route('cart.index')->with('success', 'Panier vidé !');
    }
}
