<?php
// Arquivo: update.php
require_once '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Declarando as Variveis com os valores do Front
    $id      = $_POST['id'];
    $placa   = $_POST['placa'];
    $modelo  = $_POST['modelo'];
    $ano     = $_POST['ano'];
    $cliente = $_POST['cliente'];
    // atualiza registro no banco de dados
    $query = "UPDATE veiculo SET placaVeiculo = '$placa', modeloVeiculo = '$modelo', anoVeiculo = '$ano', fkIdCliente = '$cliente' 
    WHERE IdVeiculo = '$id'";
    $resultado = mysqli_query($conn, $query);

    if ($resultado) {
        header("Location: ../views/veiculo.php");
        exit();
    } else {
        // exibe mensagem de erro
        echo "Erro ao atualizar registro: " . mysqli_error($conn);
    }
} else {
    echo "Erro ao atualizar os dados do veiculo.";
}
?>