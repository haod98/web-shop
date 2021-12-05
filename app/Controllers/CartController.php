<?php

namespace App\Controllers;

use App\Services\CartService;
use Core\View;
use App\Models\Product;
use Core\Helpers\Redirector;
use App\Models\User;
use Core\Middlewares\AuthMiddleware;

class CartController
{
    public function index()
    {
        $productsInCart = CartService::get();

        View::render('cart/index', [
            'products' => $productsInCart
        ]);
    }
    /**
     * Add to cart (+1)
     *
     * @param int $id
     *
     * @throws \Exception
     */
    public function add(int $id)
    {
        $product = Product::findOrFail($id);

        CartService::add($product);

        Redirector::redirect('/cart');
    }

    /**
     * Remove a unit from cart (-1)
     *
     * @param int $id
     *
     * @throws \Exception
     */
    public function remove(int $id)
    {
        $product = Product::findOrFail($id);

        CartService::remove($product);

        Redirector::redirect('/cart');
    }

    /**
     * Remove from cart (-all)
     *
     * @param int $id
     *
     * @throws \Exception
     */
    public function removeAll(int $id)
    {
        $product = Product::findOrFail($id);

        CartService::removeAll($product);

        Redirector::redirect('/cart');
    }
}
