<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Formulário de Cadastro de Serviços</title>
  </head>
  <body>
    <?php require("../nav.php");?>
    <form method="POST" action="../insert/servico.php">
      <h1>CADASTRO Serviços</h1>
      <label>Descrição:</label>
      <input class="form-control"type="text" id="descricao" name="descricao">
      <label>Valor:</label>
      <input type="number" pattern="[0-9]+([,\.][0-9]+)?" id="valor" name="valor">
      <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>
  </body>
</html>