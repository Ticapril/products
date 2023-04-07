<?php

namespace App\models;

class BookProduct extends Product
{
    function __construct(array $request)
    {
        $this->id = null;
        $this->sku = $request['sku_product']?? null;
        $this->name = $request['name_product']?? null;
        $this->price = $request['price_product']?? null;
        $this->measure = $request['weight_product_book']?? null;
        $this->validated = $this->validator();
    }
    function getMeasure(): string {
        return "Weight: $this->measure KG";
    }
    function validator(): bool{
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
