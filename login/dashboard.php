<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION["username"])) {
    header("Location: login.php"); // Redirecionar para a página de login se não estiver logado
    exit();
}

// Exibir o nome de usuário na página de dashboard
$username = $_SESSION["username"];
$nome     = $_SESSION["nomeUser"];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Bem-vindo, <?php echo $username ?>!</h1>

    <p>Esta é a página de dashboard.</p>

    <a href="logout.php">Logout</a>
</body>
</html>
