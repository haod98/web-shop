<?php

namespace App\Services;

use App\Models\Product;
use Core\Session;

class CartService
{
    const SESSION_KEY = 'equipment-cart';

    /**
     * Product add to cart
     *
     * @param Product $product
     *
     * @return array
     */
    public static function add(Product $product): array
    {
        self::init();

        if (self::has($product)) {
            $_SESSION[self::SESSION_KEY][$product->id]++;
        } else {
            $_SESSION[self::SESSION_KEY][$product->id] = 1;
        }

        return self::get();
    }

    /**
     * Remove units from cart
     *
     * @param Product $product
     *
     * @return array
     */
    public static function remove(Product $product): array
    {
        self::init();

        if (self::has($product)) {
            $_SESSION[self::SESSION_KEY][$product->id]--;

            if ($_SESSION[self::SESSION_KEY][$product->id] <= 0) {
                self::removeAll($product);
            }
        }

        return self::get();
    }

    /**
     * Delete everything from cart
     *      
     * @param Product $product
     *
     * @return array
     */
    public static function removeAll(Product $product): array
    {
        self::init();

        if (self::has($product)) {
            unset($_SESSION[self::SESSION_KEY][$product->id]);
        }

        return self::get();
    }

    /**
     * Get Carts
     *
     * @return array
     * @throws \Exception
     */
    public static function get(): array
    {
        self::init();

        $products = [];
        foreach ($_SESSION[self::SESSION_KEY] as $productId => $number) {
            $product = Product::findOrFail($productId);
            $product->count = $number;
            $products[] = $product;
        }

        return $products;
    }

    /**
     * Units in cart
     *
     * @return int
     */
    public static function getCount(): int
    {
        self::init();

        $count = 0;

        foreach ($_SESSION[self::SESSION_KEY] as $productId => $number) {
            $count = $count + $number;
        }

        return $count;
    }

    private static function init()
    {
        if (!isset($_SESSION[self::SESSION_KEY])) {
            $_SESSION[self::SESSION_KEY] = [];
        }
    }

    /**
     * Check if a product is in cart
     *
     * @param Product $product
     *
     * @return bool
     */
    private static function has(Product $product): bool
    {
        return isset($_SESSION[self::SESSION_KEY][$product->id]);
    }

    /**
     * Delete cart from session
     */
    public static function destroy()
    {
        if (isset($_SESSION[self::SESSION_KEY])) {
            unset($_SESSION[self::SESSION_KEY]);
        }
    }

    public static function getTotalCountInCart()
    {
        $allProductsInCart = self::get();
        $total = 0;
        foreach ($allProductsInCart as $key => $count) {
            $total += $allProductsInCart[$key]->count;
        }
        return $total;
    }

    /**
     * Get Total price from Cart
     *
     * @param  array $products
     * @return int
     */
    public static function getTotalPrice(array $products): int
    {
        $products = self::get();
        $currentPriceTotal = 0;
        $total = 0;
        foreach ($products as $key => $id) {
            $quantity = $_SESSION[self::SESSION_KEY][$products[$key]->id];
            $currentProductPrice = $products[$key]->price;
            $currentPriceTotal = $currentProductPrice * $quantity;
            $total += $currentPriceTotal;
            $currentPriceTotal = 0;
        }
        return $total;
    }
}
