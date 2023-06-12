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
    <title>Serviços</title>
</head>
<body>
    <?php require("nav.php");?>
      <!-- Serviços -->
      <table border="1px" style="text-align: center;">
        <h1>Serviços</h1>
        <thead>
          <tr>
            <th>ID</th>
            <th>Descrição Serviço</th>
            <th>Valor</th>
            <th><a type="button" href="formularios/servico.php">CADASTRAR</a></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
            require('conexao.php');

            $query = "SELECT * FROM servico";
            $busca = mysqli_query($conn, $query);

            while ($dados = mysqli_fetch_array($busca)) {
                $id = $dados['idServico'];
            ?>
            <td><?php echo $dados['idServico'] ?> </td>
            <td><?php echo $dados['descricaoServico'] ?></td>
            <td>R$<?php echo $dados['valorServico'] ?></td>
            <td><a  href="./formularios/editservico.php?idServico=<?php echo $dados['idServico']?>">EDITAR</a></td>
            <td><a  href="./delete/servico.php?idServico=<?php echo $dados['idServico']?>">DELETAR</td>
          </tr>

          <?php } ?>
        </tbody>
      </table>    
</body>
</html>