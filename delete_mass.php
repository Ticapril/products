<?php
require __DIR__ . '/vendor/autoload.php';
use App\Entity\Product;
$products_id = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (isset($products_id['id'])){
  foreach ($products_id['id'] as $id => $product) {
    $obProduct = Product::getProduct($id);
    if (!$obProduct instanceof Product) {
      header('location: index.php?status=error');
      exit;
    }
    $string_delete = "id = $id";
    $obProduct->delete($string_delete);
  }
  header('location: index.php?status=success');
  exit;
}else {
  header('location: index.php?status=select-at-least-one-option');
  exit;
}