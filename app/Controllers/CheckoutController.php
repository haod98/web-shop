<?php

namespace App\Controllers;

use App\Models\Address;
use Core\Middlewares\AuthMiddleware;
use App\Models\User;
use App\Services\CartService;
use Core\View;


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
        $cartContents = CartService::get();
        $address = Address::all();
        $user = User::getLoggedIn();

        View::render('checkout/summary', [
            'cartContents' => $cartContents,
            'user' => $user,
            'address' => $address
        ]);
    }
}
