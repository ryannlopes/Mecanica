<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Formulário de Cadastro de Funcionário</title>
  </head>
  <body>
    <?php require("../nav.php");?>
    <form method="POST" action="../insert/funcionario.php">
      <h1>CADASTRO FUNCIONÁRIO</h1>
      <label>Nome:</label>
      <input type="text" id="nome" name="nome">
      <label>E-mail:</label>
      <input type="email" id="email" name="email">
      <label>Celular:</label>
      <input type="number" id="celular" name="celular">
      <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>
  </body>
</html>