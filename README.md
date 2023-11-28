# Projeto Cadastro de Alunos!

Para rodar o projeto, você deve rodar dentro de algum servidor web que consiga interpretar o PHP como por exemplo o "xampp".

No xampp coloque o projeto dentro da pasta htdocs.
Agora precisamos criar o Banco de Dados do projeto, seguindo os passos abaixo:

Execute o comando SQL abaixo para criar o Bando de Dados e as Tabelas do sistema, rode o comando abaixo no seu Workbanch:

Comando 1:

```sh
CREATE DATABASE `cadastro`;
```

Comando 2:

```sh
CREATE TABLE `alunos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```

Comando 3:

```sh
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```

Agora altere no arquivo "conexao.php" as credenciais do seu banco de dados localhost.

Abra seu navegador no endereço localhost do xampp para abrir o sistema e crie seu primeiro usuário clicando em "Cadastrar Login".
