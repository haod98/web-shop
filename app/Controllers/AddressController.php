<?php

namespace App\Controllers;

use Core\View;
use App\Models\User;
use Core\Validator;
use Core\Session;
use Core\Helpers\Redirector;
use App\Models\Address;

class AddressController
{

    public function checkout()
    {

        $user = User::getLoggedIn();
        $address = Address::all();

        View::render("address/index", [
            'user' => $user,
            'address' => $address
        ]);
    }

    public function addressUpdate()
    {

        $errors = $this->validateForm();

        if (!empty($errors)) {
            Session::set('errors', $errors);
            Redirector::redirect('/login');
        }

        $address = new Address();
        if (empty(User::getLoggedIn()->id)) {
            $address->fill([
                'user_id' => User::getLoggedIn()->id,
                'address' => $_POST['address'],
                'city' => $_POST['city'],
                'postal_code' => $_POST['postal'],
            ]);
        } else {

            $address->fill([
                'id' => Address::all()[0]->id,
                'user_id' => User::getLoggedIn()->id,
                'address' => $_POST['address'],
                'city' => $_POST['city'],
                'postal_code' => $_POST['postal'],
            ]);
        }

        if ($address->save()) {
            Session::set('success', ['Your address is saved']);
            Redirector::redirect('/checkout/summary');
        } else {
            Session::set('errors', ['There was an unexpected error']);
            Redirector::redirect('/checkout/address');
        }
    }

    public function validateForm()
    {

        $validator = new Validator();
        if (!empty($_POST)) {
            $validator->letters($_POST['address'], label: 'Address', required: true);
            $validator->alphanumeric($_POST['postal'], label: 'Postal Code', required: true);
            $validator->letters($_POST['city'], label: 'City', required: true,);
        }

        return $validator->getErrors();
    }
}
