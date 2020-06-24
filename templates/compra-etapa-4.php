<?php
	if(!isset($_SESSION["etapa3"])){
		header("Location: ".ROOT_LIB."home");
		die();
	}
	
	
	$endereco = "Rua ".$_SESSION["rua_entrega"]." Número: ".$_SESSION["numero_entrega"]." Bairro: ".$_SESSION["bairro_entrega"]." Cidade:".$_SESSION["cidade_entrega"]." UF: ".$_SESSION["uf_entrega"]." CEP: ".$_SESSION["cep_entrega"];
	
	
	$res_ped = $produtos->Gravar_Pedido($endereco,$_SESSION["nome_comprador"],$_SESSION["email_comprador"],$_SESSION["tel_comprador"],$_SESSION["cel_comprador"],session_id());
	
	
	
	if($res_ped == "ok"){
		session_regenerate_id();
		session_unset();
		session_destroy();
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
            <li class="breadcrumb-item"><span>Pedido Finalizado</span></li> 
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
				 		<h6 class="card-title text-gray-400">
				 		<span style="fontsize: 18px">
				 			<i class="fa fa-thumbs-up" aria-hidden="true"></i>
				 			<i class="fa fa-check text-success" aria-hidden="true"></i>
				 			<br />
				 			Confirmar Compra
				 		</h6>
				 	</div>
				</div>
		    </div>
	   </div>
	   <div class="row">
	    	<div class="col-12">
		    	<br /><br />
		    	<h5 class="card-title text-gray-900 text-center">
			    	<i class="fa fa-check text-success" aria-hidden="true"></i>
			    	Pedido enviado!
			    </h5>
			    <h6 class="card-title text-gray-700 text-center">
		 			<p>Obrigado por sua solicitação, em breve retornaremos o contato!</p>	
				</h6>
				<br /><br /><br />
		    </div>
	   </div>
	</div>

    <hr>

	<?php
		require_once "includes/footer.php";
	?>
    
  </body>

</html>
