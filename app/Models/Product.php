<?php

namespace App\Models;

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
        return true;
    }
}
