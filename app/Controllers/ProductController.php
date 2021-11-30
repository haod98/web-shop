<?php


namespace App\Controllers;

use Core\View;
use Core\Middlewares\AuthMiddleware;
use App\Models\Product;
use Core\Helpers\Redirector;
use Core\Session;
use Core\Validator;

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

    public function add()
    {
        $validator = new Validator();
        $validator->letters($_POST['product'], required: true, max: 255, min: 2, label: "Product name");


        $errors = $validator->getErrors();
        var_dump($errors);
        exit;
        if (!empty($errors)) {

            Session::get('errors', $errors);
            Redirector::redirect('/products');
        } else {
            Session::get('success', ['Product added']);
            Redirector::redirect('/products');
        }
    }
}
