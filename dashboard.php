<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION["username"])) {
    header("Location: login/login.php"); // Redirecionar para a página de login se não estiver logado
    exit();
}

require("conexao.php");

// Exibir o nome de usuário na página de dashboard
$username = $_SESSION["username"];
$nome     = $_SESSION["nomeUser"];
// Consulta SQL para verificar as credenciais do usuário
     $query = "SELECT * FROM usuario WHERE username = '$username'";
              $busca = mysqli_query($conn, $query);

              while ($dados = mysqli_fetch_array($busca)) {
                $id = $dados['idUser'];
                $nome = $dados['nomeUser'];
              
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
   <?php require("nav.php");?>
    <h1>Bem-vindo, <?php echo $nome; }?>!</h1>
    <p>Esta é a página de dashboard.</p>
</body>
</html>
