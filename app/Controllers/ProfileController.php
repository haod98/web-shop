<?php

namespace App\Controllers;

use Core\Middlewares\AuthMiddleware;
use App\Models\User;
use Core\View;

class ProfileController
{

    public function __construct()
    {
        AuthMiddleware::isLoggedInOrFail();
    }


    public function home()
    {
        $user = User::getLoggedIn();

        View::render('profile/index', [
            'user' => $user
        ]);
    }
}
