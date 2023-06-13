<?php
    //Incluindo Conexao
    include("../conexao.php");

    //Declarando as Variveis com os valores do Front
    $placa   = $_POST['placa'];
    $modelo  = $_POST['modelo'];
    $ano     = $_POST['ano'];
    $cliente = $_POST['cliente'];

    //Inserindo dados no banco via query
    $query = "INSERT INTO veiculo(placaVeiculo, modeloVeiculo, anoVeiculo, fkIdCliente) 
    VALUE  ('$placa', '$modelo', '$ano', '$cliente')";
    $busca = mysqli_query($conn, $query);
    header("Location: ../views/veiculo.php");
?>