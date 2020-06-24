<?php
//session_start();
//***********
//**** 06/2020 - VITOR AMARAL	
//***********
$acao = "";

if(isset($_GET["acao"]))$acao = $_GET["acao"];
if(isset($_POST["acao"]))$acao = $_POST["acao"];
//*********** DECLARACOES DE CLASSES ESTAO NO FINAL DO ARQUIVO *******

if($acao == ""){
	require_once "_global.php";
	require_once "classes/Class_Mysql.php";
}else{
	require_once "../_global.php";
	require_once "../classes/Class_Mysql.php";
}


Class Admin extends Mysql {
	
	function Login()
	{
		$login = $_POST["inputLogin"];
		$senha = md5($_POST["inputPassword"]);
		
		$conn = $this->Conexao();
		try {  
		      
		    $stmt = $conn->prepare('SELECT * FROM tb_usuario_admin WHERE login = ? AND senha = ?');
		    $stmt->bindParam(1, $login, PDO::PARAM_STR);
		    $stmt->bindParam(2, $senha, PDO::PARAM_STR);
		    $stmt->execute();
		  
			$num = $stmt->rowCount();
			if($num == 0){
				 $dados = [
				        'status' => 'erro',
				        'msg' => "<span class='help-block text-danger'>Login ou Senha incorretos!</span>"
				    ];
			}else{
				$row = $stmt->fetch();
				session_start();
				$_SESSION["id_usuario"] = $row["id_usuario"];
				$_SESSION["nome_usuario"] = $row["nome"];
				$_SESSION["perfil_admin"] = "ok";
				$_SESSION["sessao_token"] = md5($row["id_usuario"]);

				
				$dados = [
				        'status' => 'ok',
				        'msg' => "<span class='btn-success btn-circle'><i class='fas fa-check'></i></span>",
				        'url' => ROOT_LIB."ad-home"
				    ];
			}
			echo json_encode($dados);
			
		} catch(PDOException $e) {
		    $dados = [
				        'status' => 'erro',
				        'msg' => "<span class='help-block text-danger'>Não foi possível efetuar o login!</span>"
				    ];
			echo json_encode($dados);
		}
		
	}
//********************************CATEGORIAS DE PRODUTOS *********************	
	function Lista_Produtos_Categorias()
	{
		$status = 1;// ATIVOS
		$conn = $this->Conexao();
		try {  
		      
		    $stmt = $conn->prepare('SELECT * FROM tb_categorias WHERE status = ? ORDER BY nome');
		    $stmt->bindParam(1, $status, PDO::PARAM_STR);
		    $stmt->execute();
		  
			return $stmt;
			
		} catch(PDOException $e) {
		    return 'Não foi possível buscar as categorias';
		}
	}
	function Cadastrar_Categoria()
	{
		$status = 1;// ATIVOS
		$nome_categoria = utf8_decode($_POST["nome"]);
		$url_amigavel = $this->Tirar_Acentos($_POST["nome"]);
		$conn = $this->Conexao();
		try {  
		      
		    $sql = $conn->prepare("INSERT INTO tb_categorias (nome,status,url_amigavel) VALUES (? ,?, ?)");
			$sql->bindParam(1, $nome_categoria);
			$sql->bindParam(2, $status);
			$sql->bindParam(3, $url_amigavel);
			$sql->execute();
		  
			echo "ok";
			
		} catch(PDOException $e) {
		    echo "erro: ".$e;
		}
	}
	function Deletar_Categoria()
	{
		$conn = $this->Conexao();
		$status = 99;//STATUS DELETADO
		$id	= $_POST["id"];
		
		
				try {  

				    $sql = $conn->prepare("UPDATE tb_categorias SET status=? WHERE md5(id_categoria)=?");
				          
					$sql->bindParam(1, $status);
					$sql->bindParam(2, $id);
				    
					
					$sql->execute();
					
					echo "ok";
					die();
		
				} catch(PDOException $e) {
					$erro = $e->getMessage();
					echo "erro ".$erro;
				    die();
				}
	}
	function Editar_Categoria()
	{
		$conn = $this->Conexao();
		$nome	= utf8_decode($_POST["nome"]);
		$url_amigavel = $this->Tirar_Acentos($_POST["nome"]);
		$id	= $_POST["id"];
		
		
				try {  

				    $sql = $conn->prepare("UPDATE tb_categorias SET nome=?,url_amigavel=? WHERE md5(id_categoria)=?");
				          
					$sql->bindParam(1, $nome);
					$sql->bindParam(2, $url_amigavel);
				    $sql->bindParam(3, $id);
					
					$sql->execute();
					
					echo "ok";
					die();
		
				} catch(PDOException $e) {
					$erro = $e->getMessage();
					echo "erro ".$erro;
				    die();
				}
	}
//********************************PRODUTOS *********************
	function Lista_Produtos()
	{
		$status = 99;// DELETADOS
		$conn = $this->Conexao();
		try {  
		      
		    $stmt = $conn->prepare('
		    	SELECT prod.*,
				(
					SELECT
						IF(GROUP_CONCAT(cat.nome SEPARATOR ",")!="",GROUP_CONCAT(cat.nome SEPARATOR ", "),"Nenhum relacionado!") as categorias 
					FROM 
						tb_categorias cat 
					WHERE 
						prod.id_categorias 
							LIKE 
							concat("%",cat.id_categoria,"%")
				) as categorias
				FROM 
					tb_produtos prod 
				WHERE 
				 	prod.status != ?
				ORDER BY 
					prod.nome ASC
		    ');
		    $stmt->bindParam(1, $status, PDO::PARAM_STR);
		    $stmt->execute();
		  
			return $stmt;
			
		} catch(PDOException $e) {
		    return 'Não foi possível buscar os produtos';
		}
	}
	function Lista_Produtos_ID($id)
	{
		$status = 99;// DELETADOS
		$conn = $this->Conexao();
		try {  
		      
		    $stmt = $conn->prepare('
		    	SELECT prod.*,
				(
					SELECT
						IF(GROUP_CONCAT(cat.nome SEPARATOR ",")!="",GROUP_CONCAT(cat.nome SEPARATOR ", "),"Nenhum relacionado!") as categorias 
					FROM 
						tb_categorias cat 
					WHERE 
						prod.id_categorias 
							LIKE 
							concat("%",cat.id_categoria,"%")
				) as categorias
				FROM 
					tb_produtos prod 
				WHERE 
				 	prod.status != ? AND md5(prod.id_produto) = ?
				ORDER BY 
					prod.nome ASC
		    ');
		    $stmt->bindParam(1, $status, PDO::PARAM_STR);
		    $stmt->bindParam(2, $id);
		    $stmt->execute();
		  
			return $stmt;
			
		} catch(PDOException $e) {
		    return 'Não foi possível buscar os produtos';
		}
	}
	function Cadastrar_Produto()
	{
		$status 		= 1;// ATIVOS
		$nome 			= utf8_decode($_POST["nome_produto"]);
		$url_amigavel 	= $this->Tirar_Acentos($_POST["nome_produto"]);
		$descricao 		= utf8_decode($_POST["descricao_produto"]);
		$imagem			= "imagem-produto.jpg"; //IMAGEM FIXA PORQUE A PROGRAMACAO DE UPLOAD NAO FOI FEITA *****
		$status 		= $_POST["status_produto"];
		$preco			= str_replace(',','.',str_replace('.','',$_POST["preco_produto"]));
		$id_categorias	= "";
		if(isset($_POST["categorias_produto"])){
			$vt_cat = array();
			$vt_cat = $_POST["categorias_produto"];
			if(count($vt_cat) != 0){
				for($i=1; $i <= count($vt_cat); $i++){
					$id_categorias .= utf8_decode($vt_cat[($i-1)]);
					($i < count($vt_cat)) ? $id_categorias .= "/" : $id_categorias .= "";
				}
			}
		}
		
		
		$conn = $this->Conexao();
		try {  
		      
		    $sql = $conn->prepare("INSERT INTO tb_produtos (
		    									nome,
		    									descricao,
		    									imagem,
		    									preco,
		    									id_categorias,
		    									status,
		    									url_amigavel) 
		    							VALUES (? ,?, ?, ?, ?, ?, ?)");
			$sql->bindParam(1, $nome);
			$sql->bindParam(2, $descricao);
			$sql->bindParam(3, $imagem);
			$sql->bindParam(4, $preco);
			$sql->bindParam(5, $id_categorias);
			$sql->bindParam(6, $status);
			$sql->bindParam(7, $url_amigavel);
			$sql->execute();
		  
			echo "ok";
			
		} catch(PDOException $e) {
		    echo "erro: ".$e;
		}
	}
	function Deletar_Produto()
	{
		$conn = $this->Conexao();
		$status = 99;//STATUS DELETADO
		$id	= $_POST["id"];
		
		
				try {  

				    $sql = $conn->prepare("UPDATE tb_produtos SET status=? WHERE md5(id_produto)=?");
				          
					$sql->bindParam(1, $status);
					$sql->bindParam(2, $id);
				    
					
					$sql->execute();
					
					echo "ok";
					die();
		
				} catch(PDOException $e) {
					$erro = $e->getMessage();
					echo "erro ".$erro;
				    die();
				}
	}
	function Editar_Produto()
	{
		$conn = $this->Conexao();
		$nome	= utf8_decode($_POST["nome"]);
		$url_amigavel = $this->Tirar_Acentos($_POST["nome"]);
		$id	= $_POST["id"];
		
		
				try {  

				    $sql = $conn->prepare("UPDATE tb_produtos SET nome=?,url_amigavel=? WHERE md5(id_produto)=?");
				          
					$sql->bindParam(1, $nome);
					$sql->bindParam(2, $url_amigavel);
				    $sql->bindParam(3, $id);
					
					$sql->execute();
					
					echo "ok";
					die();
		
				} catch(PDOException $e) {
					$erro = $e->getMessage();
					echo "erro ".$erro;
				    die();
				}
	}
	
	function Tirar_Acentos($string)
	{
		$str = strtolower($string);
    	$table = array(
		'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'Ž'=>'Z', '.'=>' ',
		'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
		'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
		'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
		'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
		'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
		'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
		'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
		'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
		'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
		'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
		'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
		'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u',
		'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
		'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r', '/'=>'', '['=>'',
		']'=>'', '('=>'', ')'=>'', '{'=>'', '}'=>'',
		' '=>'-',
		);
		
    	
    	return strtr($str, $table);
    	
	}
	
}
//*********************************************
$classe = new Admin();
if($acao == "login")$classe->Login();
if($acao == "cad_categoria")$classe->Cadastrar_Categoria();
if($acao == "del_categoria")$classe->Deletar_Categoria();
if($acao == "edit_categoria")$classe->Editar_Categoria();
//**
if($acao == "cad_produto")$classe->Cadastrar_Produto();
if($acao == "del_produto")$classe->Deletar_Produto();
if($acao == "edit_produto")$classe->Editar_Produto();
	
?>