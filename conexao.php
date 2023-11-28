<?php

$database = "cadastro";
$usuario = "root";
$senha = "root";
$servidor = "localhost:3307";

try {
    $conexao = new PDO("mysql:host={$servidor}; dbname={$database}", $usuario, $senha);
} catch (Exception $e) {
    echo $e->getMessage();
    echo "<br>";
    echo $e->getCode();
}

?>
