<?php
// Arquivo: update.php
require_once '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Declarando as Variveis com os valores do Front
    $id      = $_POST['id'];
    $nome    = $_POST['nome'];
    $email   = $_POST['email'];
    $celular = $_POST['celular'];

    // atualiza registro no banco de dados
    $query = "UPDATE cliente SET nomeCliente = '$nome', emailCliente = '$email', celularCliente = '$celular' WHERE IdCliente = '$id'";
    $resultado = mysqli_query($conn, $query);

    if ($resultado) {
        header("Location: ../cliente.php");
        exit();
    } else {
        // exibe mensagem de erro
        echo "Erro ao atualizar registro: " . mysqli_error($conn);
    }
} else {
    echo "Erro ao atualizar os dados da pessoa.";
}
?>