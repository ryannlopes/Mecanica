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
    <title>Usuario</title>
</head>
<body>
    <?php require("nav.php");?>
      <!-- Usuario -->
      <table border="1px" style="text-align: center;">
        <h1>Usuario</h1>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Username</th>
            <th><a type="button" href="formularios/user.php">CADASTRAR</a></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
            require('conexao.php');

            $query = "SELECT * FROM usuario";
            $busca = mysqli_query($conn, $query);

            while ($dados = mysqli_fetch_array($busca)) {
                $id = $dados['idUser'];
            ?>
            <td><?php echo $dados['idUser'] ?> </td>
            <td><?php echo $dados['nomeUser'] ?></td>
            <td><?php echo $dados['username'] ?></td>
            <td><a  href="./formularios/editusuario.php?idUser=<?php echo $dados['idUser']?>">EDITAR</a></td>
            <td><a  href="./delete/user.php?idUser=<?php echo $dados['idUser']?>">DELETAR</td>
          </tr>

          <?php } ?>
        </tbody>
      </table>    
</body>
</html>