<?php

	$_SESSION["etapa2"] = "ok";
	
	if(!isset($_SESSION["etapa1"])){
		header("Location: ".ROOT_LIB."home");
		die();
	}
	
	
	(isset($_SESSION["nome_comprador"]) ? $nome_comprador = $_SESSION["nome_comprador"] : $nome_comprador = "");
	(isset($_SESSION["email_comprador"]) ? $email_comprador = $_SESSION["email_comprador"] : $email_comprador = "");
	(isset($_SESSION["tel_comprador"]) ? $tel_comprador = $_SESSION["tel_comprador"] : $tel_comprador = "");
	(isset($_SESSION["cel_comprador"]) ? $cel_comprador = $_SESSION["cel_comprador"] : $cel_comprador = "");
	
	
	if(isset($_POST["etapa1"])){
		$_SESSION["rua_entrega"] = $_POST["rua_entrega"];
		$_SESSION["numero_entrega"] = $_POST["numero_entrega"];
		$_SESSION["bairro_entrega"] = $_POST["bairro_entrega"];
		$_SESSION["cidade_entrega"] = $_POST["cidade_entrega"];
		$_SESSION["uf_entrega"] = $_POST["uf_entrega"];
		$_SESSION["cep_entrega"] = $_POST["cep_entrega"];
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
            <li class="breadcrumb-item"><span>Dados pessoais do Comprador</span></li> 
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
				 		<h6 class="card-title text-primary">
				 			<i class="fa fa-address-card" aria-hidden="true"></i><br />
				 			Dados pessoais do Comprador
				 		</h6>
				 	</div>
				</div>
		    </div>
		    <div class="col-4">
			    <div class="card mb-3">
			 		<div class="card-header text-center">
				 		<h6 class="card-title text-gray-400">
				 			<i class="fa fa-thumbs-up" aria-hidden="true"></i><br />
				 			Confirmar Compra
				 		</h6>
				 	</div>
				</div>
		    </div>
	   </div>
	   <div class="row">
		   <div class="col-12">
		      <p>Dados pessoais do Comprador!</p>
				<form id="formExemplo" data-toggle="validator" role="form" method="post" enctype="multipart/form-data" action="<?php echo ROOT_LIB; ?>compra-etapa-3">
					<input type="hidden" value="ok" id="etapa2" name="etapa2">
				  <div class="form-group">
				    <label for="nome_comprador" class="control-label">Nome Completo</label>
				    <input id="nome_comprador" name="nome_comprador" class="form-control" data-error="Informe seu Nome Completo" required value="<?php echo $nome_comprador; ?>">
				    <div class="help-block with-errors text-danger"></div>
				  </div>
				  
				   <div class="field row">
						<div class="col-sm-6 mb-3">
							<div class="form-group">
							    <label for="email_comprador" class="control-label">E-mail</label>
							    <input id="email_comprador" name="email_comprador" class="form-control" data-error="Informe seu e-mail para contato" required value="<?php echo $email_comprador; ?>">
							    <div class="help-block with-errors text-danger"></div>
							</div>
		                </div>
						<div class="col-sm-6">
							<div class="form-group">
							    <label for="tel_comprador" class="control-label">Telefone</label>
							    <input id="tel_comprador" name="tel_comprador" class="form-control" data-error="Informe o seu Telefone" required value="<?php echo $tel_comprador; ?>">
							    <div class="help-block with-errors text-danger"></div>
							</div>
		                </div>
		            </div>
		             <div class="field row">
						<div class="col-sm-4 mb-3">
							<div class="form-group">
							    <label for="cel_comprador" class="control-label">Celular *</label>
							    <input id="cel_comprador" name="cel_comprador" class="form-control" data-error="Informe o seu Celular" required value="<?php echo $cel_comprador; ?>">
							    <div class="help-block with-errors text-danger"></div>
							</div>
		                </div>
						<div class="col-sm-4">
		                </div>
		                <div class="col-sm-4">
		                </div>
		            </div>
		            
		            

				  
				  <div class="form-group">
				    <button type="submit" class="btn btn-primary btn-block">Enviar</button>
				  </div>
				</form>
				
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
