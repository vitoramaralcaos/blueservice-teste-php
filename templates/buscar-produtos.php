<?php
	
	if(isset($_POST['inputBusca'])){
		if($_POST['inputBusca'] != ""){
		$res_busca_prod = $produtos->Buscar_Lista_Produtos($_POST['inputBusca']);
		$num_busca_prod = $res_busca_prod->rowCount();
	
		$termo_buscado = $_POST['inputBusca'];
		}else{
			$num_busca_prod = 0;
			$termo_buscado = "";
		}
	
	}else{
		$num_busca_prod = 0;
		$termo_buscado = "";
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
            <li class="breadcrumb-item"><span>Buscar Produtos</span></li> 
          </ol>
        </section>
      </div>
    </section>

    <div class="container">
	  <!-- Page Heading -->
	  <div class="row">
	    <div class="col-12">
	      <h1 class="page-header">Resultado da Busca</h1>
	    </div>
	    <div class="col-12 page">
	      <p>Termo buscado: (<?php echo $termo_buscado; ?>)
	      </p>
	      
	    </div>
	  </div>
	  <div class="row">
		    <div class="col-12">
			    <?php
				if($num_busca_prod == 0){
				?>
					<h5 class="card-title text-gray-900">
				    	Nenhum produto foi encontrado!
				    </h5>
				<?php
				}else{
			    ?>
				<table class="table table-striped">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Produto</th>
				      <th scope="col">Preço</th>
				      <th scope="col">#</th>
				    </tr>
				  </thead>
				  <tbody>
					<?php while($row_busca = $res_busca_prod->fetch()){ 
					?>
				    <tr>
				      <th scope="row">
					      <div class="card" style="width: 80px">
					      	<div class="crop-img">
						      <img src="<?php echo ROOT_LIB.'imagens-produtos/'.$row_busca["imagem"]; ?>" width="300px" />
					      	</div>
					      </div>
				      </th>
				      <td><?php echo utf8_encode($row_busca["nome_produto"]); ?></td>
				      <td>R$ <?php echo number_format($row_busca["preco"],2,",",".") ?></td>
				      <td>
					      	<button type="button" class="btn btn-sm btn-outline-primary" onclick="location.href='<?php echo ROOT_LIB; ?>detalhe-produto/<?php echo $row_busca["url_amigavel_produto"]; ?>'">
								<i class="fa fa-eye" aria-hidden="true"></i>
						  	</button>
				      </td>
				    </tr>
				    <?php } ?>

				  </tbody>
				</table>
				<?php
				}//IF
				?>
		    </div>
	   </div>
	</div>

    <hr>

	<?php
		require_once "includes/footer.php";
	?>
    
  </body>

</html>
