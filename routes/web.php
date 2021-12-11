<?php

/**
 * use-Statements erlauben es uns Klassen mit ihrem Namespace einmal oben zu definieren. Dadurch ersparen wir uns unten
 * immer den gesamten Namespace anzugeben.
 */

use App\Controllers\AddressController;
use App\Controllers\AuthController;
use App\Controllers\CartController;
use App\Controllers\HomeController;
use App\Controllers\ProductController;
use App\Controllers\ProfileController;
use App\Controllers\CheckoutController;
use App\Controllers\NewsletterController;
use Core\Middlewares\AuthMiddleware;
use App\Controllers\UserController;

/**
 * Die Dateien im /routes Ordner beinhalten ein Mapping von einer URL auf eine eindeutige Controller & Action
 * kombination. Als Konvention definieren wir, dass URL-Parameter mit {xyz} definiert werden müssen, damit das Routing
 * korrekt funktioniert.
 *
 * + /blog/{slug} --> BlogController->show($slug)
 * + /shop/{id} --> ProductController->show($id)
 */

return [
    /**
     * Index Route
     */
    '/' => [HomeController::class, 'index'], // HomeController::class => "App\Controllers\HomeController"

    /**
     * Auth Routes
     */
    '/login' => [AuthController::class, 'loginForm'],
    '/login/do' => [AuthController::class, 'loginDo'],
    '/logout' => [AuthController::class, 'logout'],
    '/sign-up/do' => [AuthController::class, 'signUpDo'],
    '/home/logout' => [AuthController::class, 'logout'],

    /**
     * Products Routes
     */

    '/women' => [ProductController::class, 'indexWomen'],
    '/men' => [ProductController::class, 'indexMen'],
    '/products' => [ProductController::class, 'show'],
    '/products/add' => [ProductController::class, 'add'],
    '/products/{id}/edit' => [ProductController::class, 'edit'],
    '/products/{id}/edit/update' => [ProductController::class, 'update'],
    '/products/{id}/delete/confirm' => [ProductController::class, 'deleteConfirm'],
    '/products/{id}/delete' => [ProductController::class, 'delete'],
    '/products/details/{id}' => [ProductController::class, 'productDetail'],

    // ...

    /**
     * Cart Routes
     */

    '/cart' => [CartController::class, 'index'],
    '/products/{id}/add-to-cart' => [CartController::class, 'add'],
    '/products/{id}/remove-from-cart' => [CartController::class, 'remove'],
    '/products/{id}/remove-all-from-cart' => [CartController::class, 'removeAll'],


    /**
     * Checkout Routes
     */
    '/checkout/summary' => [CheckoutController::class, 'summary'],
    '/checkout/finish' => [CheckoutController::class, 'finish'],
    '/checkout/success' => [CheckoutController::class, 'success'],


    /**
     * Address Routes
     */
    '/checkout/address' => [AddressController::class, 'checkout'],
    '/checkout/address/do' => [AddressController::class, 'checkoutAddress'],
    '/home/address/update' => [AddressController::class, 'updateProfileAddress'],


    '/newsletter' => [NewsletterController::class, 'register'],

    '/users/admin' => [UserController::class, 'index'],
    '/users/admin/{id}/edit' => [UserController::class, 'edit'],
    '/users/admin/{id}/update' => [UserController::class, 'update'],
    '/users/admin/{id}/delete' => [UserController::class, 'delete'],
    '/users/admin/{id}/delete/confirm' => [UserController::class, 'deleteConfirm'],

    /**
     * Home Routes
     */
    '/home' => [ProfileController::class, 'home'],
    '/home/update' => [ProfileController::class, 'update'],
];
