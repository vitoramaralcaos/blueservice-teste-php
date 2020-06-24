<?php
//session_start();
//*******************
//06/2020 VITOR AMARAL
//*******************


echo "Aguarde....";



	
	if($_SESSION["parametro2"] == "logof"){
		session_destroy();
		header("Location: ".ROOT_LIB."ad-login");
		die();
	}


//******************************


if(isset($_POST['acao'])){

	if($_POST['acao'] == md5("login")){

		$login	=	utf8_decode($_POST["inputLogin"]);
		$senha	=	md5($_POST["InputPassword"]);
		if($login == "" || $senha == ""){
			$_SESSION["msg_erro"] = "Login e Senha, são obrigatórios!";
			header("Location: ".ROOT_LIB."login/erro");
			die();
		}else{	
			//instancia classe Mysql
			$mysql = new Mysql();
			//busca dados no banco
			$resultado	= $mysql->Autenticacao($login,$senha);
			
			if($resultado != 0){
				
					$_SESSION["id_user"] = md5($resultado["id_user_sistema"]);
					$_SESSION["nome_user"] = utf8_encode($resultado["nome_completo"]);
					$_SESSION["perfil_user"] = $resultado["perfil"];
					if($resultado["foto"] == ""){
						$_SESSION["foto_user"] = FOTO_PADRAO_USER;
					}else{
						$_SESSION["foto_user"] = ROOT_LIB_IMG."usuarios/".$resultado["foto"];
					}
					$_SESSION['login'] = "ok";
					header("Location: ".ROOT_LIB."home");
					die();
				
			}else{
				$_SESSION["msg_erro"] = "Esse Login não foi encontrado!";
				header("Location: ".ROOT_LIB."login/erro");
				die();
			}
			
		}

	}
	else
	{
		$_SESSION["msg_erro"] = "Acesso negado!";
		header("Location: ".ROOT_LIB."login/erro");
		die();
	}

}
else
{
	$_SESSION["msg_erro"] = "Acesso negado!";
	header("Location: ".ROOT_LIB."login/erro");
	die();
}

?>