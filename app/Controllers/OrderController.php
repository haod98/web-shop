<?php

namespace App\Controllers;

use App\Models\Order;
use Core\View;
use App\Models\User;
use Core\Middlewares\AuthMiddleware;
use Core\Models\DateTime;

class OrderController
{

    public function index()
    {
        AuthMiddleware::isLoggedInOrFail();
        $user = User::getLoggedIn();
        $ordersAll = $user->orders();
        $singleOrders = OrderController::getSingleOrders($ordersAll);

        View::render('order/index', [
            'user' => $user,
            'ordersAll' => $ordersAll,
            'singleOrders' => $singleOrders
        ]);
    }

    public static function getSingleOrders($orders)
    {
        $productsArr = [];
        foreach ($orders as $order) {
            $productsArr[] = json_decode($order->products);
        }
        return $productsArr;
    }

    public static function getTotalPriceFromOrder(array $orders)
    {
        $total = 0;
        foreach ($orders as $order) {
            $total += $order->price;
        }
        return $total;
    }

    public static function getDate($date)
    {
        $newDate = date("d.m.Y", strtotime($date));
        return $newDate;
    }
}
