<?php
	if(isset($_SESSION['perfil_admin']) && isset($_SESSION["sessao_token"]) && $_SESSION["sessao_token"] == md5($_SESSION["id_usuario"])){
		//NAO FAZ NADA, E LIBERA O ACESSO AO ADMIN
	}else{
		session_destroy();
		header("Location: ".ROOT_LIB."ad-login");
		die();
	}
?>