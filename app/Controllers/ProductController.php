<?php


namespace App\Controllers;

use \Core\View;

class ProductController
{

    public function index()
    {
        View::render("product/index");
    }
}
