<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php 
        require 'modulos.php';
        include 'menu.html';
        session_start();

        if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    ?>
        <div class="container container-login">
            <form action="index.php" method="POST">
                <center>
                    <h2>Sistema Alunos</h2>
                </center>
                <h3>Login</h3>
               <p>Usuário<input type="text" name="usuario" placeholder="Digite seu usuário..." value=<?php if (isset($_COOKIE['usuario'])) {
                    echo $_COOKIE['usuario'];
                } ?>></p>
                <p>Senha<input type="password" name="senha" placeholder="Digite sua senha..."></p>
                <div id='aviso'></div>
                <input type="submit" name="entrar" value="Entrar">
                <a class='btn-cadastrar' href="cadastro_login.php">Cadastrar Login</a>
        
            </form> 
        </div>

    <?php 
        } else {
            header('Location: pagina-inicial.php');
            exit();
        }
    ?>

</body>
</html>

<?php 
    if(isset($_POST['entrar'])) {
        require 'conexao.php';

        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        setcookie('usuario', $usuario);

        $dados = $conexao->prepare("SELECT senha, nome FROM usuarios WHERE email = :email limit 1;");
        $dados->bindValue(':email', $usuario);
        $dados->execute();

        if ($dados->rowCount() > 0) {
            $usuario_bd = $dados->fetch(PDO::FETCH_OBJ);
            
           
            if (password_verify($senha, $usuario_bd->senha)) {
                setcookie('nome', $usuario_bd->nome);
                $_SESSION['logado'] = true;
                header('Location: pagina-inicial.php');
                exit();
            } else {
                aviso_usuario_senha_incorretos();
            }
        
        } else {
            aviso_usuario_senha_incorretos();
        }
    }
?>

