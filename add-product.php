<?php
require __DIR__ . '/vendor/autoload.php';
use \App\Entity\Product;

$itemSelected = $_POST['select_specific_product'];
    if($itemSelected === 'DVD'){
        $arrayInputs = [$_POST['sku_product'],$_POST['name_product'],$_POST['price_product'],'Size: '.$_POST['size_product_dvd'].' MB'];
        $objectProduct = new Product();
        $objectProduct->setInfoProduct($arrayInputs);
    } else if($itemSelected === 'Book'){
          $arrayInputs = [$_POST['sku_product'],$_POST['name_product'],$_POST['price_product'],'Size: '.$_POST['weight_product_book'].'KG'];
          $objectProduct = new Product();
          $objectProduct->setInfoProduct($arrayInputs);
    } else {
          $arrayInputs = [$_POST['sku_product'],$_POST['name_product'],$_POST['price_product'],'Dimension: '.$_POST['length_product_furniture']];
          $objectProduct = new Product();
          $objectProduct->setInfoProduct($arrayInputs);
}