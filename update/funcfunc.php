<?php
// Arquivo: update.php
require_once '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Declarando as Variveis com os valores do Front
    $id            = $_POST['id'];
    $funcionario   = $_POST['funcionario'];
    $funcao        = $_POST['funcao'];

    // atualiza registro no banco de dados
    $query = "UPDATE funcionarioFuncao SET id_funcionario = '$funcionario',id_funcao = '$funcao'
    WHERE Id = '$id'";
    $resultado = mysqli_query($conn, $query);

    if ($resultado) {
        header("Location: ../views/funcionario.php");
        exit();
    } else {
        // exibe mensagem de erro
        echo "Erro ao atualizar registro: " . mysqli_error($conn);
    }
} else {
    echo "Erro ao atualizar os dados da pessoa.";
}
?>