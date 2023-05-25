<?php

include'conexao.php';

// is set 
if(isset($_POST['sub'])){
    $user=$_POST['user'];
    $senha=$_POST['senha'];
    
   $query= "select * from usuario where user='$user' and senha = '$senha'";   
   $link= mysqli_query($conn, $query);
   if(mysqli_num_rows($link)>0){
      $f= mysqli_fetch_assoc($link);
      $_SESSION['id']=$f['id'];
      header ('location:administrativo.php');
   }
   else{
       echo 'Usuario Ou senha Não existe';
   }
  
}
?>
<html>
      
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1> Login - TEST </h1>
        <form method="POST" enctype="multipart/form-data">
            <table>
                
                <tr>
                    <td>
                        Usuario
                        <input type="text" name="user">
                    </td>
                </tr>
                <tr>
                    <td>
                        Senha
                        <input type="password" name="senha">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="sub" value="submit">
                    </td>
                    <td>
                        <a href="">cadastrar</a>
                    </td>
                    
                </tr>
            </table>
    </body>
</html>
