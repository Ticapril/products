<?php 

require __DIR__.'/vendor/autoload.php';

use App\Entity\Product;

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: index.php?status=error');
  exit;
}

//CONSULTA A VAGA
$obProduct = Product::getProduct($_GET['id']);

//VALIDAÇÃO DA VAGA
if(!$obProduct instanceof Product){
  header('location: index.php?status=error');
  exit;
}

//VALIDAÇÃO DO POST
if(isset($_POST['delete'])){

  $obProduct->delete();

  header('location: index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirm-delete.php';
include __DIR__.'/includes/footer.php';