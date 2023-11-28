<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Usuario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        require 'modulos.php';
        include 'menu.html';

        session_start();
        // if ($_SESSION['logado']):
    ?>
    <div class="container container-cadastro">

        <h2>Cadastro de usuário</h2>
        <form action="" method="POST">
            <p>Nome:<input type="text" name="nome" placeholder="Digite seu nome"></p>
            <p>Email:<input type="text" name="email" placeholder="Digite seu Email"></p>
            <p>Senha: <input type="password" name="senha" placeholder="Digite sua senha"></p>
            <input type="submit" name="cadastrar" value="Cadastrar">
        </form>
    </div>
    <?php 
        // else:
        //     login_necessario();
        //  endif
    ?>
</body>
</html>
<?php 

    $cadastrado = false;
    $usuario_existente = false;
    require 'conexao.php';

    if (isset($_POST['cadastrar'])) {

        // if (existe_usuario($_POST['usuario'])) {
        //     aviso_usuario_existente();
        // } else {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            $cadastro = $conexao->prepare(
                "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha);"
            );
            $cadastro->bindValue(":nome", $nome);
            $cadastro->bindValue(":email", $email);
            $cadastro->bindValue(":senha", $senha);
            $cadastro->execute();
            $cadastrado = true;
            header("Location: index.php");
            exit();
           
        }
    
    if ($cadastrado):
?>
<script>
alert('Cadastrado com sucesso!')
</script>
<?php 
    endif
?>
