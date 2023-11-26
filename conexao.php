<?php

try {
    $conexao = new PDO('mysql:host=localhost:3307; dbname=cadastro', 'root', 'root');
} catch (Exception $e) {
    echo $e->getMessage();
    echo "<br>";
    echo $e->getCode();
}

?>
