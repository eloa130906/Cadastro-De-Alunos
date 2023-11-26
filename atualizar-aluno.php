<?php
require 'conexao.php';
require 'modulos.php';

session_start();
if ($_SESSION['logado'] != true) {
    login_necessario();
}

$id = $_GET['id'] ?? '';
$aluno = [];

if (!empty($id)) {
    $consulta = $conexao->prepare("SELECT * FROM alunos WHERE id = :id");
    $consulta->bindValue(':id', $id);
    $consulta->execute();
    $aluno = $consulta->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['atualizar'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'] ?? $aluno['nome'];
    $endereco = $_POST['endereco'] ?? $aluno['endereco'];
    $telefone = $_POST['telefone'] ?? $aluno['telefone'];
    $usuario = $_POST['usuario'] ?? $aluno['usuario'];
    $senha = $_POST['senha'] ? password_hash($_POST['senha'], PASSWORD_DEFAULT) : $aluno['senha']; // Se uma nova senha for fornecida, faça o hash dela, caso contrário, mantenha a senha existente

    if (existe_usuario($usuario, $aluno['usuario'] ?? '')) {
        aviso_usuario_existente();
    } else {
        $atualizacao = $conexao->prepare("UPDATE alunos SET nome=:nome, endereco=:endereco, telefone=:telefone, usuario=:usuario, senha=:senha WHERE id=:id");
        $atualizacao->bindValue(':nome', $nome);
        $atualizacao->bindValue(':endereco', $endereco);
        $atualizacao->bindValue(':telefone', $telefone);
        $atualizacao->bindValue(':usuario', $usuario);
        $atualizacao->bindValue(':senha', $senha);
        $atualizacao->bindValue(':id', $id);
        $atualizacao->execute();
        header('location: listar-alunos.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require 'menu.html'; ?>

    <div class="container container-cadastro">
        <h2>Atualização de usuário</h2>
        <form action="" method="POST">
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <p>Nome:<input type="text" name="nome" placeholder="Digite novo nome" value='<?php echo $aluno['nome'] ?? '' ?>' ></p>
    <p>Endereço:<input type="text" name="endereco" placeholder="Digite novo endereço" value='<?php echo $aluno['endereco'] ?? '' ?>'></p>
    <p>Telefone:<input type="text" name="telefone" placeholder="Digite novo número de telefone" value='<?php echo $aluno['telefone'] ?? '' ?>'></p>
    <p>Usuário: <input type="text" name="usuario" placeholder="Digite um novo" value='<?php echo $aluno['usuario'] ?? '' ?>'><span id='aviso-usuario'></span></p>
    <p>Senha: <input type="text" name="senha" placeholder="Digite um novo" ></p>

            <input type="submit" name="atualizar" value="Atualizar">
        </form>
    </div>
</body>
</html>
