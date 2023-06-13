<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION["username"])) {
    header("Location: ../login/login.php"); // Redirecionar para a página de login se não estiver logado
    exit();
}

require('../conexao.php');

// Exibir o nome de usuário na página de dashboard
$username = $_SESSION["username"];
$nome     = $_SESSION["nomeUser"];
// Consulta SQL para verificar as credenciais do usuário
     $query = "SELECT * FROM usuario WHERE username = '$username'";
              $busca = mysqli_query($conn, $query);

              while ($dados = mysqli_fetch_array($busca)) {
                $id = $dados['idUser'];
                $nome = $dados['nomeUser'];
              }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Mecânica FGR
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
      <div class="logo"><a href="#" class="simple-text logo-normal">
        Mecânica FGR
        </a></div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li class="nav-item  ">
              <a class="nav-link" href="./dashboard.php">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="./cliente.php">
                <i class="material-icons">people</i>
                <p>Clientes</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="./veiculo.php">
                <i class="material-icons">directions_car</i>
                <p>Veículos</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="./funcionario.php">
                <i class="material-icons">supervisor_account</i>
                <p>Funcionários</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="./servico.php">
                <i class="material-icons">construction</i>
                <p>Serviços</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="./usuario.php">
                <i class="material-icons">manage_accounts</i>
                <p>Usuários</p>
              </a>
            </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="d-flex align-items-center justify-content-center">
                    <i class="material-icons">person</i>
                    <h1 style="font-size: 15px; margin: 0; text-transform: capitalize;"><?php echo $nome; ?></h1>
                  </div>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="../login/logout.php" style="padding: 3px 3px;"><i class="material-icons">close</i>Sair</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header card-header-primary">
                  <h4 class="card-title mt-0">Clientes</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class="">
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Fone</th>
                        <th></th>
                        <th>
                          <a type="button" href="../forms/formCliente.php" rel="tooltip" title="Adicionar" style="margin-left: 18px;">
                            <i class="material-icons" style="padding-right: 30px;">add</i></th>
                          </a>
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <?php
                          require('../conexao.php');

                          $query = "SELECT * FROM cliente";
                          $busca = mysqli_query($conn, $query);

                          while ($dados = mysqli_fetch_array($busca)) {
                              $id = $dados['idCliente'];
                          ?>
                          <td><?php echo $dados['idCliente'] ?></td>
                          <td><?php echo $dados['nomeCliente'] ?></td>
                          <td><?php echo $dados['emailCliente'] ?></td>
                          <td><?php echo $dados['celularCliente'] ?></td>
                          <td style="width: 5%">
                            <a href="../forms/editCliente.php?idCliente=<?php echo $dados['idCliente']; ?>">
                              <button type="button" rel="tooltip" title="Editar" class="btn btn-white btn-link btn-sm">
                                <i class="material-icons" style="padding-right: 25px;">edit</i>
                              </button>
                            </a>
                          </td>
                          <td style="width: 5%">
                            <a href="../delete/cliente.php?idCliente=<?php echo $dados['idCliente']?>">
                              <button type="button" rel="tooltip" title="Excluir" class="btn btn-white btn-link btn-sm">
                                <i class="material-icons" style="padding-right: 30px;">delete</i>
                              </button>
                            </a>
                          </td>
                        </tr>

                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
        const x = new Date().getFullYear();
        let date = document.getElementById('date');
        date.innerHTML = '&copy; ' + x + date.innerHTML;
      </script>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="https://unpkg.com/default-passive-events"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.0"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
</body>

</html>