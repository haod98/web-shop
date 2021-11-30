<?php

namespace App\Models;

use Core\Database;
use Core\Models\AbstractUser;
use Core\Traits\SoftDelete;

/**
 * Class User
 *
 * @package app\Models
 */
class User extends AbstractUser
{

    /**
     * Hier laden wir den SoftDelete Trait, der die delete()- und find()-Methoden überschreibt, damit Objekte nicht
     * komplett gelöscht werden, sondern nur auf deleted gesetzt werden und damit die find()-Methode auch nur Objekte
     * findet, die nicht gelöscht sind.
     */
    use SoftDelete;

    public function __construct(
        /**
         * Wir verwenden hier Constructor Property Promotion, damit wir die ganzen Klassen Eigenschaften nicht 3 mal
         * angeben müssen.
         *
         * Im Prinzip definieren wir alle Spalten aus der Tabelle mit dem richtigen Datentyp.
         */
        public ?int $id = null,
        public string $email = '',
        public string $first_name = '',
        public string $last_name = '',
        protected string $password = '',
        public string $created_at = '',
        public string $updated_at = '',
        public ?string $deleted_at = '',
        public bool $is_admin = false,
        public bool $want_newsletter = false,
    ) {
    }

    /**
     * @return bool
     * @todo: implement
     */
    public function save(): bool
    {
        $database = new Database();

        $tablename = self::getTablenameFromClassname();

        if (!empty($this->id)) {
            $result = $database->query("UPDATE $tablename SET email = ?, first_name = ?, last_name = ?,  password = ?, is_admin = ?", [
                's:email' => $this->email,
                's:first_name' => $this->first_name,
                's:last_name' => $this->last_name,
                's:password' => $this->password,
                'i:is_admin' => $this->is_admin
            ]);
            return $result;
        }
        $result = $database->query("INSERT INTO $tablename SET email = ?, first_name = ?, last_name = ?,  password = ?, is_admin = ?", [
            's:email' => $this->email,
            's:first_name' => $this->first_name,
            's:last_name' => $this->last_name,
            's:password' => $this->password,
            'i:is_admin' => $this->is_admin
        ]);

        $this->handleInsertResult($database);
        return $result;
    }
}
