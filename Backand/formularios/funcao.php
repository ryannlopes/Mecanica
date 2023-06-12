<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Formulário de Cadastro de Função</title>
  </head>
  <body>
    <?php require("../nav.php");?>
    <form method="POST" action="../insert/funcao.php">
      <h1>CADASTRO FUNÇÃO</h1>
      <label>Nome Função</label>
      <input type="text" id="nome" name="nome"> 
      <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>
  </body>
</html>