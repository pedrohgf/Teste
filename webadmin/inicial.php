<?php

session_start();

if(!(array_key_exists('Logged', $_SESSION) and $_SESSION['Logged']==true)){
   echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\" />";
  exit();
}
if (!empty($_GET['resetStats']) and $_GET['resetStats']==1){
  resetStats();
  unset($_GET);
  echo '<script type="text/javascript">';
  echo 'setTimeout(function () { swal({
  title: "Sucesso!",
  text: "As estatísticas foram zeradas com sucesso!",
  type: "success"
},
function(){
    window.location.href = \'inicial.php\';
});';
  echo '}, 1000);</script>';
}

function resetStats(){
  $api_address = 'http://www.dandico.com.br/api/refeitorio/inicializa';
  $request = file_get_contents($api_address);
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
  <title>Página Inicial</title>


  <!-- CORE CSS-->
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- Custome CSS-->
  <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="js/plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link rel="stylesheet" type="text/css" href="js\plugins\sweetalert\sweetalert.css">
  <script type="text/javascript" src="js\plugins\sweetalert\sweetalert.min.js"></script>
</head>

<body>

  <header id="header" class="page-topbar">
        <!--NavBar-->
        <div class="navbar-fixed">
            <nav>
            <div class="nav-wrapper blue darken-4">
                <h4 class="brand-logo">Administrador</h4>
            </div>
          </nav>
        </div>
        <!--NavBar-->
  </header>

  <!-- START MAIN -->
  <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

      <!-- START LEFT SIDEBAR NAV-->
      <aside id="left-sidebar-nav">
        <ul id="slide-out" class="side-nav fixed leftside-navigation">
            <li class="user-details cyan darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="" alt="" class="circle responsive-img valign profile-image">
                </div>
                <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown" class="dropdown-content">
                        <li><a href="logout.php"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                        </li>
                        <li><a href="user-register.php"><i class="mdi-content-add"></i>Add</a>
                        </li>
                    </ul>
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $_SESSION['username']; ?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                    <p class="user-roal">Administrator</p>
                </div>
            </div>
            </li>
            <!-- Aqui começa a navbar lateral-->
            <li class="bold"><a href="inicial.php" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Página Inicial</a>
            </li>

            <li class="bold"><a href="propaganda.php" class="waves-effect waves-cyan"><i class="mdi-action-visibility"></i>Propagandas</a>
            </li>

            <li class="bold"><a href="access_list.php" class="waves-effect waves-cyan"><i class=" mdi-av-recent-actors"></i>Lista de acessos</a>
            </li>
            <li class="bold"><a href="user_list.php" class="waves-effect waves-cyan"><i class="mdi-action-face-unlock"></i>Lista de usuarios</a>
            </li>

            <li class="bold"><a href="usuario.php" class="waves-effect waves-cyan"><i class="mdi-action-info-outline"></i>Usuário</a>
            </li>

            <li class="bold"><a href="cardapio.php" class="waves-effect waves-cyan"><i class="mdi-action-description"></i>Cardápio</a>
            </li>
            </ul>
            </div>


                    <!-- acaba aqui por enquanto-->
            </aside>
      <!-- END LEFT SIDEBAR NAV-->

      <!-- //////////////////////////////////////////////////////////////////////////// -->

      <!-- START CONTENT -->
      <section id="content">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
            <!-- Search for small screen -->
            <div class="header-search-wrapper grey hide-on-large-only">
                <i class="mdi-action-search active"></i>
                <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
            </div>
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h4 class="breadcrumbs-title">Seja Bem-Vindo!</h4>
                <ol class="breadcrumbs">
                    <li><a href="inicial.html">Página Inicial</a></li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <div class="section">
            <div>
              <!-- ESCREVA AQUI SUAS DIVS-->


                  <!--Cards iniciais -->
                  <div class="row">
                  <div class="col s12 m4">
                    <div class="card small">
                      <div class="card-image">
                        <img src="images/cadeado.png">
                      </div>
                      <div class="card-content black-text">
                      <p class="black-text">Acesse a página para abrir/fechar restaurantes</p>
                    </div>
                      <div class="card-action">
                        <a href="inicial.php?resetStats=1">Abrir/Fechar restaurante</a>
                      </div>
                    </div>
                  </div>

                  <div class="col s12 m4">
                    <div class="card small">
                      <div class="card-image">
                        <img src="images/olho.png">
                      </div>
                      <div class="card-content black-text">
                      <p class="black-text">Acesse o gerenciamento de propagandas</p>
                    </div>
                      <div class="card-action">
                        <a href="propaganda.php">Gerenciar propagandas</a>
                      </div>
                    </div>
                  </div>

                  <div class="col s12 m4">
                    <div class="card small">
                      <div class="card-image">
                        <img src="images/lista.png">
                      </div>
                      <div class="card-content black-text">
                      <p class="black-text">Confira a Lista de Usuários</p>
                    </div>
                      <div class="card-action">
                        <a href="user_list.php">Usuários</a>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>




              <!-- Cards iniciais-->
              <!--Cards iniciais -->
              <br>
              <br>

              <div class="row">
              <div class="col s12 m4">
                <div class="card small">
                  <div class="card-image">
                    <img src="images/bluelist.png">
                  </div>
                  <div class="card-content black-text">
                  <p class="black-text">Confira a Lista de Acessos</p>
                </div>
                  <div class="card-action">
                    <a href="access_list.php">Lista de Acessos</a>
                  </div>
                </div>
              </div>

              <div class="col s12 m4">
                <div class="card small">
                  <div class="card-image">
                    <img src="images/user.png">
                  </div>
                  <div class="card-content black-text">
                  <p class="black-text">Gerencie os Usuários</p>
                </div>
                  <div class="card-action">
                    <a href="usuario.php">Usuários Comuns</a>
                    <a href="user-register.php">Adicionar Administrador</a>
                  </div>
                </div>
              </div>

              <div class="col s12 m4">
                <div class="card small">
                  <div class="card-image">
                    <img src="images/food.png">
                  </div>
                  <div class="card-content black-text">
                  <p class="black-text">Informar o Cardápio do Dia</p>
                </div>
                  <div class="card-action">
                    <a href="cardapio.php">Cardápio</a>
                  </div>
                </div>
              </div>
            </div>




          <!-- Cards iniciais-->


              <!--Card tempo de fila  -->

              <!-- Card tempo de fila-->
        </div>
        <!--end container-->
      </section>
      <!-- END CONTENT -->
    </div>
  </div>




  <!-- //////////////////////////////////////////////////////////////////////////// -->



    <!-- ================================================
    Scripts
    ================================================ -->

    <!-- jQuery Library -->
    <!-- jQuery Library -->
    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>


    <!-- chartist -->
    <script type="text/javascript" src="js/plugins/chartist-js/chartist.min.js"></script>

    <!-- chartjs -->
    <script type="text/javascript" src="js/plugins/chartjs/chart.min.js"></script>
    <script type="text/javascript" src="js/plugins/chartjs/chart-script.js"></script>

    <!-- sparkline -->
    <script type="text/javascript" src="js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="js/plugins/sparkline/sparkline-script.js"></script>

    <!-- google map api -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAZnaZBXLqNBRXjd-82km_NO7GUItyKek"></script>

    <!--jvectormap-->
    <script type="text/javascript" src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script type="text/javascript" src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script type="text/javascript" src="js/plugins/jvectormap/vectormap-script.js"></script>

    <!--google map-->
    <script type="text/javascript" src="js/plugins/google-map/google-map-script.js"></script>


    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>

    </script>

</body>

</html>
