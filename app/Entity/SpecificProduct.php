<?php 

namespace App\Entity;
use \PDO;

use App\Db\Database;

class SpecificProduct {

    private $id;
    private $name;

    public static function getCategories(){
        // SELECT * FROM `product_specific`
        return (new Database('product_specific'))->select()
        ->fetchAll(PDO::FETCH_CLASS,self::class);
    }
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}