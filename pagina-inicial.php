
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php 
        require 'modulos.php';
        include 'menu.html';
        session_start();
        if ($_SESSION['logado'] != true) {
            login_necessario();
        }
    ?>

    <div class="container">

        <h1>Seja bem vindo <?php if (isset($_COOKIE['nome'])) { echo $_COOKIE['nome']; }?>!</h1>
        <p>Este é um sistema CRUD que envolve as competências adquiridas
         nas disciplinas de Banco de Dados II e Programação para Web II...</p>
        <h2>Participantes Do Projeto:</h2>
        <p>Eloá Martins</p>
        <p>Gustavo Soares</p>
        <p>Camila Bueno</p>
        <p>Manuela Scalon</p>

    </div>
</body>
</html>