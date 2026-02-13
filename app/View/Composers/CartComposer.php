<?php

namespace App\View\Composers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CartComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void {
        $cart = collect(session()->get('cart', []));
        $view->with('countItems', $cart->sum('quantity'));
    }
}
