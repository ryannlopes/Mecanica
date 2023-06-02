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
      <!-- Veiculos -->
      <table border="1px" style="text-align: center;">
        <h1>Veiculos</h1>
        <thead>
          <tr>
            <th>Placa</th>
            <th>Modelo</th>
            <th>Ano</th>
            <th>Proprietário</th>
            <th><a type="button" href="formularios/veiculo.php">CADASTRAR</a></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
            require('conexao.php');

            $query = "SELECT idVeiculo,
                             placaVeiculo,
                             modeloVeiculo,
                             anoVeiculo,
                             nomeCliente as Cliente FROM veiculo
                             INNER JOIN Cliente ON fkIdCliente = idCliente";
            $busca = mysqli_query($conn, $query);

            while ($dados = mysqli_fetch_array($busca)) {
                $id = $dados['idVeiculo'];
            ?>
            <td><?php echo $dados['placaVeiculo'] ?> </td>
            <td><?php echo $dados['modeloVeiculo'] ?></td>
            <td><?php echo $dados['anoVeiculo'] ?></td>
            <td><?php echo $dados['Cliente'] ?></td>
            <td><a  href="">EDITAR</a></td>
            <td><a  href="./delete/veiculo.php?idVeiculo=<?php echo $dados['idVeiculo']?>">DELETAR</td>
          </tr>

          <?php } ?>
        </tbody>
      </table>    
</body>
</html>