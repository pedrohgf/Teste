<?php

session_start();
if(!(array_key_exists('Logged', $_SESSION) and $_SESSION['Logged']==true)){
   echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\" />";
  exit();
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
  <title>Cardápio</title>

  <!-- Favicons-->
  <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- Custome CSS-->
  <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="js/plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
</head>

<body>
  <!-- Start Page Loading -->

  <!-- End Page Loading -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START HEADER -->
  <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="navbar  blue darken-4">
                <div class="nav-wrapper">
                  <div class="nav-wrapper blue darken-4">
                      <h4 class="brand-logo">Administrador</h4>
                    </div>
            </nav>
        </div>
        <!-- end header nav-->
  </header>
  <!-- END HEADER -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

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
                <h5 class="breadcrumbs-title">Cardápio</h5>
                <ol class="breadcrumbs">
                    <li><a href="index.html">Página Inicial</a></li>
                    <li class="active">Cardápio</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <div class="section">

            <p class="caption">Cardápio</p>
            <div class="divider"></div>
            <div>
              <!-- ESCREVA AQUI SUAS DIVS-->
              <!-- Modal Trigger -->
                 <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Inserir Cardápios</a>

              <!-- Modal Structure -->
<form class="insert-form" action="insere_cardapio.php" method="POST">
               <div id="modal1" class="modal">
                    <div class="modal-content">
                        <h4>Insira as informações do seu cardápio</h4>
						<br><br>
						<div class="col s6 m3">

                        <div class="col s3">
				         <h5>Data do Cardápio</h5>

						 <input  id="data" name="data" type="date" class="validate">

						<br><br>
                        <h5>Desejum</h5>
						 <div class="row">
                        <div class="row">
                        <div class="input-field col s6">
                           <input placeholder="Bebidas Quentes" name="bebidas_q_1" id="bebidas_q_1" type="text" class="validate">

                        </div>
                       <div class="input-field col s6">
                         <input placeholder="Bebidas Quentes Vegano" name="bebidas_q_veg_1" id="bebidas_q_veg_1" type="text" class="validate">

                       </div>
					   <div class="input-field col s6">
                         <input placeholder="Pão" name="pao_1" id="pao_1" type="text" class="validate">

                       </div>
					   <div class="input-field col s6">
                         <input placeholder="Pão Vegano" name="pao_veg_1" id="pao_veg_1" type="text" class="validate">

                       </div>

					   <div class="input-field col s6">
                         <input placeholder="Achocolatado" name="achocolatado_1" id="achocolatado_1" type="text" class="validate">

                       </div>

					   <div class="input-field col s6">
                         <input placeholder="Complemento" name="complemento_1" id="complemento_1" type="text" class="validate">

                       </div>
					   <div class="input-field col s6">
                         <input placeholder="Complemento Vegano" name="complemento_veg_1" id="complemento_veg_1" type="text" class="validate">

                       </div>
					   <div class="input-field col s6">
                         <input placeholder="Proteína" name="proteina_1" id="proteina_1" type="text" class="validate">

                       </div>
					   <div class="input-field col s6">
                         <input placeholder="Proteína Vegana" name="proteina_veg_1" id="proteina_veg_1" type="text" class="validate">

                       </div>
					   <div class="input-field col s6">
                         <input placeholder="Fruta" name="fruta_1" id="fruta_1" type="text" class="validate">

                       </div>
					   </div>
					   <br><br>
					   <h5>Almoço</h5>

                        <div class="row">
                        <div class="input-field col s6">
                           <input placeholder="Salada" name="salada_2" id="salada_2" type="text" class="validate">

                        </div>
                       <div class="input-field col s6">
                         <input placeholder="Molho" name="molho_2" id="molho_2" type="text" class="validate">

                       </div>
					   <div class="input-field col s6">
                         <input placeholder="Prato Principal" name="prato_principal_2" id="prato_principal_2" type="text" class="validate">

                       </div>
					   <div class="input-field col s6">
                         <input placeholder="Guarnição" name="guarnicao_2" id="guarnicao_2" type="text" class="validate">

                       </div>
					   <div class="input-field col s6">
                         <input placeholder="Prato Vegano" name="prato_veg_2" id="prato_veg_2" type="text" class="validate">

                       </div>
					   <div class="input-field col s6">
                         <input placeholder="Acompanhamentos" name="acompanhamentos_2" id="acompanhamentos_2" type="text" class="validate">

                       </div>
					   <div class="input-field col s6">
                         <input placeholder="Sobremesa" name="sobremesa_2" id="sobremesa_2" type="text" class="validate">

                       </div>
					   <div class="input-field col s6">
                         <input placeholder="Refresco" name="refresco_2" id="refresco_2" type="text" class="validate">

                       </div>
					   </div>
					   <br><br>
					   <h5>Jantar</h5>

                        <div class="row">
                        <div class="input-field col s6">
                           <input placeholder="Salada" name="salada_3" id="salada_3" type="text" class="validate">

                        </div>
                       <div class="input-field col s6">
                         <input placeholder="Molho" name="molho_3" id="molho_3" type="text" class="validate">

                       </div>
					   <div class="input-field col s6">
                         <input placeholder="Sopa" name="sopa_3" id="sopa_3" type="text" class="validate">

                       </div>
					   <div class="input-field col s6">
                         <input placeholder="Pão" name="pao_3" id="pao_3" type="text" class="validate">

                       </div>
					   <div class="input-field col s6">
                         <input placeholder="Prato Principal" name="prato_principal_3" id="prato_principal_3" type="text" class="validate">

                       </div>
					   <div class="input-field col s6">
                         <input placeholder="Guarnição" name="guarnicao_3" id="guarnicao_3" type="text" class="validate">

                       </div>
					   <div class="input-field col s6">
                         <input placeholder="Prato Vegano" name="prato_veg_3" id="prato_veg_3" type="text" class="validate">

                       </div>
					   <div class="input-field col s6">
                         <input placeholder="Complementos" name="complementos_3" id="complementos_3" type="text" class="validate">

                       </div>
					   <div class="input-field col s6">
                         <input placeholder="Sobremesa" name="sobremesa_3" id="sobremesa_3" type="text" class="validate">
                       </div>
					   <div class="input-field col s6">
                       <input placeholder="Refresco" name="refresco_3" id="refresco_3" type="text" class="validate">

                       </div>
					   </div>

		    </div>
			<br><br>
                  <div class="modal-footer">
                   <button type="submit" formmethod="POST" style="background-color:DodgerBlue;color:white; width: 150px; height: 100%; border: 2px solid #eee;">Enviar</button>
                  </div>
                </form>
             </div>

            </div>

          </div>
        </div>
        <!--end container-->
      </section>
      <!-- END CONTENT -->
    </div>
  </div>**







    <!-- ================================================
    Scripts
    ================================================ -->

    <!-- jQuery Library -->
    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <!--prism
    <script type="text/javascript" src="js/prism/prism.js"></script>-->
    <!--scrollbar-->
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- chartist -->
    <script type="text/javascript" src="js/plugins/chartist-js/chartist.min.js"></script>

    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>

</body>

</html>
