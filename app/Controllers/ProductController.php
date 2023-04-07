<?php

namespace App\Controllers;

use App\models\Product;

class ProductController
{
    public function index(): void
    {   
            $products =  Product::getProducts();
            if(!$products){
                http_response_code(204);
                exit;
            }
            //Load template
            $loader = new \Twig\Loader\FilesystemLoader('../app/views');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('template.html');
            //send the array products to render in view
            $params = array();
            $params['products'] = $products;
            //show the content
            $content = $template->render($params);
            echo ($content);
    }
    public function store():void
    {
        $class = 'App\models\\'.$_POST['select_specific_product'].'Product';
        $product = new $class($_POST);
        $created = $product->create();
        if(!$created)
        {
            header('location: index.php');
            exit;
        }
        header('location: index.php');
    }
    public function showAddPage():void 
    {
        $loader = new \Twig\Loader\FilesystemLoader('../app/views');
        $twig = new \Twig\Environment($loader);
        $content = $twig->render('add.html');
        echo $content;
    }
    public function delete(): void
    {
        $products_id = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (isset($products_id['id']))
        {
          foreach ($products_id['id'] as $id => $product)
          {
            $obProduct = Product::getProduct($id);
            if (! ($obProduct instanceof Product) )
            {
              header('location: index.php');
              exit;
            }
            $string_delete = "id = $id";
            $obProduct->delete($string_delete);
          }
          header('location: index.php');
          exit;
        }else {
          header('location: index.php');
          exit;
        }
    }
}