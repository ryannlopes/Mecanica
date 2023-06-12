<?php
    //Incluindo Conexao
    include("../conexao.php");

    //Declarando as Variveis com os valores do Front
    $descricao   = $_POST['descricao'];
    $valor   = $_POST['valor'];

    //Inserindo dados no banco via query
    $query = "INSERT INTO servico(descricaoServico, valorServico) 
    VALUE  ('$descricao', '$valor')";
    $busca = mysqli_query($conn, $query);
    header("Location: ../servico.php");
?>