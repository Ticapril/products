<?php 

namespace App\Entity;
use \PDO;

use App\Db\Database;

class Product {

    //atributes
    private $id;
    private $sku;
    private $name;
    private $price;
    private $measure;
    //functions

    public function create($measure){
        //insert infomacoes no objeto antes de inserir no banco
        $this->setSku($_POST['sku_product']);
        $this->setName($_POST['name_product']);
        $this->setPrice($_POST['price_product']);
        $this->setMeasure($measure);
        //Insert Product in Database
        $objectDatabase = new Database('products');
        $this->setId($objectDatabase->insert(["sku" => $this->getSku(),"name" => $this->getName(),"price" => $this->getPrice(),"measure" => $this->getMeasure()])) ;
        //atribuir o ID do Produto na instancia
        //retornar sucesso
        header('location: index.php?status=success');
        exit;
    }
    public static function getProducts($where = null, $order = null, $limit = null){
        $objectDatabase = new Database('products');
        $teste = $objectDatabase->select($where,$order,$limit);
        return $teste->fetchAll(PDO::FETCH_CLASS, self::class);
    }
    public function delete(){
        return (new Database('products'))->delete('id = '.$this->id);
    }
    public static function getProduct($id){
        return (new Database('products'))->select('id = '.$id)
                                    ->fetchObject(self::class);
    }
    public static function getNameSku(){
        // SELECT sku FROM `products`;
        return (new Database('products'))->select(null,null,null,'sku')
                                    ->fetchAll(PDO::FETCH_CLASS,self::class);
    }
    // public function setInfoProduct($measure){
        
    //     // executa a função para criar esse objeto no banco de dados
    //     $this->create();
    //     //redireciona para a pagina inicial   
    //     header('location: index.php?status=success');
    //     exit;
    // }
    //Getters and Setters
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
     * Get the value of sku
     */ 
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * Set the value of sku
     *
     * @return  self
     */ 
    public function setSku($sku)
    {
        $this->sku = $sku;

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

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of measure
     */ 
    public function getMeasure()
    {
        return $this->measure;
    }

    /**
     * Set the value of measure
     *
     * @return  self
     */ 
    public function setMeasure($measure)
    {
        $this->measure = $measure;

        return $this;
    }
}