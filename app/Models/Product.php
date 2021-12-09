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
            $result = $database->query("UPDATE $tablename SET name = ?, price = ?, description = ?, gender = ?, images = ? WHERE id = ?", [
                "s:name" => $this->name,
                "i:price" => $this->price,
                "s:description" => $this->description,
                "s:gender" => $this->gender,
                "s:images" => $this->images,
                "i:id" => $this->id
            ]);
        } else {
            $result = $database->query("INSERT INTO $tablename SET name = ?, price = ?, description = ?, gender = ? , images = ?", [
                "s:name" => $this->name,
                "i:price" => $this->price,
                "s:description" => $this->description,
                "s:gender" => $this->gender,
                "s:images" => $this->images
            ]);
        }

        $this->handleInsertResult($database);

        return $result;
    }

    /**
     * addImages
     *
     * @param  array $images
     * @return array
     */
    public function addImages(array $images): array
    {
        $currentImages = $this->getImages();
        $currentImages = array_merge($currentImages, $images);

        $this->setImages($currentImages);

        return $currentImages;
    }



    /**
     * getImages
     *
     * @return array
     */
    public function getImages(): array
    {
        return json_decode($this->images);
    }

    /**
     * getFirstImage
     *
     * @return string
     */
    public function getFirstImage(): ?string
    {
        $images = json_decode($this->images);
        if (!empty($images)) {
            $firstImage = $images[0];
            return $firstImage;
        } else {
            return null;
        }
    }

    public function removeImages(array $images): array
    {
        $currentImages = $this->getImages();
        $filteredImages = array_filter($currentImages, function ($image) use ($images) {
            if (in_array($image, $images)) {
                return false;
            }
            return true;
        });
        $this->setImages($filteredImages);

        return $filteredImages;
    }

    /**
     * setImages
     *
     * @param  array $images
     * @return array
     */
    public function setImages(array $images): array
    {
        $this->images = json_encode(array_values($images));

        return $this->getImages();
    }

    public static function getNewestProducts($gender, $limit = 4)
    {
        $database = new Database();
        $tablename = self::getTablenameFromClassname();

        $result = $database->query("SELECT * FROM $tablename WHERE gender = '$gender' AND deleted_at IS NULL ORDER BY id DESC LIMIT $limit");
        return self::handleResult($result);
    }
}
