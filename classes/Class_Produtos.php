<?php
//***********
//**** 06/2020 - VITOR AMARAL	
//***********

require_once "Class_Mysql.php";


Class Produtos extends Mysql {
	
	function Listar_Categorias($limite,$exception_cat,$order)
	{
		$status = 1;// ATIVOS
		$conn = $this->Conexao();
		($limite != "todas" ? $sql_limit = "LIMIT ".$limite : $sql_limit = "");
		($exception_cat != "" ? $sql_regra = "AND url_amigavel != ?" : $sql_regra = "");
		($order == "aleatorio" ? $sql_order = "RAND()" : $sql_order = $order);
		
		try {  
		      
		    $stmt = $conn->prepare('SELECT * FROM tb_categorias WHERE status = ? '.$sql_regra.' ORDER BY '.$sql_order.' '.$sql_limit);
		    $stmt->bindParam(1, $status, PDO::PARAM_STR);
		    if($exception_cat != "")$stmt->bindParam(2, $exception_cat, PDO::PARAM_STR);
		    $stmt->execute();
		  
			return $stmt;
			
		} catch(PDOException $e) {
		    return 'Não foi possível buscar os produtos';
		}
		
	}
	function Lista_Produtos($categoria_url)
	{
		$status = 1;// ATIVOS
		$conn = $this->Conexao();
		
		if($categoria_url == "prod_destaques"){
			$destaque = 1; //PRODUTO EM DESTAQUE
			try {  
		      
			    $stmt = $conn->prepare('SELECT c.id_categoria,
			    							p.*, p.nome AS nome_produto, p.url_amigavel AS url_amigavel_produto 
			    						FROM 
			    							tb_produtos p, tb_categorias c
			    						WHERE 
			    							(p.id_categorias LIKE CONCAT("%/" ,c.id_categoria, "/%")
			    								OR p.id_categorias LIKE CONCAT(c.id_categoria, "/%")
			    								OR p.id_categorias LIKE CONCAT("%/" ,c.id_categoria)
			    								OR p.id_categorias LIKE c.id_categoria)
			    						AND
			    							c.status = :status
			    						AND
			    							p.destaque = :destaque 
			    						AND 
			    							p.status = :status GROUP BY p.id_produto ORDER BY p.nome');
			    $stmt->bindParam(":status", $status, PDO::PARAM_STR);
			    $stmt->bindParam(":destaque", $destaque, PDO::PARAM_STR);
			    $stmt->execute();
			  
				return $stmt;
				
			} catch(PDOException $e) {
			    return 'Não foi possível buscar os produtos';
			}
			
		}else{
		
			try {  
		      
			    $stmt = $conn->prepare('SELECT p.*, p.nome AS nome_produto, p.url_amigavel AS url_amigavel_produto, 
		    								c.*, c.nome AS nome_categoria, c.url_amigavel AS url_amigavel_categoria
			    							FROM 
			    								tb_produtos p, tb_categorias c
			    							WHERE 
			    								c.url_amigavel = :cat_url
			    								AND
			    								(p.id_categorias LIKE CONCAT("%/" ,c.id_categoria, "/%")
			    								OR p.id_categorias LIKE CONCAT(c.id_categoria, "/%")
			    								OR p.id_categorias LIKE CONCAT("%/" ,c.id_categoria)
			    								OR p.id_categorias LIKE c.id_categoria)
			    								AND 
			    								p.status = :status 
			    							GROUP BY p.id_produto ORDER BY p.nome');
			    $stmt->bindParam(":status", $status, PDO::PARAM_STR);
			    $stmt->bindParam(":cat_url", $categoria_url, PDO::PARAM_STR);
			    $stmt->execute();
			  
				return $stmt;
				
			} catch(PDOException $e) {
			    return 'Não foi possível buscar as categorias';
			}	
		}
		
	}
	function Buscar_Lista_Produtos($like)
	{
		$status = 1;// ATIVOS
		
		$input_genero = utf8_decode("%".$like."%");
		
		$conn = $this->Conexao();
		try {  
		      
		    $stmt = $conn->prepare('SELECT p.*, p.nome AS nome_produto, p.url_amigavel AS url_amigavel_produto, 
		    								c.*, c.nome AS nome_categoria, c.url_amigavel AS url_amigavel_categoria
			    							FROM 
			    								tb_produtos p, tb_categorias c
			    							WHERE 
			    								p.nome LIKE :termo_busca
			    								AND
			    								(p.id_categorias LIKE CONCAT("%/" ,c.id_categoria, "/%")
			    								OR p.id_categorias LIKE CONCAT(c.id_categoria, "/%")
			    								OR p.id_categorias LIKE CONCAT("%/" ,c.id_categoria)
			    								OR p.id_categorias LIKE c.id_categoria)
			    								AND 
			    								c.status = :status
			    								AND
			    								p.status = :status 
			    							GROUP BY p.id_produto ORDER BY p.nome');
		    $stmt->bindParam(":status", $status, PDO::PARAM_STR);
		    $stmt->bindParam(":termo_busca", $input_genero, PDO::PARAM_STR);
		    $stmt->execute();
		  
			return $stmt;
		} catch(PDOException $e) {
		    return 'Não foi possível buscar os produtos';
		}
	}
	function Buscar_Produto($url_produto)
	{
		$status = 1;// ATIVOS
		$conn = $this->Conexao();
		try {  
		      
		    $stmt = $conn->prepare('SELECT p.*, p.nome AS nome_produto, p.url_amigavel AS url_amigavel_produto, 
		    								c.*, c.nome AS nome_categoria, c.url_amigavel AS url_amigavel_categoria
			    							FROM 
			    								tb_produtos p, tb_categorias c
			    							WHERE 
			    								p.url_amigavel = ?
			    								AND
			    								(p.id_categorias LIKE CONCAT("%/" ,c.id_categoria, "/%")
			    								OR p.id_categorias LIKE CONCAT(c.id_categoria, "/%")
			    								OR p.id_categorias LIKE CONCAT("%/" ,c.id_categoria)
			    								OR p.id_categorias LIKE c.id_categoria)
			    								AND 
			    								p.status = ? 
			    							GROUP BY p.id_produto ORDER BY p.nome');
		    $stmt->bindParam(1, $url_produto, PDO::PARAM_STR);
		    $stmt->bindParam(2, $status, PDO::PARAM_STR);
		    $stmt->execute();
		  
			return $stmt;
			
		} catch(PDOException $e) {
		    return 'Não foi possível buscar os produtos';
		}
	}
	function Add_Carrinho($id_produto,$session_id)
	{
		$conn = $this->Conexao();
		try {
			$sql = $conn->prepare('SELECT * FROM tb_produtos WHERE md5(id_produto) = ?');
			$sql->bindParam(1, $id_produto);
		    $sql->execute();
		    
		    $num = $sql->rowCount();
		    if($num == 0){
			    return '0';
		    }else{
			    $row = $sql->fetch();
			    
			    $id_prod 	= $row["id_produto"];
			    $nome		= $row["nome"];
			    $descricao 	= $row["descricao"];
			    $preco		= $row["preco"];
			    $qtd		= 1;
			    $status		= 1;
			    
			    
			    	$sql2 = $conn->prepare('SELECT * FROM tb_carrinho_compras 
			    								WHERE 
			    							md5(id_produto_referencia) = ? AND session_id = ? AND status = ?');
					$sql2->bindParam(1, $id_produto);
					$sql2->bindParam(2, $session_id);
					$sql2->bindParam(3, $status);
					$sql2->execute();
					$num2 = $sql2->rowCount();
			    
					if($num2 == 0){
						$sql3 = $conn->prepare('INSERT INTO tb_carrinho_compras (
			    									id_produto_referencia,nome_produto,descricao_produto,preco_produto,qtd,session_id,status)
			    									VALUES (?, ?, ?, ?, ?, ?, ?)'
			    						);
						$sql3->bindParam(1, $id_prod);
						$sql3->bindParam(2, $nome);
						$sql3->bindParam(3, $descricao);
						$sql3->bindParam(4, $preco);
						$sql3->bindParam(5, $qtd);
						$sql3->bindParam(6, $session_id);
						$sql3->bindParam(7, $status);
						$sql3->execute();
					    return "ok";
					}else{
						$sql3 = $conn->prepare("UPDATE tb_carrinho_compras 
													SET qtd=(qtd+1) WHERE md5(id_produto_referencia) = ? AND session_id = ?");
				          
						$sql3->bindParam(1, $id_produto);
						$sql3->bindParam(2, $session_id);
						$sql3->execute();
						return "ok";
					}  
		    }  
			
		} catch(PDOException $e) {
		    return 'Não foi possível buscar o produto '.$e;
		}
	}
	function Edit_Qtd_Carrinho($id_carrinho,$qtd)
	{
		$conn = $this->Conexao();
				try {  

				    $sql = $conn->prepare("UPDATE tb_carrinho_compras SET qtd=? WHERE md5(id_carrinho)=?");
				          
					$sql->bindParam(1, $qtd);
					$sql->bindParam(2, $id_carrinho);
				    
					
					$sql->execute();
					
					return "ok";
					
		
				} catch(PDOException $e) {
					$erro = $e->getMessage();
					return "erro".$erro;
				}
	}
	function Del_Carrinho($id_carrinho)
	{
		$conn = $this->Conexao();
		$status = 99;
				try {  

				    $sql = $conn->prepare("UPDATE tb_carrinho_compras SET status=? WHERE md5(id_carrinho)=?");
				          
					$sql->bindParam(1, $status);
					$sql->bindParam(2, $id_carrinho);
				    
					
					$sql->execute();
					
					return "ok";
					
		
				} catch(PDOException $e) {
					$erro = $e->getMessage();
					return "erro".$erro;
				}
	}
	function Listar_Prod_Carrinho($session_id)
	{
		$conn = $this->Conexao();
		$status = 1;
		try {
			$sql = $conn->prepare('SELECT 
										carr.*, p.imagem,
										(
											SELECT SUM(qtd) FROM tb_carrinho_compras WHERE session_id = :session_id AND status = :status
										) as subqtd,
										(
											SELECT SUM(qtd * preco_produto) 
												FROM 
													tb_carrinho_compras WHERE session_id = :session_id AND status = :status
										) as subtotal
										FROM 
											tb_carrinho_compras carr, tb_produtos p 
										WHERE 
											carr.id_produto_referencia = p.id_produto
											AND
											carr.session_id = :session_id 
											AND 
											carr.status = :status'
									);
			$sql->bindParam(":session_id", $session_id);
			$sql->bindParam(":status", $status);
		    $sql->execute();
		    
		    return $sql;
		    
		    
		} catch(PDOException $e) {
		    return 'Não foi possível buscar os produtos '.$e;
		}
	}
	function Valores_Carrinho($session_id)
	{
		$conn = $this->Conexao();
		$status = 1;
		try {
			$sql = $conn->prepare('SELECT 
										COUNT(id_carrinho) as total,
										SUM(qtd * preco_produto) as total_valor, 
										SUM(qtd) AS total_qtd FROM tb_carrinho_compras 
									WHERE 
										session_id = :session_id AND status = :status');
			$sql->bindParam(":session_id", $session_id);
			$sql->bindParam(":status", $status);
		    $sql->execute();
		    
		    return $sql;
		    
		    
		} catch(PDOException $e) {
		    return 'Não foi possível buscar os produtos '.$e;
		}
	}
	function Gravar_Pedido($endereco,$nome_comprador,$email_comprador,$tel_comprador,$cel_comprador,$session_id)
	{
	
		$end = 	utf8_decode($endereco);
		$nome = utf8_decode($nome_comprador);
		
		$conn = $this->Conexao();
		$status = 1;
		try {
			$sql = $conn->prepare('INSERT INTO tb_pedidos (
			    									session_id,
			    									endereco_entrega,
			    									nome_comprador,
			    									email_comprador,
			    									tel_comprador,
			    									cel_comprador,
			    									status)
			    									VALUES (?, ?, ?, ?, ?, ?, ?)'
			    					);
			$sql->bindParam(1, $session_id);
			$sql->bindParam(2, $end);
			$sql->bindParam(3, $nome);
			$sql->bindParam(4, $email_comprador);
			$sql->bindParam(5, $tel_comprador);
			$sql->bindParam(6, $cel_comprador);
			$sql->bindParam(7, $status);
		    $sql->execute();
		    
		    return "ok";
		    
		    
		    
		} catch(PDOException $e) {
		    echo 'Não foi possível gravar o pedido '.$e;
		}
		
		
	}
	
	
	
	
	
}
	
?>