<?php

/**
 * use-Statements erlauben es uns Klassen mit ihrem Namespace einmal oben zu definieren. Dadurch ersparen wir uns unten
 * immer den gesamten Namespace anzugeben.
 */

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\ProductController;

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


    /**
     * Products Routes
     */

    '/women' => [ProductController::class, 'index'],
    '/men' => [ProductController::class, 'index'],
    '/products' => [ProductController::class, 'show'],
    '/products/add' => [ProductController::class, 'add'],
    '/products/{id}/edit' => [ProductController::class, 'edit'],
    '/products/{id}/edit/do' => [ProductController::class, 'update'],

    // ...
];
