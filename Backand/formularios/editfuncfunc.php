<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Formulário de Cadastro de Funcionário</title>
  </head>
  <body>
    <?php require("../nav.php");?>
    <form method="POST" action="../update/funcfunc.php">
    <?php
      include("../conexao.php");
      // Verifica se o id foi enviado via GET
      if (isset($_GET['id'])) {
        // Protege contra injeção de SQL
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        // Consulta a cliente com o id informado
        $query = "SELECT * FROM funcionarioFuncao WHERE id = '$id'";
        $busca = mysqli_query($conn, $query);

        // Verifica se a consulta retornou algum resultado
        if (mysqli_num_rows($busca) > 0) {
          $dados = mysqli_fetch_array($busca);
        } else {
          echo "Relatorio não encontrada.";
          exit;
        }
      } else {
        echo "id não informado.";
        exit;
      }
    ?>
      <h1>EDITAR FUNCIONÁRIO FUNÇÕES</h1>
      <label>ID:</label>
      <input type="text" id="id" name="id" value="<?php echo htmlspecialchars($dados['id']) ?>">
      <select name="funcionario">
        <?php
        require('../conexao.php');

        $query = "SELECT * FROM funcionario";
        $busca = mysqli_query($conn, $query);

        while ($dados = mysqli_fetch_array($busca)) {
            $id = $dados['idFuncionario'];
        ?>
        <option value="<?php echo $dados['idFuncionario'];?>"><?php echo $dados['nomeFuncionario']; ?></option>
        <?php } ?>
        </select>
        <select name="funcao">
        <?php
        require('../conexao.php');

        $query = "SELECT * FROM funcao";
        $busca = mysqli_query($conn, $query);

        while ($dados = mysqli_fetch_array($busca)) {
            $id = $dados['idFuncao'];
        ?>
        <option value="<?php echo $dados['idFuncao'];?>"><?php echo $dados['nomeFuncao']; ?></option>
        <?php } ?>
        </select>
      <button type="submit" class="btn btn-success">Editar</button>
    </form>
  </body>
</html>