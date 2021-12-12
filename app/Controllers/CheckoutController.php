<?php

namespace App\Controllers;

use App\Models\Address;
use Core\Middlewares\AuthMiddleware;
use App\Models\User;
use App\Services\CartService;
use Core\View;
use App\Models\Order;
use Core\Helpers\Redirector;
use Core\Session;

class CheckoutController
{
    /**
     * @throws \Exception
     */
    public function __construct()
    {
        AuthMiddleware::isLoggedInOrFail();
    }

    public function summary()
    {
        $products = CartService::get();
        $user = User::getLoggedIn();
        $address = Address::findByUserId($user->id);

        View::render('checkout/summary', [
            'products' => $products,
            'user' => $user,
            'address' => $address
        ]);
    }

    public function finish()
    {
        $products = CartService::get();
        $user = User::getLoggedIn();
        $address = Address::findByUserId($user->id);

        $order = new Order();
        $order->user_id = $user->id;
        $order->address_id = $address->id;
        $order->products = $products;

        if (!$order->save()) {
            Session::set('errors', ['There was an unexpected error']);
            Redirector::redirect('/checkout/summary');
        }
        CartService::destroy();
        Session::set('success', ["Thank you for your order #{$order->id}"]);
        Redirector::redirect('/checkout/success');
    }

    public function success()
    {
        $order = new OrderController();
        $order->index();
    }
}
