<?php
    //Incluindo Conexao
    include("../conexao.php");

    //Declarando as Variveis com os valores do Front
    $funcionario  = $_POST['funcionario'];
    $funcao = $_POST['funcao'];
    //Inserindo dados no banco via query
    $query = "INSERT INTO funcionariofuncao(id_funcionario, id_funcao) 
    VALUE  ('$funcionario', '$funcao')";
    $busca = mysqli_query($conn, $query);
    header("Location: ../funcionario.php");
?>