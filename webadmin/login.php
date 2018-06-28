<?php

session_start();

if(array_key_exists('Logged', $_SESSION) and $_SESSION['Logged']==true){
   echo "<meta http-equiv=\"refresh\" content=\"0; url=inicial.php\" />";
   exit();
}
else{
  if(array_key_exists('username', $_POST) and array_key_exists('password', $_POST)){
    if(areCorrect($_POST['username'], $_POST['password'])){
      $_SESSION['username']=$_POST['username'];
      $_SESSION['Logged']=true;
      echo "<meta http-equiv=\"refresh\" content=\"0; url=inicial.php\" />";
      exit();
    }
    else{
      $mensagem = "Erro! Nome de usuário ou senha incorretos";
    }
  }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
  <title>Login</title>


  <!-- CORE CSS-->

  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->
    <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/layouts/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="js/plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">

</head>

<body class="blue darken-4">

  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form" action="#" method="POST">
        <div class="row">
          <div class="input-field col s12 center">
            <img src="images/login-logo.png" alt="" class="circle responsive-img valign profile-image-login">
            <p class="center login-form-text">PapaFilas</p>
          </div>
        </div>

        <?php if(!empty($mensagem)){
          echo "<h4><p style=\"color:Red;\">$mensagem</p></h4>";
          echo "<br>";
        }
        ?>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="username" type="text" name="username">
            <label for="username" class="center-align">Nome de Usuário</label>
          </div>

        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" type="password" name="password">
            <label for="password">Senha</label>
          </div>
        </div>
        <div class="row">
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button type="submit" formmethod="POST" class="btn waves-effect waves-light col s12 green">Entrar</button>
          </div>
        </div>
      </form>
    </div>
  </div>



  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <!--prism-->
  <script type="text/javascript" src="js/plugins/prism/prism.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

      <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>

</body>

</html>
<?php
function areCorrect($username, $password){
  $loginData = array('NOME_ADMIN' => $username,
                    'SENHA_ADMIN' => $password);

  $encodedLoginInformation = json_encode($loginData);

  $requestLogin =  stream_context_create(array(
          'http' => array(
          'method' => 'POST',
          'header' => "Content-Type: application/json; charset=utf-8 \r\n",
          'content' => $encodedLoginInformation
      )
  ));


  $request = file_get_contents("http://35.199.101.182/api/webadmin/login", false, $requestLogin);
  $response = json_decode($request, true);
  $responseCode = substr($http_response_header[0], 9, 3);
  if($responseCode==200){
    return true;
  }
  else{
    return false;
  }
}
?>
