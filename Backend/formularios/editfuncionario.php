<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Formulário de Cadastro de Funcionário</title>
  </head>
  <body>
  <?php
      include("../conexao.php");
      // Verifica se o id foi enviado via GET
      if (isset($_GET['idFuncionario'])) {
        // Protege contra injeção de SQL
        $id = mysqli_real_escape_string($conn, $_GET['idFuncionario']);

        // Consulta a cliente com o id informado
        $query = "SELECT * FROM funcionario WHERE idFuncionario = '$id'";
        $busca = mysqli_query($conn, $query);

        // Verifica se a consulta retornou algum resultado
        if (mysqli_num_rows($busca) > 0) {
          $dados = mysqli_fetch_array($busca);
        } else {
          echo "Funcionario não encontrado.";
          exit;
        }
      } else {
        echo "id não informado.";
        exit;
      }
    ?>
    <?php require("../nav.php");?>
    <form method="POST" action="../update/funcionario.php">
      <h1>EDITAR FUNCIONÁRIO</h1>
      <label>ID:</label>
      <input type="text" id="id" name="id" value="<?php echo htmlspecialchars($dados['idFuncionario']) ?>">
      <label>Nome:</label>
      <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($dados['nomeFuncionario']) ?>">
      <label>E-mail:</label>
      <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($dados['emailFuncionario']) ?>">
      <label>Celular:</label>
      <input type="number" id="celular" name="celular" value="<?php echo htmlspecialchars($dados['celularFuncionario']) ?>">
      <button type="submit" class="btn btn-success">Editar</button>
    </form>
  </body>
</html>