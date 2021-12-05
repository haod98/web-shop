<?php

namespace App\Controllers;

use App\Models\Newsletter;
use Core\Helpers\Redirector;
use Core\Session;
use Core\Validator;

class NewsletterController
{
    public function register()
    {

        $validator = new Validator;

        $validator->email($_POST['email'], required: true, label: "E-Mail");

        $errors = $validator->getErrors();

        if (!empty($errors)) {
            Session::set('errors', $errors);
            Redirector::redirect('/');
        }

        $newsletter = new Newsletter();
        $newsletter->fill($_POST);

        if ($newsletter->save()) {
            Session::set('success', ['Thank you for signing up our newsletter']);
            Redirector::redirect('/');
        } else {
            Session::set('errors', ['Something went wrong']);
            Redirector::redirect('/');
        }
    }
}
