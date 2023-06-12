<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Formulário de Editar de Serviços</title>
  </head>
  <body>
  <?php
      include("../conexao.php");
      // Verifica se o id foi enviado via GET
      if (isset($_GET['idServico'])) {
        // Protege contra injeção de SQL
        $id = mysqli_real_escape_string($conn, $_GET['idServico']);

        // Consulta a cliente com o id informado
        $query = "SELECT * FROM servico WHERE idServico = '$id'";
        $busca = mysqli_query($conn, $query);

        // Verifica se a consulta retornou algum resultado
        if (mysqli_num_rows($busca) > 0) {
          $dados = mysqli_fetch_array($busca);
        } else {
          echo "Serviço não encontrada.";
          exit;
        }
      } else {
        echo "id não informado.";
        exit;
      }
    ?>
    <?php require("../nav.php");?>
    <form method="POST" action="../update/servico.php">
      <h1>EDITAR SERVIÇOS</h1>
      <label>Id:</label>
      <input type="text" id="id" name="id" value="<?php echo htmlspecialchars($dados['idServico']) ?>">
      <label>Descrição:</label>
      <input type="text" id="descricao" name="descricao" value="<?php echo htmlspecialchars($dados['descricaoServico']) ?>">
      <label>Valor:</label>
      <input type="number" pattern="[0-9]+([,\.][0-9]+)?" id="valor" name="valor" value="<?php echo htmlspecialchars($dados['valorServico']) ?>">
      <button type="submit" class="btn btn-success">Editar</button>
    </form>
  </body>
</html>