<?php

namespace App\Controllers;

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
        View::render('index', ['foo' => 'bar']);
    }
}
