<?php
// Arquivo: update.php
require_once '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Declarando as Variveis com os valores do Front
    $id        = $_POST['id'];
    $descricao = $_POST['descricao'];
    $valor     = $_POST['valor'];
    // atualiza registro no banco de dados
    $query = "UPDATE servico SET descricaoServico = '$descricao', valorServico = '$valor'
    WHERE IdServico = '$id'";
    $resultado = mysqli_query($conn, $query);

    if ($resultado) {
        header("Location: ../servico.php");
        exit();
    } else {
        // exibe mensagem de erro
        echo "Erro ao atualizar registro: " . mysqli_error($conn);
    }
} else {
    echo "Erro ao atualizar os dados do veiculo.";
}
?>