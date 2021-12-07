<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Room;
use Core\View;

/**
 * Beispiel Controller
 */
class HomeController
{

    /**
     * Beispielmethode
     */
    public function index()
    {
        $products = Product::limit("gender", "ASC", 4);
        View::render('index', [
            'products' => $products
        ]);
    }
}
