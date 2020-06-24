<?php
// 05/2020 VITOR AMARAL
	
	
	$res_categorias = $produtos->Listar_Categorias("todas","","nome");
	$num_categorias = $res_categorias->rowCount();
	$titulo_pagina = "";
	
	if($_SESSION["parametro2"] == ""){ //SE NAO TEM CATEGORIA SELECIONADA, ABRE OS PRODUTOS EM DESTAQUE
		$res_produtos = $produtos->Lista_Produtos('prod_destaques');
		$titulo_pagina = "Produtos em destaque";
	}else{
		$res_produtos = $produtos->Lista_Produtos($_SESSION["parametro2"]);	
	}
	
	$num_produtos = $res_produtos->rowCount();
	//$res_produtos_ativos
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
		.crop-img {
			width: 100%;
			height: 200px;
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
            <li class="breadcrumb-item"><span>Home</span></li> 
          </ol>
        </section>
      </div>
    </section>

    <div class="container">
	  <!-- Page Heading -->
	  <div class="row">
	    <div class="col-12">
	      <h1 class="page-header">Confira todos os produtos!</h1>
	    </div>
	  </div>
	  <div class="row">
		  	<div class="col-lg-3">
				<div class="card mb-3">
			 		<div class="card-header"><h6 class="card-title text-primary">Categorias</h6></div>
					<div class="card-body">
				 		
				 		<?php
					 	if($num_categorias == 0){
						 	echo '<h6 class="text-primary">Nenhuma categoria foi encontrada!</h6>';
					 	}else{
						 	$cat_ativa = "";
						 	echo '<ul class="list-group list-group-flush">';
						 	while($row_cat = $res_categorias->fetch()){
							 	if($row_cat["url_amigavel"] == $_SESSION["parametro2"]){
								 	$titulo_pagina = "Categoria: ".utf8_encode($row_cat["nome"]);
								 	$cat_ativa = "font-weight-bold";
							 	}
							 	
							 	
							 	echo '
							 	<li class="list-group-item">
					               <a class="'.$cat_ativa.'" href="'.ROOT_LIB.'home/'.$row_cat["url_amigavel"].'" title="Inicio">'.utf8_encode($row_cat["nome"]).'</a>
					             </li>
							 	'; 
				           $cat_ativa = "";
				           }
				           echo '</ul>'; 
				        }
			           ?>
				 		
       				</div>
     			</div>
			</div>
		  	<div class="col-lg-9">
			  	<div class="row">
				  	<?php
					if($num_produtos == 0){
				  	?>
				  	<p class="text-xs font-weight-bold text-primary mb-1">
				  		Nenhum produto foi encontrado!
				  	</p>
				  	<?php
					}else{
						echo '<div class="col-12 page">
								<p class="text-xs font-weight-bold text-primary mb-1">
									'.$titulo_pagina.'
								</p><br />
							  </div>';
						while($row_prod = $res_produtos->fetch()){
				  	?>
				  		<div class="col-md-4">
					  		<div class="card mb-4 shadow-sm">
						  		<div class="crop-img">
						  		<img src="<?php echo ROOT_LIB.'imagens-produtos/'.$row_prod["imagem"]; ?>" />
						  		</div>
						  		<div class="card-body">
						  			<p class="card-text"><?php echo utf8_encode($row_prod["nome_produto"]); ?>
							  			
						  			</p>
						  			<div class="d-flex justify-content-between align-items-center">
						                <div class="btn-group">
								            <button type="button" class="btn btn-sm btn-outline-primary" onclick="location.href='<?php echo ROOT_LIB; ?>carrinho-de-compras/ad/<?php echo md5($row_prod["id_produto"]); ?>'">
										  		<i class="fas fa-shopping-cart" aria-hidden="true"></i>
										  	</button>
										  	<button type="button" class="btn btn-sm btn-outline-primary" onclick="location.href='<?php echo ROOT_LIB; ?>detalhe-produto/<?php echo $row_prod["url_amigavel_produto"]; ?>'">
										  		<i class="fa fa-eye" aria-hidden="true"></i>
										  	</button>
						                </div>
										<h6 class="text-xs text-success text-uppercase mb-1 text-center">
											R$ <?php echo number_format($row_prod["preco"],2,",",".") ?>
										</h6>
									</div>
			              		</div>
						  	</div>
						</div>
				  	<?php 
						}//WHILE PRODUTOS  	
					}//IF PRODUTOS
					?>  		
			  	</div>
		  	</div>  
	  </div>
	</div>

    <hr>

	<?php
		require_once "includes/footer.php";
	?>
    <script>
	   // $('.toast').toast('show');
    </script>
  </body>

</html>
