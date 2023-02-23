<?php 

$server = 'localhost';
$user = 'root';
$password = '';
$dbname = 'products';

//Criar a conexão
$connection = mysqli_connect($server,$user,$password,$dbname);

if(!$connection) {
    die('Falha na conexão'. mysqli_connect_error());
}else {
    // echo 'Conexão realizada com sucesso';
}