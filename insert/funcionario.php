<?php
    //Incluindo Conexao
    include("../conexao.php");

    //Declarando as Variveis com os valores do Front
    $nome   = $_POST['nome'];
    $email  = $_POST['email'];
    $celular = $_POST['celular'];

    //Inserindo dados no banco via query
    $query = "INSERT INTO funcionario(nomeFuncionario, emailFuncionario, celularFuncionario) 
    VALUE  ('$nome', '$email', '$celular')";
    $busca = mysqli_query($conn, $query);
    header("Location: ../views/funcionario.php");
?>