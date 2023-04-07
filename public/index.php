<?php 
require '../vendor/autoload.php';
use App\Core\Core;

$template = file_get_contents("../app/views/template.html");
ob_start();
    $core = new Core();
    $core->start($_GET);
    $saida = ob_get_contents();
ob_end_clean();

echo $saida;