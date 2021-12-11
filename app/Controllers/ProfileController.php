<?php

namespace App\Controllers;

use App\Models\Address;
use Core\Middlewares\AuthMiddleware;
use App\Models\User;
use Core\View;
use Core\Validator;
use Core\Session;
use Core\Helpers\Redirector;


class ProfileController
{

    public function __construct()
    {
        AuthMiddleware::isLoggedInOrFail();
    }


    public function home()
    {
        $user = User::getLoggedIn();
        $address = Address::findByUserId($user->id);
        $ordersAll = $user->orders();
        $singleOrders = OrderController::getSingleOrders($ordersAll);


        View::render('profile/index', [
            'user' => $user,
            'address' => $address,
            'ordersAll' => $ordersAll,
            'singleOrders' => $singleOrders

        ]);
    }

    public function update()
    {
        $user = User::getLoggedIn();

        $validator = new Validator();
        $validator->email($_POST['email'], 'E-Mail', required: true);
        $validator->unique($_POST['email'], 'E-Mail', 'users', 'email', ignoreThisId: $user->id);
        $validator->password($_POST['password'], 'Password', min: 8, required: false);
        $validator->compare([
            $_POST['password'],
            'password'
        ], [
            $_POST['password_repeat'],
            'Repeat password'
        ]);

        $errors = $validator->getErrors();

        if (!empty($errors)) {
            Session::set('errors', $errors);
            Redirector::redirect('/profile');
        }

        $user->email = trim($_POST['email']);
        if (!empty($_POST['password'])) {
            $user->setPassword($_POST['password']);
        }

        if ($user->save()) {
            Session::set('success', ['Profile successfully updated']);
        } else {
            $errors[] = 'Something went wrong';
            Session::set('errors', $errors);
        }

        Redirector::redirect('/home');
    }
}
