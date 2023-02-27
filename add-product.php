<?php
require __DIR__ . '/vendor/autoload.php';
use \App\Entity\Product;
    if(ctype_digit($_POST['price_product']) || ctype_digit($_POST['size_product_dvd']) || ctype_digit($_POST['weight_product_book'])){
        $types = array("DVD" => $_POST['size_product_dvd'],"Book" => $_POST['weight_product_book'],"Furniture" => $_POST['product_furniture_height'].'x'.$_POST['product_furniture_width'].'x'.$_POST['product_furniture_length']);
        $itemSelected = $_POST['select_specific_product'];
        $product = new Product();
        foreach ($types as $type => $measure)
        {
            if($itemSelected === 'DVD' && $measure !== "")$product->create("Size: ".$measure." MB");
            else if($itemSelected === 'Book' && $measure !== "")$product->create("Weight: ".$measure." KG");
            else if($itemSelected === 'Furniture' && $measure !== "") $product->create("Dimension: ".$measure);
        }
    }else {
        header('location: index.php?status=input-invalid');
        exit;
    }