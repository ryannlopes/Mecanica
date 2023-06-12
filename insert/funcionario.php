<?php
    //Incluindo Conexao
    include("../conexao.php");

    //Declarando as Variveis com os valores do Front
    $nome   = $_POST['nome'];
    $funcao   = $_POST['funcao'];
    $email  = $_POST['email'];
    $celular = $_POST['celular'];

    //Inserindo dados no banco via query
    $query = "INSERT INTO funcionario(nomeFuncionario, funcaoFuncionario, emailFuncionario, celularFuncionario) 
    VALUE  ('$nome', '$funcao', '$email', '$celular')";
    $busca = mysqli_query($conn, $query);
    header("Location: ../funcionario.php");
?>