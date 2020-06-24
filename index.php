<?php
session_start();
//********************************URL AMIGAVEL
$aux = substr( $_SERVER['REQUEST_URI'], strlen('/'));
if( substr( $aux, -1) == '/'){
  $aux=substr( $aux, 0, -1);
}
$urlARRAY___ =explode( '/', $aux);
//******VALORES
isset($urlARRAY___[0]) ? $_SESSION["raiz_secao"]	=	$urlARRAY___[0] : $_SESSION["raiz_secao"] = "";
isset($urlARRAY___[1]) ? $_SESSION["parametro1"]	=	$urlARRAY___[1] : $_SESSION["parametro1"] = "";
isset($urlARRAY___[2]) ? $_SESSION["parametro2"]	=	$urlARRAY___[2] : $_SESSION["parametro2"] = "";
isset($urlARRAY___[3]) ? $_SESSION["parametro3"]	=	$urlARRAY___[3] : $_SESSION["parametro3"] = "";
isset($urlARRAY___[4]) ? $_SESSION["parametro4"]	=	$urlARRAY___[4] : $_SESSION["parametro4"] = "";
isset($urlARRAY___[5]) ? $_SESSION["parametro5"]	=	$urlARRAY___[5] : $_SESSION["parametro5"] = "";
isset($urlARRAY___[6]) ? $_SESSION["parametro6"]	=	$urlARRAY___[6] : $_SESSION["parametro6"] = "";
			
if($_SESSION["parametro1"] == "")$_SESSION["parametro1"] = "home";
//********************************
require_once "_global.php";
//require_once "classes/Class_Mysql.php";
	
require_once "classes/Class_Produtos.php";
$produtos = new Produtos();	
	
if(isset($_POST["login"]) || $_SESSION["parametro2"] == "logof"){
	if($_SESSION["parametro1"] == md5("login-acao"))$_SESSION["parametro1"] = "_autenticacao_admin";
}


$template = $_SESSION["parametro1"];



//CONTROLE DE ROTAS *********************

switch ($_SESSION["parametro1"]){
		
		case "cadastrar-dados":
			require_once "classes/Class_Cadastrar.php";
		break;
		case "editar-dados":
			require_once "classes/Class_Editar.php";
		break;
		case "deletar-dados":
			require_once "classes/Class_Deletar.php";
		break;
		default:
			if (file_exists("templates/".$template.".php")) {
			    require_once "templates/".$template.".php";
			} else {
			    require_once "templates/_404.php";
			}
		break;
	}
?>