<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Formulário de Editar de Cliente</title>
  </head>
  <body>
    <?php
      include("../conexao.php");
      // Verifica se o id foi enviado via GET
      if (isset($_GET['idCliente'])) {
        // Protege contra injeção de SQL
        $id = mysqli_real_escape_string($conn, $_GET['idCliente']);

        // Consulta a cliente com o id informado
        $query = "SELECT * FROM cliente WHERE idCliente = '$id'";
        $busca = mysqli_query($conn, $query);

        // Verifica se a consulta retornou algum resultado
        if (mysqli_num_rows($busca) > 0) {
          $dados = mysqli_fetch_array($busca);
        } else {
          echo "Cliente não encontrada.";
          exit;
        }
      } else {
        echo "id não informado.";
        exit;
      }
    ?>
    <form method="POST" action="../update/cliente.php">
      <h1>EDITAR PESSOA</h1>
      <label>ID:</label>
      <input type="text" id="id" name="id" disabled value="<?php echo htmlspecialchars($dados['idCliente']) ?>">
      <label>Nome:</label>
      <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($dados['nomeCliente']) ?>">
      <label>Email:</label>
      <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($dados['emailCliente']) ?>">
      <label>Celular:</label>
      <input type="text" id="celular" name="celular" value="<?php echo $dados['celularCliente'] ?>">
      <button type="submit" class="btn btn-success">Editar</button>
    </form>
  </body>
</html>