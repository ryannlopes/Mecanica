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
    <title>Função</title>
</head>
<body>
    <?php require("nav.php");?>
      <!-- Funcao -->
      <table border="1px" style="text-align: center;">
        <h1>Função</h1>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th><a type="button" href="formularios/funcao.php">CADASTRAR</a></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
            require('conexao.php');

            $query = "SELECT * FROM funcao";
            $busca = mysqli_query($conn, $query);

            while ($dados = mysqli_fetch_array($busca)) {
                $id = $dados['idFuncao'];
            ?>
            <td><?php echo $dados['idFuncao'] ?> </td>
            <td><?php echo $dados['nomeFuncao'] ?></td>
            <td><a  href="formularios/editFuncao.php?idFuncao=<?php echo $dados['idFuncao']; ?>">EDITAR</a></td>
            <td><a  href="./delete/funcao.php?idFuncao=<?php echo $dados['idFuncao']?>">DELETAR</td>
          </tr>

          <?php } ?>
        </tbody>
      </table>    
</body>
</html>