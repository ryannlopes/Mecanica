<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Formulário de Cadastro de Funcionário Função</title>
  </head>
  <body>
    <?php require("../nav.php");?>
    <form method="POST" action="../insert/funcfunc.php">
      <h1>CADASTRO FUNÇÃO FUNCIONARIO</h1>
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
        
      <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>
  </body>
</html>