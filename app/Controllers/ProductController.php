<?php


namespace App\Controllers;

use Core\View;
use Core\Middlewares\AuthMiddleware;
use App\Models\Product;
use Core\Helpers\Redirector;
use Core\Session;
use Core\Validator;
use Core\Models\File;

class ProductController
{

    public function indexWomen()
    {
        $products = Product::all();
        View::render("product/indexWomen", [
            'products' => $products
        ]);
    }

    public function indexMen()
    {
        $products = Product::all();
        View::render("product/indexMen", [
            'products' => $products
        ]);
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

        $validationErrors = $validator->getErrors();


        return $validationErrors;
    }

    public function add()
    {

        AuthMiddleware::isAdminOrFail();
        $validationErrors = $this->validateForm();

        if (!empty($validationErrors)) {
            Session::set('errors', $validationErrors);
            Redirector::redirect('/products');
        }

        $product = new Product();
        $product->fill($_POST);

        $product = $this->handleUploadedFiles($product);

        if (!$product->save()) {
            Session::set('errors', ['There was an unexpected error']);
            Redirector::redirect('/products');
        }
        Session::set('success', ['Product successfully added']);
        Redirector::redirect('/products');
    }


    /**
     * update
     *
     * @param  int $id
     * @return void
     */
    public function update(int $id)
    {
        AuthMiddleware::isAdminOrFail();
        $validationErrors = $this->validateForm();

        if (!empty($validationErrors)) {
            Session::set('errors', $validationErrors);
            Redirector::redirect("/products/${id}/edit");
        }


        $product = Product::findOrFail($id);

        $product->fill($_POST);

        $product = $this->handleUploadedFiles($product);

        $product = $this->handleDeleteFiles($product);

        if (!$product->save()) {
            Session::set('errors', ['There was an unexpected error']);
            Redirector::redirect('/products');
        }

        Session::set('success', ['Product successfully updated']);
        Redirector::redirect('/products');
    }

    public function edit($id)
    {
        AuthMiddleware::isAdminOrFail();
        $product = Product::findOrFail($id);
        View::render('product/edit', [
            'product' => $product
        ]);
    }


    /**
     * handleUploadedFiles
     *
     * @param  mixed $product
     * @return Product
     */
    public function handleUploadedFiles(Product $product): ?Product
    {
        $files = File::createFromUploadedFiles('images');

        foreach ($files as $file) {

            $storagePath = $file->putToUploadsFolder();

            $product->addImages([$storagePath]);
        }
        return $product;
    }

    public function handleDeleteFiles(Product $product): ?Product
    {

        if (isset($_POST['delete-images'])) {
            foreach ($_POST['delete-images'] as $deleteImage) {
                $product->removeImages([$deleteImage]);

                File::delete($deleteImage);
            }
        }

        return $product;
    }


    public function delete($id)
    {
        AuthMiddleware::isAdminOrFail();
        $product = Product::findOrFail($id);
        View::render('product/delete', [
            'product' => $product
        ]);
    }

    public function deleteConfirm($id)
    {
        AuthMiddleware::isAdminOrFail();

        $product = Product::findOrFail($id);
        $product->delete();

        Session::set('success', ['Product successfully deleted']);
        Redirector::redirect("/products");
    }


    public function productDetail($id)
    {
        $product = Product::findOrFail($id);

        View::render('product/detail', [
            'product' => $product
        ]);
    }
}
