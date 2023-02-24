<?php
require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Product;

if (!isset($_POST['select_specific_product'])) {
    $typeProduct = 1;
} else {
    $typeProduct = $_POST['select_specific_product'];
}

switch ($typeProduct) {
    case '1':
        if (isset($_POST['sku_product'], $_POST['name_product'], $_POST['price_product'], $_POST['tamanho_product_dvd'])) {
            $objectProduct = new Product();
            $skusBd = $objectProduct->getNameSku();
            foreach ($skusBd as $product) {
                if (strcasecmp($product->sku, $_POST['sku_product']) == 0) {
                    echo  "<script>alert('SKU ALREADY REGISTERED!);</script>";
                    header('location: index.php?status=error');
                    exit;
                }
            }
            $objectProduct->setSku($_POST['sku_product']) ;
            $objectProduct->setName($_POST['name_product']) ;
            $objectProduct->setPrice($_POST['price_product']) ;
            $objectProduct->setMeasure('Size: '.$_POST['tamanho_product_dvd'].' MB');
            $objectProduct->create();
            header('location: index.php?status=success');
            exit;
        }
        break;
    case '2':
        if (isset($_POST['sku_product'], $_POST['name_product'], $_POST['price_product'], $_POST['tamanho_product_book'])) {
            $objectProduct = new Product();
            $skusBd = $objectProduct->getSku();
            foreach ($skusBd as $product) {
                if (strcasecmp($product->sku, $_POST['sku_product']) == 0) {
                    echo  "<script>alert('SKU ALREADY REGISTERED!);</script>";
                    header('location: index.php?status=error');
                    exit;
                }
            }
            $objectProduct->setSku($_POST['sku_product']);
            $objectProduct->setName($_POST['name_product']);
            $objectProduct->setPrice($_POST['price_product']);
            $objectProduct->setMeasure('Weight: '.$_POST['tamanho_product_book'].'KG');
            $objectProduct->create();
        }
        break;
    case '3':
        $dimensions = '';
        $dimensions = $_POST['tamanho_product_furniture_height'] .'x'.$_POST['tamanho_product_furniture_width'] .'x'.$_POST['tamanho_product_furniture_lenght'];
        if (isset($_POST['sku_product'], $_POST['name_product'], $_POST['price_product'], $dimensions)) {
            $objectProduct = new Product();
            $skusBd = $objectProduct->getSku();
            foreach ($skusBd as $product) {
                if (strcasecmp($product->sku, $_POST['sku_product']) == 0) {
                    echo  "<script>alert('SKU ALREADY REGISTERED!);</script>";
                    header('location: index.php?status=error');
                    exit;
                }
            }
            $objectProduct->setSku($_POST['sku_product']);
            $objectProduct->setName($_POST['name_product']);
            $objectProduct->setPrice($_POST['price_product']);
            $objectProduct->setMeasure('Dimension: '.$dimensions);
            $objectProduct->create();
        }
        break;
}
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/form.php';
include __DIR__ . '/includes/footer.php';
