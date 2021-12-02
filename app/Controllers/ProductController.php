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

    private function validateForm()
    {
        $validator = new Validator();
        $validator->letters($_POST['name'], required: true, max: 255, min: 2, label: "Product name");
        $validator->int((int)[$_POST['price']]);

        $errors = $validator->getErrors();


        return $errors;
    }

    public function add()
    {
        AuthMiddleware::isAdminOrFail();
        $errors = self::validateForm();

        if (!empty($errors)) {
            Session::set('errors', $errors);
            Redirector::redirect('/products');
        }

        $product = new Product();
        $product->fill($_POST);

        if (!$product->save()) {
            Session::set('errors', ['There was an unexpected error']);
            Redirector::redirect('/products');
        }

        Session::set('success', ['Product successful added']);
        Redirector::redirect('/products');


        // Session::set('success', ['Product added']);
        // Redirector::redirect('/products');
    }
}
