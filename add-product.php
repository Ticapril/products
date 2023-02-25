<?php
require __DIR__ . '/vendor/autoload.php';
use \App\Entity\Product;

$types = 
array(
"DVD" => 'Size: '.$_POST['size_product_dvd'].' MB',
"Book" => 'Weight: '.$_POST['weight_product_book'].'KG',
"Furniture" => 'Dimension: '.$_POST['length_product_furniture']
);
$itemSelected = $_POST['select_specific_product'];
$product = new Product();
foreach ($types as $type => $measure) {
    if($itemSelected === 'DVD')$product->create($measure);
    else if($itemSelected === 'Book')$product->create($measure);
    else $product->create($measure);
}   