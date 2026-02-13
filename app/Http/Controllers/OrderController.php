<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):View {
        $routeName = $request->route()->getName();
        $orders = auth()->user()
            ->orders()
            ->with('orderItems.product')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('orders.index', compact('orders', 'routeName'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse {
        // Récuperer le panier depuis la session
        $cart = collect(session()->get('cart'));

        // Vérifier que le panier ne soit pas vide
        if ($cart->isEmpty()) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Le panier est vide');
        }

        try {
            // Récuperer les produits et calculer le total
            DB::transaction(function () use ($cart) {
                $productsIds = $cart->keys();
                $products = Product::whereIn('id', $productsIds)->get()->keyBy('id');

                $total = 0;
                $orderItems = [];

                foreach ($cart as $id => $details) {
                    $product = $products->get($id);

                    // Vérifier que la quantité dans la commandes n'excede  pas la quantité en stock
                    if (!$product | $product->stock < $details['quantity']) {
                        return redirect()
                            ->route('cart.index')
                            ->with('error', 'Quantité en stock insuffisante');
                    }

                    // Calculer le total
                    $total += $details['price'] * $details['quantity'];

                    // Préparer les données pour les orderItems
                    $orderItems[] = [
                        'product_id' => $id,
                        'quantity' => $details['quantity'],
                        'unit_price' => $details['price'],
                        'product' => $product,
                    ];
                }

                // Créer la commande
                $order = Order::create([
                    'user_id' => auth()->id(),
                    'total' => $total,
                    'status' => 'pending',
                ]);

                // Créer les lignes de commandes
                foreach ($orderItems as $item) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $item['product_id'],
                        'quantity' => $item['quantity'],
                        'unit_price' => $item['unit_price'],
                    ]);

                    $item['product']->decrement('stock', $item['quantity']);
                }
            });

            session()->forget('cart');

            return redirect()
                ->route('orders.show')
                ->with('success', 'Votre commande a bien été passée !');

        } catch (\Exception $e) {
            return redirect()
                ->route('cart.index')
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order, Request $request): View {
        $routeName = $request->route()->getName();

        if ($order->user_id !== auth()->id()) {
            abort(403, 'Accès non autorisé !');
        }

        // Charger la relation 'user' au singulier, pas 'users'
        $order->load(['orderItems.product', 'user']);

        return view('orders.show', compact('order', 'routeName'));
    }
}
