	<?php
define ('USER_NOT_FOUND', 1);
define ('ENROLLMENT_DROPPED',2);
define ('TOO_MUCH_CREDIT', 3);


session_start();
$_SESSION = array();
session_destroy();
session_start();

if (isset($_POST['NumberLote'])){
		$matricula=$_POST['NumberLote'];
		if (checkUserExists($matricula)){
      $usuario=getUser($matricula);
			$_SESSION['usuario']=$usuario;
			if (check_authorization($usuario)){
				echo "<META http-equiv=\"refresh\" content=\"1;URL=credito.php\">";
			  exit();
			}
			else{
				echo "<META http-equiv=\"refresh\" content=\"1;URL=erro.php\">";
				exit();

			}
		}
		else{
				$_SESSION['ERROR']=USER_NOT_FOUND;
				echo "<META http-equiv=\"refresh\" content=\"1;URL=erro.php\">";
				exit();
		}
}

function checkUserExists($regnum){
  $responsecode = getResponseCode($regnum);
  if ($responsecode == 200)
    return true;
  else
    return false;
}


function getResponseCode($regnum){
  $api_adress = 'http://35.199.101.182/api/usuarios/'.$regnum;
  $header = get_headers($api_adress);
  $code = substr($header[0], 9, 3);
  return $code;
}

function getUser($regnum){
	$api_adress = 'http://35.199.101.182/api/usuarios/';
	$api_adress = $api_adress.$regnum;
	$json_user = file_get_contents($api_adress);
	$user = json_decode($json_user, true);
	return $user;
}

function check_authorization ($user){
		 if ($user['ID_STATUS']==2){
		 	 $_SESSION['ERROR']=ENROLLMENT_DROPPED;
			 return false;
		 }

		 else{
			if ($user['SALDO']>=100){
				$_SESSION['ERROR']=TOO_MUCH_CREDIT;
				return false;
			}
			else{
				$_SESSION['saldo']=$user['SALDO'];
				return true;
			}
		 }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <title>comprar</title>

<!-- Importando google icons-->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- importando arquivos CSS-->
<link rel="stylesheet" href="css/materialize.min.css" />
<link rel="stylesheet" href="css/custom.css" />
<link rel="stylesheet" href="css/style.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/virtual-key.js"></script>
<link rel="stylesheet" type="text/css" href="css/virtual-key.css">
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


<!-- Style que força o espaçamento entre as tabelas e as bordas arredondadas -->
<style>
#table_s
{
    border-collapse: separate;
    border-spacing: 5px;
}
</style>

<!--  Style que força a centralização dos elementos que preenchem as células das tabelas-->
<style>

#alinhado
{
    text-align: center;
    align-content: center;
}

</style>

</head>

<body>

<!--Botão para voltar á pagina inicial -->
<div class="container">

  <div class="fixed-action-btn">
    <a href="index.php"  class="btn-floating btn-large blue darken-4">
      <iclass="large material-icons" class="material-icons"><i class="material-icons">keyboard_backspace</i>
    </a>
  </div>

</div>


<!-- Mensagem inicial-->
<div class="section no-pad-bot" id="index-banner">
  <div class="container">
  <br/>
  <br/>
<h1 class="header blue-text text-darken-4">Comprar créditos</h1>
  </div>


</div>

<!-- Input text-->
<div class="container">
  <div class="section">
    <br />
    <br />

<!-- Titulo + imput text matricula-->
    <h3 class="header blue-text text-darken-4">Insira sua matrícula:</h3>
    <br />
    <br />

   <div class="row center">
<div class="col s12 10">
    <div class="row">
		 <form action="comprar.php" method="POST">
     <input style="font-size: 40px" type="Number" readonly id="campo" placeholder="Matrícula" class="teclado_text" name="NumberLote">

	<table id="table_s" class="table_teclado">
		<tr style="width:70%; height: 150px; background-color: white">
			<td id="alinhado">1</td>
			<td id="alinhado">2</td>
			<td id="alinhado">3</td>
			<td id="alinhado">4</td>
		</tr>
		<tr style="width:70%; height: 150px">
			<td id="alinhado">5</td>
			<td id="alinhado">6</td>
			<td id="alinhado">7</td>
			<td id="alinhado">8</td>

		</tr>
		<tr style="width:70%; height: 150px">
			<td id="alinhado">9</td>
			<td id="alinhado">0</td>
			<td id="alinhado">.</td>
			<td id="alinhado"><span><i class="fa fa-arrow-left"></i></span></td>
		</tr>
	</table>
   </div>
</div>

<!-- Botão submit -->

  <div class="row">
    <div class="col s12 m12 l12">
    </div>
      <a href="credito.php">
      <button type="submit" formmethod="post" class="round btn waves-effect box" style="width:98%; height: 150px; font-size:40px" name="button">Enviar</button>
      </a>
      </div>
    </div>
<!--Botão submit -->







<script src="js/index.js"></script>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script src="js/materialize.js"></script>
<script  type="text/javascript" src="js/materialize.min.js"></script>
<script>
$(document).ready(function() {
   $('input#input_text, textarea#textarea2').characterCounter();
 });

</script>
</body>

</html>
