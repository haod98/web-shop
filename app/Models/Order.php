<?php

namespace App\Models;

use Core\Database;
use Core\Models\AbstractModel;

class Order extends AbstractModel
{

    public function __construct(

        public ?int $id = null,
        public ?int $user_id = null,
        public ?int $address_id = null,
        public string|array $products = '',
        public ?string $created_at = '',
        public ?string $updated_at = '',
        public ?string $deleted_at = ''

    ) {
    }

    public function save(): bool
    {
        $database = new Database();
        $tablename = self::getTablenameFromClassname();

        $products = $this->products;
        if (is_array($this->products)) {
            $products = json_encode($this->products);
        }


        if (!empty($this->id)) {
            $result = $database->query(
                "UPDATE $tablename  SET user_id = ?, address_id = ?, products = ? WHERE id = ?",
                [
                    'i:user_id' => $this->user_id,
                    'i:address_id' => $this->address_id,
                    's:products' => $products,
                ]
            );
            return $result;
        }

        $result = $database->query(
            "INSERT INTO $tablename SET user_id = ?, address_id = ?, products = ?",
            [
                'i:user_id' => $this->user_id,
                'i:address_id' => $this->address_id,
                's:products' => $products,
            ]
        );

        $this->handleInsertResult($database);
        return $result;
    }

    public function getProducts()
    {
        if (is_string($this->products)) {
            return json_decode($this->products);
        }
        return $this->products;
    }

    public static function findOrderByUserId($user_id)
    {
        $database = new Database();
        $tablename = self::getTablenameFromClassname();

        $result = $database->query("SELECT * FROM $tablename WHERE user_id = $user_id");
        return self::handleResult($result);
    }
}
