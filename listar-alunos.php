<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Alunos Cadastrados</title>
    <link rel="stylesheet" href="style.css">
    
</head>

<body>
<?php
        require 'modulos.php';
        require 'conexao.php';
        include 'menu.html';
        
        session_start();
        if ($_SESSION['logado'] != true) {
            login_necessario();
        }
    ?>
    <div class="container container-listagem">
        <ul>
            <?php 
                $dados = $conexao->prepare("SELECT * FROM alunos");
                $dados->execute();
                $alunos = $dados->fetchAll(PDO::FETCH_OBJ);
                foreach ($alunos as $aluno) {
                    echo "
                    <li>
                        <div class='dados'>
                            <a>
                                <span class='titulo-item-listagem'>
                                    $aluno->nome
                                </span> 
                                
                                <div class='descricao-item-listagem'>
                                    <ul>
                                        <li>Telefone: $aluno->telefone</li>
                                        <li>Endereço: $aluno->endereco</li>
                                        <li>Usuário: $aluno->usuario</li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                        <div class='icone-lista'>
                        <a href='excluir.php?id=$aluno->id' title='excluir $aluno->nome'onclick=\"return confirm('Tem certeza que deseja excluir $aluno->nome?'); return false;\">
                            <img src='image/excluir.png' alt='Excluir'>
                        </a>
                        
                        <a href='atualizar-aluno.php?id=$aluno->id' title='Editar $aluno->nome'onclick=\"return confirm('Tem certeza que deseja atualizar $aluno->nome?'); return false;\">
                            <img src='image/editar-.png' alt='Editar'>
                        </a>
                    </div>

                    </li>";
                }
            ?>
         
        </ul>
    </div>
</body>
</html> 