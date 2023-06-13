<?php
    //Incluindo Conexao
    include("../conexao.php");

    //Declarando as Variveis com os valores do Front
    $nome   = $_POST['nome'];

    //Inserindo dados no banco via query
    $query = "INSERT INTO funcao(nomeFuncao) VALUE  ('$nome')";
    $busca = mysqli_query($conn, $query);
    header("Location: ../views/funcionario.php");
?>