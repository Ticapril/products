<?php
namespace App\Core;
require '../vendor/autoload.php';

class Core
{
    public function start(array $urlGet):void
    {
        // $routes = [
        //   "" =>   

        // ];

        // pagina="nome_da_pagina"&metodo="nome_do_metodo"

        if(!isset($urlGet['pagina'])){ 
            $path = 'App\Controllers\\ProductController';
            $action = 'index';
            call_user_func_array(array(new $path(), $action), array());
        }elseif($urlGet['pagina'] === 'Product' && (!isset($urlGet['metodo']))) {
            $controller = ucfirst($urlGet['pagina'].'Controller');
            $path = "App\Controllers\\$controller";
            $action = 'index';
            call_user_func_array(array(new $path(), $action), array());
        }elseif($urlGet['pagina'] !== 'Product') {
            $path = 'App\Controllers\\ErrorController';
            $action = 'index';
            call_user_func_array(array(new $path(), $action), array());
            die;
        }
        
        if(isset($urlGet['pagina']) && isset($urlGet['metodo']))
        {
            $controller = ucfirst($urlGet['pagina'].'Controller');   
            if (isset($urlGet['pagina']) && $controller === 'ProductController')
            {
                switch ($urlGet['metodo'])
                {
                    case 'index':
                        $path = "App\Controllers\\$controller";
                        call_user_func_array(array(new $path(), $urlGet['metodo']), array());
                        break;
                    case 'store':
                        $path = "App\Controllers\\$controller";
                        call_user_func_array(array(new $path(), $urlGet['metodo']), array());
                        break;
                    case 'showAddPage':
                        $path = "App\Controllers\\$controller";
                        call_user_func_array(array(new $path(), $urlGet['metodo']), array());
                        break;
                    case 'delete':
                        $path = "App\Controllers\\$controller";
                        call_user_func_array(array(new $path(), $urlGet['metodo']), array());
                        break;
                    default:
                        $path = 'App\Controllers\\ErrorController';
                        $action = 'index';
                        call_user_func_array(array(new $path(), $action), array());
                        break;
                }
            }
            else
            {
                    $path = 'App\Controllers\\ErrorController';
                    $action = 'index';
                    call_user_func_array(array(new $path(), $action), array());
                    die;
            }
        }
    }
}
