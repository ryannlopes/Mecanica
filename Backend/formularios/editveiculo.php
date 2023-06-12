<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Formulário de Editar de Veiculos</title>
  </head>
  <body>
  <?php
      include("../conexao.php");
      // Verifica se o id foi enviado via GET
      if (isset($_GET['idVeiculo'])) {
        // Protege contra injeção de SQL
        $id = mysqli_real_escape_string($conn, $_GET['idVeiculo']);

        // Consulta a cliente com o id informado
        $query = "SELECT * FROM veiculo WHERE idVeiculo = '$id'";
        $busca = mysqli_query($conn, $query);

        // Verifica se a consulta retornou algum resultado
        if (mysqli_num_rows($busca) > 0) {
          $dados = mysqli_fetch_array($busca);
        } else {
          echo "Veiculo não encontrada.";
          exit;
        }
      } else {
        echo "id não informado.";
        exit;
      }
    ?>
    <?php require("../nav.php");?>
    <form method="POST" action="../update/veiculo.php">
      <h1>EDITAR VEICULOS</h1>
      <label>ID</label>
      <input type="text" id="id" name="id" value="<?php echo htmlspecialchars($dados['idVeiculo']) ?>">
      <label>Placa</label>
      <input type="text" id="placa" name="placa" value="<?php echo htmlspecialchars($dados['placaVeiculo']) ?>">
      <label>Modelo:</label>
      <input type="text" id="modelo" name="modelo" value="<?php echo htmlspecialchars($dados['modeloVeiculo']) ?>">
      <label>Ano:</label>
      <input type="number" id="ano" name="ano" value="<?php echo htmlspecialchars($dados['anoVeiculo']) ?>">
      <label>Proprietário:</label>
      <select name="cliente">
        <?php
        require('../conexao.php');

        $query = "SELECT * FROM cliente";
        $busca = mysqli_query($conn, $query);

        while ($dados = mysqli_fetch_array($busca)) {
            $id = $dados['idCliente'];
        ?>
        <option value="<?php echo $dados['idCliente'];?>"><?php echo $dados['nomeCliente']; ?></option>
        <?php } ?>
        </select>
        
      <button type="submit" class="btn btn-success">Editar</button>
    </form>
  </body>
</html>