<?php
session_start();

// Verificar se o formulário de login foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require("../conexao.php");

    // Obter os valores do formulário de login
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Consulta SQL para verificar as credenciais do usuário
    $sql = "SELECT * FROM usuario WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    // Verificar se o usuário foi encontrado no banco de dados
    if ($result->num_rows == 1) {
        // Login bem-sucedido
        $_SESSION["username"] = $username;
        $_SESSION["nomeUser"] = $nome;
        header("Location: ../dashboard.php"); // Redirecionar para a página de dashboard ou página protegida
    } else {
        // Login inválido
        $error = "Nome de usuário ou senha inválidos";
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Login</title>
</head>
<body>
    <h1>Sistema de Login</h1>

    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="username">Usuário:</label>
        <input type="text" name="username" id="username" required>

        <br><br>

        <label for="password">Senha:</label>
        <input type="password" name="password" id="password" required>

        <br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
