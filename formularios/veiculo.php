<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Formulário de Cadastro de Veiculos</title>
  </head>
  <body>
    <?php require("../nav.php");?>
    <form method="POST" action="../insert/veiculo.php">
      <h1>CADASTRO VEICULOS</h1>
      <label>Placa</label>
      <input type="text" id="placa" name="placa">
      <label>Modelo:</label>
      <input type="text" id="modelo" name="modelo">
      <label>Ano:</label>
      <input type="number" id="ano" name="ano">
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
        
      <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>
  </body>
</html>