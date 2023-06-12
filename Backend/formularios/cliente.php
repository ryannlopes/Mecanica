<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Formulário de Cadastro de Clientes</title>
  </head>
  <body>
    <?php require("../nav.php");?>
    <form method="POST" action="../insert/cliente.php">
      <h1>CADASTRO CLIENTE</h1>
      <label for="nome">Nome:</label>
      <input type="text" id="nome" name="nome">
      <label for="email">E-mail:</label>
      <input type="text" id="email" name="email">
      <label for="email">Celular:</label>
      <input type="number" id="celular" name="celular">
      <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>
  </body>
</html>