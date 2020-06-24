<?php
// 05/2020 VITOR AMARAL

	
	$res_produto = $produtos->Buscar_Produto($_SESSION["parametro2"]);
	$num_produto = $res_produto->rowCount();
	
	if($num_produto == 0){ //PRODUTO NAO ENCONTRADO, VOLTA PARA A HOME
		header("Location: ".ROOT_LIB);
	}
	
	
	$row_prod = $res_produto->fetch();
	
	//LISTA DE CATEGORIAS - LIMITAS E COM RESULTADO ALEATORIO ********
	$res_categorias = $produtos->Listar_Categorias("6",$row_prod["url_amigavel_categoria"],"aleatorio");
	$num_categorias = $res_categorias->rowCount();
	
?>
<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->

  <head>
    <title>Home - Loja BlueService</title>
    <?php
		require_once "includes/head.php";
	?>
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
            <li class="breadcrumb-item">
            	<a href="<?php echo ROOT_LIB."home/".$row_prod["url_amigavel_categoria"]; ?>" class="trsn" title="<?php echo utf8_encode($row_prod["nome_categoria"]); ?>">
	            	<?php echo utf8_encode($row_prod["nome_categoria"]); ?>
	            </a>
            </li>
            <li class="breadcrumb-item"><span><?php echo utf8_encode($row_prod["nome_produto"]); ?></span></li> 
          </ol>
        </section>
      </div>
    </section>

    <div class="container">
	  <!-- Page Heading -->
	  <div class="row">
	    <div class="col-12">
	      <h1 class="page-header"><?php echo utf8_encode($row_prod["nome_produto"]); ?></h1>
	    </div>
	  </div>
	  <div class="row">
		 	<div class="col-md-8 page">
		 		<img class="img-fluid" src="<?php echo ROOT_LIB.'imagens-produtos/'.$row_prod["imagem"]; ?>" />
     
		 		<hr>
		 		<p>
			 		<?php echo utf8_encode($row_prod["descricao"]); ?>
		 		</p>

		 	</div>
		 	<div class="col-md-4">
			 	<div class="card mb-3">
			 		<div class="card-header"><h5 class="card-title text-primary">Adquire esse produto agora!</h5></div>
					<div class="card-body">
				 		
				 		<div class="d-flex justify-content-between align-items-center">
			                <div class="btn-group">
				                <a href="<?php echo ROOT_LIB; ?>carrinho-de-compras/ad/<?php echo md5($row_prod["id_produto"]); ?>" class="btn btn-primary btn-icon-split btn-sm">
					                <i class="fas fa-shopping-cart"></i> COMPRAR
					            </a>
			                </div>
							<p class="h6">R$ <?php echo number_format($row_prod["preco"],2,",",".") ?></p>
						</div>
				 		
				 		
       				</div>
     			</div>
			 	<div class="card mb-3">
				 	<div class="card-header">
					 		<h4 card="title" class="text-primary">Algumas categorias</h4>
					 		<smal><a href="<?php echo ROOT_LIB; ?>" class="text-secondary">
						 			Voltar para a home e veja todas as categorias!
						 	</a></smal>
					 </div>
			           <ul class="list-group list-group-flush">
			            <?php
				        if($num_categorias != 0){
					        while($row_cat = $res_categorias->fetch()){
			            ?>
			             <li class="list-group-item">
			               <a href="<?php echo ROOT_LIB.'home/'.$row_cat["url_amigavel"]; ?>">
				               <?php echo utf8_encode($row_cat["nome"]); ?>
				           </a>
			             </li>
			            <?php
				            }
				        }
			            ?> 
			           </ul>	
				</div>
			</div>
	  </div>
	</div>

    <hr>

	<?php
		require_once "includes/footer.php";
	?>
    
  </body>

</html>
