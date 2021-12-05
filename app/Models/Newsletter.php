<?php

namespace App\Models;

use Core\Database;
use Core\Models\AbstractModel;

class Newsletter extends AbstractModel
{


    public function __construct(

        public ?int  $id = null,
        public ?string $email = ''

    ) {
    }

    public function save(): bool
    {

        $database = new Database;
        $tablename = Newsletter::getTablenameFromClassname();

        $result = $database->query("INSERT INTO $tablename SET email = ?", [
            "s:email" => $this->email
        ]);
        return $result;
    }
}
