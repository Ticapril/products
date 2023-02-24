<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Product;

$products =  Product::getProducts();
//inclusão dos arquivos header e footer que irão se repetir no aplicativo
include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listing.php';
include __DIR__.'/includes/footer.php';


