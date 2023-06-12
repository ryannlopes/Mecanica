<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Formulário de Cadastro de Clientes</title>
  </head>
  <body>
    <form method="POST" action="../insert/user.php">
      <h1>CADASTRO USUARIO</h1>
      <label>Nome:</label>
      <input type="text" id="nome" name="nome">
      <label>Username:</label>
      <input type="text" id="username" name="username">
      <label>Senha:</label>
      <input type="password" id="senha" name="senha">
      <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>
  </body>
</html>