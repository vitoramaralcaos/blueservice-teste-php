<?php

$_SESSION["etapa1"] = "ok";

(isset($_SESSION["rua_entrega"]) ? $rua_entrega = $_SESSION["rua_entrega"] : $rua_entrega = "");
(isset($_SESSION["numero_entrega"]) ? $numero_entrega = $_SESSION["numero_entrega"] : $numero_entrega = "");
(isset($_SESSION["bairro_entrega"]) ? $bairro_entrega = $_SESSION["bairro_entrega"] : $bairro_entrega = "");
(isset($_SESSION["cidade_entrega"]) ? $cidade_entrega = $_SESSION["cidade_entrega"] : $cidade_entrega = "");
(isset($_SESSION["uf_entrega"]) ? $uf_entrega = $_SESSION["uf_entrega"] : $uf_entrega = "");
(isset($_SESSION["cep_entrega"]) ? $cep_entrega = $_SESSION["cep_entrega"] : $cep_entrega = "");
	
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
            <li class="breadcrumb-item"><span>Dados para Entrega</span></li> 
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
				 		<h6 class="card-title text-primary">
				 			<i class="fa fa-truck" aria-hidden="true"></i><br />
				 			Dados para Entrega
				 		</h6>
				 	</div>
				</div>
		    </div>
		    <div class="col-4">
			    <div class="card mb-3">
			 		<div class="card-header text-center">
				 		<h6 class="card-title text-gray-400">
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
		      <p>Dados para Entrega!</p>
				<form id="formExemplo" data-toggle="validator" role="form" method="post" enctype="multipart/form-data" action="<?php echo ROOT_LIB; ?>compra-etapa-2">
				<input type="hidden" value="ok" id="etapa1" name="etapa1">
				  <div class="form-group">
				    <label for="rua_entrega" class="control-label">Nome da Rua</label>
				    <input id="rua_entrega" name="rua_entrega" class="form-control" data-error="Informe a Rua" required value="<?php echo $rua_entrega; ?>">
				    <div class="help-block with-errors text-danger"></div>
				  </div>
				  
				   <div class="field row">
						<div class="col-sm-6 mb-3">
							<div class="form-group">
							    <label for="numero_entrega" class="control-label">Número</label>
							    <input id="numero_entrega" name="numero_entrega" class="form-control" data-error="Informe o Número" required value="<?php echo $numero_entrega; ?>">
							    <div class="help-block with-errors text-danger"></div>
							</div>
		                </div>
						<div class="col-sm-6">
							<div class="form-group">
							    <label for="bairro_entrega" class="control-label">Bairro</label>
							    <input id="bairro_entrega" name="bairro_entrega" class="form-control" data-error="Informe o Bairro" required value="<?php echo $bairro_entrega; ?>">
							    <div class="help-block with-errors text-danger"></div>
							</div>
		                </div>
		            </div>
		             <div class="field row">
						<div class="col-sm-4 mb-3">
							<div class="form-group">
							    <label for="cidade_entrega" class="control-label">Cidade *</label>
							    <input id="cidade_entrega" name="cidade_entrega" class="form-control" data-error="Informe a Cidade" required value="<?php echo $cidade_entrega; ?>">
							    <div class="help-block with-errors text-danger"></div>
							</div>
		                </div>
						<div class="col-sm-4">
							<div class="form-group">
							    <label for="uf_entrega" class="control-label">UF *</label>
							    <input id="uf_entrega" name="uf_entrega" class="form-control" data-error="Informe UF" required value="<?php echo $uf_entrega; ?>">
							    <div class="help-block with-errors text-danger"></div>
							</div>
		                </div>
		                <div class="col-sm-4">
							<div class="form-group">
							    <label for="cep_entrega" class="control-label">CEP</label>
							    <input id="cep_entrega" name="cep_entrega" class="form-control" data-error="Informe o CEP" required value="<?php echo $cep_entrega; ?>">
							    <div class="help-block with-errors text-danger"></div>
							</div>
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
