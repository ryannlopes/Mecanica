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
      if (isset($_GET['idFuncao'])) {
        // Protege contra injeção de SQL
        $id = mysqli_real_escape_string($conn, $_GET['idFuncao']);

        // Consulta a cliente com o id informado
        $query = "SELECT * FROM funcao WHERE idFuncao = '$id'";
        $busca = mysqli_query($conn, $query);

        // Verifica se a consulta retornou algum resultado
        if (mysqli_num_rows($busca) > 0) {
          $dados = mysqli_fetch_array($busca);
        } else {
          echo "Funcao não encontrada.";
          exit;
        }
      } else {
        echo "id não informado.";
        exit;
      }
    ?>
    <form method="POST" action="../update/funcao.php">
      <h1>EDITAR FUNÇÃO</h1>
      <label>ID:</label>
      <input type="text" id="id" name="id" value="<?php echo htmlspecialchars($dados['idFuncao']) ?>">
      <label>Nome:</label>
      <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($dados['nomeFuncao']) ?>">
      <button type="submit" class="btn btn-success">Editar</button>
    </form>
  </body>
</html>