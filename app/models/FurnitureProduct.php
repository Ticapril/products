<?php

namespace App\models;

class FurnitureProduct extends Product
{
    protected array $dimensions;

    function __construct(array $request) // alturaxlarguraxcomprimento
    {
        $this->id = null;
        $this->sku = $request['sku_product']?? null;
        $this->name = $request['name_product']?? null;
        $this->price = $request['price_product']?? null;
        $this->dimensions['height'] = $request['product_furniture_height']?? null;
        $this->dimensions['width'] = $request['product_furniture_width']?? null;
        $this->dimensions['length'] = $request['product_furniture_length']?? null;
        $this->measure = $this->dimensions['height'].'x'.$this->dimensions['width'].'x'.$this->dimensions['length'];
    }
    function getMeasure(): string{
        return "Dimensions: $this->measure";
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
        if(empty($this->dimensions) || !is_float($this->dimensions)){
            return false;
        }
        return true;
    }
}
