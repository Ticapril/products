<?php

namespace App\models;

class DVDProduct extends Product
{

    function __construct(array $request)
    {
        $this->id = null;
        $this->sku = $request['sku_product']?? null;
        $this->name = $request['name_product']?? null;
        $this->price = floatval($request['price_product']?? null);
        $this->measure = floatval($request['size_product_dvd']?? null);
        $this->validated = $this->validator();
    }
    function getMeasure(){
        return "Size: $this->measure MB";
    }
    function validator(){
        if(empty($this->sku) || !is_string($this->sku)){
            return false;
        }
        if(empty($this->name) || !is_string($this->name)){
            return false;
        }
        if(empty($this->price) || !is_float($this->price)){
            return false;
        }
        if(empty($this->measure) || !is_float($this->measure)){
            return false;
        }
        return true;
    }
}
