<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Formulário de Cadastro de Clientes</title>
  </head>
  <?php
      include("../conexao.php");
      // Verifica se o id foi enviado via GET
      if (isset($_GET['idUser'])) {
        // Protege contra injeção de SQL
        $id = mysqli_real_escape_string($conn, $_GET['idUser']);

        // Consulta a cliente com o id informado
        $query = "SELECT * FROM usuario WHERE idUser = '$id'";
        $busca = mysqli_query($conn, $query);

        // Verifica se a consulta retornou algum resultado
        if (mysqli_num_rows($busca) > 0) {
          $dados = mysqli_fetch_array($busca);
        } else {
          echo "Usuario não encontrada.";
          exit;
        }
      } else {
        echo "id não informado.";
        exit;
      }
    ?>
  <body>
    <form method="POST" action="../update/user.php">
      <h1>EDITAR USUARIO</h1>
      <label>ID:</label>
      <input type="text" id="id" name="id" value="<?php echo htmlspecialchars($dados['idUser']) ?>">
      <label>Nome:</label>
      <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($dados['nomeUser']) ?>" disabled>
      <label>Username:</label>
      <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($dados['username']) ?>" disabled>
      <label>Senha:</label>
      <input type="password" id="senha" name="senha" value="<?php echo htmlspecialchars($dados['password']) ?>">
      <button type="submit" class="btn btn-success">Editar</button>
    </form>
  </body>
</html>