<?php

namespace App\Controllers;

use App\Models\Order;
use Core\Models\DateTime;

class OrderController
{

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
