<?php
	
	$_SESSION["etapa3"] = "ok";
	
	if(!isset($_SESSION["etapa2"])){
		header("Location: ".ROOT_LIB."home");
		die();
	}
	
	
	if(isset($_POST["etapa2"])){
		
		$_SESSION["nome_comprador"] = $_POST["nome_comprador"];
		$_SESSION["email_comprador"] = $_POST["email_comprador"];
		$_SESSION["tel_comprador"] = $_POST["tel_comprador"];
		$_SESSION["cel_comprador"] = $_POST["cel_comprador"];
	}
	
	
	
	require_once "classes/Class_Produtos.php";
	$produtos = new Produtos();
	
	$res_carr = $produtos->Listar_Prod_Carrinho(session_id());
	$num_carr = $res_carr->rowCount();
	
	if($num_carr == 0){
		header("Location: ".ROOT_LIB."home");
		die();
	}
	

	
?>
<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->

  <head>
    <title>Home - Loja BlueService</title>
    <?php
		require_once "includes/head.php";
	?>
	<style>
		.text-gray-400 {
		  color: #d1d3e2 !important;
		}
		.text-gray-800 {
		  color: #5a5c69 !important;
		}
		.text-gray-900 {
		  color: #3a3b45 !important;
		}
		.crop-img {
			width: 80px;
			height: 80px;
			overflow: hidden;
		}
	</style>
</head>

  <body>
    <!-- Navigation -->
    <div class="fixed-top">
      <?php
	      require_once "includes/topo.php";
      ?>

      <nav class="navbar navbar-expand-lg navbar-dark bg-gradient-primary d-none d-lg-block">
        <div class="container">
          <?php
	          require_once "includes/topo_menu.php";
          ?>
        </div>
      </nav>
    </div>

    <!-- Page Content -->
    <section class="container">
      <div class="row">
        <section class="col-12 d-none d-md-block">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo ROOT_LIB; ?>" class="trsn" title="Voltar para a Home">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo ROOT_LIB; ?>carrinho-de-compras/" class="trsn" title="Carrinho de compras">Carrinho de compras</a></li>
            <li class="breadcrumb-item"><a href="<?php echo ROOT_LIB; ?>compra-etapa-1/" class="trsn" title="Dados para Entrega">Dados para Entrega</a></li>
            <li class="breadcrumb-item"><a href="<?php echo ROOT_LIB; ?>compra-etapa-2/etapa-2" class="trsn" title="Dados Pessoais do Comprador">Dados Pessoais do Comprador</a></li>
            <li class="breadcrumb-item"><span>Confirmar Compra</span></li> 
          </ol>
        </section>
      </div>
    </section>

    <div class="container">
	  <!-- Page Heading -->
	  <div class="row">
		    <div class="col-4">
			    <div class="card mb-3">
			 		<div class="card-header text-center">
				 		<h6 class="card-title text-gray-400">
				 			<i class="fa fa-truck" aria-hidden="true"></i>
				 			<i class="fa fa-check text-success" aria-hidden="true"></i>
				 			<br />
				 			Dados para Entrega
				 		</h6>
				 	</div>
				</div>
		    </div>
		    <div class="col-4">
			    <div class="card mb-3">
			 		<div class="card-header text-center">
				 		<h6 class="card-title text-gray-400">
				 		<span style="fontsize: 18px">
				 			<i class="fa fa-address-card" aria-hidden="true"></i>
				 			<i class="fa fa-check text-success" aria-hidden="true"></i>
				 			<br />
				 			Dados pessoais do Comprador
				 		</h6>
				 	</div>
				</div>
		    </div>
		    <div class="col-4">
			    <div class="card mb-3">
			 		<div class="card-header text-center">
				 		<h6 class="card-title text-primary">
				 		<span style="fontsize: 18px">
				 			<i class="fa fa-thumbs-up" aria-hidden="true"></i><br />
				 			Confirmar Compra
				 		</h6>
				 	</div>
				</div>
		    </div>
	   </div>
	   <div class="row">
	    	<div class="col-12">
		    	<h5 class="card-title text-gray-900">
			    	<i class="fa fa-check text-success" aria-hidden="true"></i>
			    	Endereço para Entrada:
			    </h5>
			    <h6 class="card-title text-gray-700">
		 			<p>Rua: <?php echo $_SESSION["rua_entrega"]; ?></p>
		 			<p>Número: <?php echo $_SESSION["numero_entrega"]; ?> Bairro: <?php echo $_SESSION["bairro_entrega"]; ?></p>
		 			<p>Cidade: <?php echo $_SESSION["cidade_entrega"]; ?> UF: <?php echo $_SESSION["uf_entrega"]; ?> CEP: <?php echo $_SESSION["cep_entrega"]; ?></p>	
				</h6>
		    </div>
		    <div class="col-12"> 
		    	<h5 class="card-title text-gray-900">
			    	<i class="fa fa-check text-success" aria-hidden="true"></i>
			    	Dados pessoais do Comprador:
			    </h5>
			    <h6 class="card-title text-gray-700">
		 			<p>Nome Completo: <?php echo $_SESSION["nome_comprador"]; ?></p>
		 			<p>E-mail: <?php echo $_SESSION["email_comprador"]; ?></p>
		 			<p>Telefone: <?php echo $_SESSION["tel_comprador"]; ?> Celular: <?php echo $_SESSION["cel_comprador"]; ?></p>	
				</h6>  
		    </div>
	   </div>
	   <div class="row">
		   <div class="col-12">
			   
			   <table class="table table-striped">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Produto</th>
				      <th scope="col">Quantidade</th>
				      <th scope="col">Preço</th>
				    </tr>
				  </thead>
				  <tbody>
					<?php while($row_carr = $res_carr->fetch()){ 
						$subtotal 	= $row_carr["subtotal"];
						$subqtd		= $row_carr["subqtd"];
					?>
				    <tr>
				      <th scope="row">
					      <div class="card" style="width: 80px">
					      	<div class="crop-img">
						      <img src="<?php echo ROOT_LIB.'imagens-produtos/'.$row_carr["imagem"]; ?>" width="300px" />
					      	</div>
					      </div>
				      </th>
				      <td><?php echo utf8_encode($row_carr["nome_produto"]); ?></td>
				      <td><?php echo utf8_encode($row_carr["qtd"]); ?></td>
				      <td>R$ <?php echo number_format($row_carr["preco_produto"],2,",",".") ?></td>
				    </tr>
				    <?php } ?>
				    <tr>
					    <td colspan="3" style="text-align:right">Subtotal <?php echo $subqtd; ?> iten(s)</td>
					    <td>
						    R$ <?php echo number_format($subtotal,2,",",".") ?> <br /><br />
						    <div class="btn-group">
				                <a href="<?php echo ROOT_LIB; ?>compra-etapa-4" class="btn btn-primary btn-icon-split btn-sm">
					                <i class="fa fa-arrow-right" aria-hidden="true"></i> Confirmar compra!
					            </a>
			                </div>
						</td>
				    </tr>

				  </tbody>
				</table>
			   
		   </div>
	   </div>
	</div>

    <hr>

	<?php
		require_once "includes/footer.php";
	?>
	<script src="<?php echo ROOT_LIB; ?>tema/plugins/bootstrap-validator-master/validator.min.js"></script>
	<script>
		$('#form').validator();
	</script>
    
  </body>

</html>
