<?php

namespace App\Models;

use Core\Database;
use Core\Models\AbstractModel;
use Core\Traits\SoftDelete;


class Product extends AbstractModel
{
    use SoftDelete;

    public function __construct(
        public ?int $id = null,
        public string $name = '',
        public string $description = '',
        public ?int $price = null,
        public ?string $gender = null,
        public string $images = '[]',
        public string $created_at = '',
        public string $updated_at = '',
        public ?string $deleted_at = null
    ) {
    }

    public function save(): bool
    {
        $database = new Database();

        $tablename = self::getTablenameFromClassname();
        if (!empty($this->id)) {

            $result = $database->query("UPDATE $tablename SET name = ?, price = ?, description = ?, gender = ?", [
                "s:name" => $this->name,
                "i:price" => $this->price,
                "s:description" => $this->description,
                "s:gender" => $this->gender
            ]);
        } else {
            $result = $database->query("INSERT INTO $tablename SET name = ?, price = ?, description = ?, gender = ?", [
                "s:name" => $this->name,
                "i:price" => $this->price,
                "s:description" => $this->description,
                "s:gender" => $this->gender
            ]);
        }

        $this->handleInsertResult($database);

        return $result;
    }
}
