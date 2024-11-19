<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$database = "lista_lucaswagner";

$connection = new mysqli($host, $usuario, $senha, $database);

if ($connection->connect_error){
    die("Falha de conexão: " . $connection->$connect_error);
};

?>