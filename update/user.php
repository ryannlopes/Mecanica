<?php
// Arquivo: update.php
require_once '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Declarando as Variveis com os valores do Front
    $id    = $_POST['id'];
    $senha = $_POST['senha'];
    // atualiza registro no banco de dados
    $query = "UPDATE usuario SET password = '$senha'
    WHERE IdUser = '$id'";
    $resultado = mysqli_query($conn, $query);

    if ($resultado) {
        header("Location: ../views/user.php");
        exit();
    } else {
        // exibe mensagem de erro
        echo "Erro ao atualizar registro: " . mysqli_error($conn);
    }
} else {
    echo "Erro ao atualizar os dados do usuario.";
}
?>