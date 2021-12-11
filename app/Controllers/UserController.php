<?php

namespace App\Controllers;

use App\Models\User;
use Core\Middlewares\AuthMiddleware;
use Core\View;
use Core\Validator;
use Core\Session;
use Core\Helpers\Redirector;

class UserController
{
    public function index()
    {
        AuthMiddleware::isAdminOrFail();
        $users = User::all();
        View::render('users/index', [
            'users' => $users
        ]);
    }

    public function edit($id)
    {
        AuthMiddleware::isAdminOrFail();
        $user = User::find($id);
        View::render('users/edit', [
            'user' => $user
        ]);
    }

    public function update($id)
    {
        AuthMiddleware::isAdminOrFail();
        $validationErrors = $this->validateForm();

        if (!empty($validationErrors)) {
            Session::set('errors', $validationErrors);
            Redirector::redirect("/users/admin/${id}/edit");
        }

        $user = User::findOrFail($id);
        $user->fill($_POST);

        if (!$user->save()) {
            Session::set('errors', ['There was an unexpected error']);
            Redirector::redirect("/users/admin/${id}/edit");
        }

        Session::set('success', ['User successfully updated']);
        Redirector::redirect('/users/admin');
    }

    public function delete($id)
    {
        AuthMiddleware::isAdminOrFail();
        $user = User::find($id);
        View::render('users/delete', [
            'user' => $user
        ]);
    }
    public function deleteConfirm($id)
    {
        AuthMiddleware::isAdminOrFail();

        $user = User::findOrFail($id);
        $user->delete();

        Session::set('success', ['User successfully deleted']);
        Redirector::redirect("/users/admin");
    }

    public function validateForm()
    {
        $validator = new Validator();
        $validator->letters($_POST['first_name'], label: 'First Name', required: true, min: 2);
        $validator->letters($_POST['last_name'], label: 'Last name', required: true, min: 2);
        $validator->email($_POST['email'], label: 'E-mail', required: true,);

        return $validator->getErrors();
    }
}
