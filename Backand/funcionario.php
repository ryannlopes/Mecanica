<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION["username"])) {
    header("Location: login/login.php"); // Redirecionar para a página de login se não estiver logado
    exit();
}

require("conexao.php");

// Exibir o nome de usuário na página de dashboard
$username = $_SESSION["username"];
$nome     = $_SESSION["nomeUser"];
// Consulta SQL para verificar as credenciais do usuário
     $query = "SELECT * FROM usuario WHERE username = '$username'";
              $busca = mysqli_query($conn, $query);

              while ($dados = mysqli_fetch_array($busca)) {
                $id = $dados['idUser'];
                $nome = $dados['nomeUser'];
              }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Clientes</title>
</head>
<body>
    <?php require("nav.php");?>
      <!-- Clientes -->
      <table border="1px" style="text-align: center;">
        <h1>Clientes</h1>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Função</th>
            <th>E-mail</th>
            <th>Celular</th>
            <th><a type="button" href="formularios/funcionario.php">CADASTRAR</a></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
            require('conexao.php');

            $query = "SELECT * FROM funcionario";
            $busca = mysqli_query($conn, $query);

            while ($dados = mysqli_fetch_array($busca)) {
                $id = $dados['idFuncionario'];
            ?>
            <td><?php echo $dados['idFuncionario'] ?> </td>
            <td><?php echo $dados['nomeFuncionario'] ?></td>
            <td><?php echo $dados['funcaoFuncionario'] ?></td>
            <td><?php echo $dados['emailFuncionario'] ?></td>
            <td><?php echo $dados['celularFuncionario'] ?></td>
            <td><a  href="">EDITAR</a></td>
            <td><a  href="">DELETAR</td>
          </tr>

          <?php } ?>
        </tbody>
      </table>    
</body>
</html>