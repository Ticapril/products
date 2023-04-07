<?php

namespace App\models;

use PDO;
use PDOException;
use App\Db\Database;

class Product
{
    protected int $id;
    protected string $sku;
    protected string $name;
    protected float $price;
    protected bool $validated;
    protected float $measure;

    public function create(): bool
    {
        //redirect the page with status success
        if (!$this->validated) {
            return false;
        }
        try {
            //Insert Product in Database
            $database = new Database('products');
            //assign the Product ID in the instance
            $this->id = $database->insert(["sku" => $this->sku,"name" => $this->name,"price" => $this->price,"measure" => $this->measure]);
            //return true
            return true;
        } catch (PDOException $e) {
            die("ERROR:".$e->getMessage());
        }
    }
    public static function getProducts(string $where = null, string $order = null, string $limit = null): array
    {
        return (new Database('products'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function delete()
    {
        return (new Database('products'))->delete('id = '.$this->id);
    }
    public static function getProduct(string $id): object
    {
        return (new Database('products'))->select('id = '.$id)->fetchObject(self::class);
    }
    public static function getNameSku(): array
    {
        return (new Database('products'))->select(null, null, null, 'sku')->fetchAll(PDO::FETCH_ASSOC);
    }
}
