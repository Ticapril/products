<?php

require __DIR__ . '/vendor/autoload.php';

use App\Entity\Product;


$products_id = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($products_id['id'])){
  foreach ($products_id['id'] as $id => $product) {
    //CONSULTA Produto
    $obProduct = Product::getProduct($id);
    //VALIDAÇÃO Produto
    if (!$obProduct instanceof Product) {
      header('location: index.php?status=error');
      exit;
    }
    //VALIDAÇÃO DO POST
    $string_delete = "id = $id";
    $obProduct->delete($string_delete);
  }
  header('location: index.php?status=success');
  exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/confirm-delete.php';
include __DIR__ . '/includes/footer.php';
