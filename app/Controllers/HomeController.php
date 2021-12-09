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
        $productsWomen = Product::getNewestProducts('women');
        $productsMen = Product::getNewestProducts('men');
        View::render('index', [
            'productsWomen' => $productsWomen,
            'productsMen' => $productsMen
        ]);
    }
}
