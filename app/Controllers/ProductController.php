<?php


namespace App\Controllers;

use Core\View;
use Core\Middlewares\AuthMiddleware;
use App\Models\Product;

class ProductController
{

    public function index()
    {
        View::render("product/index");
    }


    public function show()
    {

        AuthMiddleware::isAdminOrFail();

        $products = Product::all();

        View::render("product/overview", [
            'products' => $products
        ]);
    }
}
