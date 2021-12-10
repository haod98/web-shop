<?php



namespace App\Models;

use Core\Database;
use Core\Models\AbstractModel;
use Core\Traits\SoftDelete;

/**
 * Class User
 *
 * @package app\Models
 */
class Address extends AbstractModel
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
        public ?int $user_id = null,
        public string $address = '',
        public string $city = '',
        public string $postal_code = '',
        public string $created_at = '',
        public string $updated_at = '',
        public ?string $deleted_at = '',
    ) {
    }

    public function save(): bool
    {
        $database = new Database();

        $tablename = self::getTablenameFromClassname();


        if (!empty($this->id)) {
            $result = $database->query(
                "UPDATE $tablename  SET user_id = ?, address = ?, city = ?,  postal_code = ? WHERE id = ?",
                [
                    'i:user_id' => $this->user_id,
                    's:address' => $this->address,
                    's:city' => $this->city,
                    's:postal_code' => $this->postal_code,
                    'i:id' => $this->id,
                ]
            );
            return $result;
        }

        $result = $database->query(
            "INSERT INTO $tablename SET user_id = ?, address = ?, city = ?,  postal_code = ?",
            [
                'i:user_id' => $this->user_id,
                's:address' => $this->address,
                's:city' => $this->city,
                's:postal_code' => $this->postal_code,
            ]
        );

        $this->handleInsertResult($database);
        return $result;
    }

    public static function findByUserId($userId)
    {

        $database = new Database();
        $tablename = self::getTablenameFromClassname();


        $result = $database->query("SELECT * FROM $tablename WHERE `user_id` = ?", [
            'i:user_id' => $userId
        ]);

        /**
         * Datenbankergebnis verarbeiten und zurückgeben.
         */
        return self::handleUniqueResult($result);
    }
}
