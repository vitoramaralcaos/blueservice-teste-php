<?php
// 05/2020 VITOR AMARAL
	
	
	if($_SESSION["parametro2"] == "ad")
	{
		$carrinho = $produtos->Add_Carrinho($_SESSION["parametro3"],session_id());
		//$num_cad_carrinho = $res_cad_carrinho->rowCount();
	}
	if($_SESSION["parametro2"] == "del")
	{
		$carrinho = $produtos->Del_Carrinho($_SESSION["parametro3"]);
	}
	if($_SESSION["parametro2"] == "editqtd")
	{
		$carrinho = $produtos->Edit_Qtd_Carrinho($_SESSION["parametro3"],$_SESSION["parametro4"]);
	}
	
	
	
	$res_carr = $produtos->Listar_Prod_Carrinho(session_id());
	$num_carr = $res_carr->rowCount();
	
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
            <li class="breadcrumb-item"><span>Carrinho de compras</span></li> 
          </ol>
        </section>
      </div>
    </section>

    <div class="container">
	  <!-- Page Heading -->
	  <div class="row">
	    <div class="col-12">
	      <h1 class="page-header">Meu carrinho de compras!</h1>
	    </div>
	  </div>
	  <div class="row">
		    <div class="col-12">
			    <?php
				if($num_carr == 0){
				?>
					<h5 class="card-title text-gray-900">
				    	Carrinho está vazio!
				    </h5>
				<?php
				}else{
			    ?>
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
				      <td>
					      <select id="select_qtd_carrinho" name="select_qtd_carrinho" onchange="Select_Qtd_Carr('<?php echo ROOT_LIB.'carrinho-de-compras/editqtd/'.md5($row_carr["id_carrinho"]); ?>')">
						      <?php
							  $cont = 1;    
							  while($cont <= 10){
								  if($cont == $row_carr["qtd"]){
									  echo '<option value="'.$cont.'" selected>'.$cont.'</option>';
								  }else{
									  echo '<option value="'.$cont.'">'.$cont.'</option>';
								  }
							  $cont = $cont + 1; 
							  }
						      ?>
					      </select><br />
					      <a href="<?php echo ROOT_LIB.'carrinho-de-compras/del/'.md5($row_carr["id_carrinho"]); ?>">Excluir</a>
				      </td>
				      <td>R$ <?php echo number_format($row_carr["preco_produto"],2,",",".") ?></td>
				    </tr>
				    <?php } ?>
				    <tr>
					    <td colspan="3" style="text-align:right">Subtotal <?php echo $subqtd; ?> iten(s)</td>
					    <td>
						    R$ <?php echo number_format($subtotal,2,",",".") ?> <br /><br />
						    <div class="btn-group">
				                <a href="<?php echo ROOT_LIB; ?>compra-etapa-1" class="btn btn-primary btn-icon-split btn-sm">
					                <i class="fa fa-arrow-right" aria-hidden="true"></i> CONTINUAR
					            </a>
			                </div>
			                <div class="">
				                <smal><a href="<?php echo ROOT_LIB; ?>" class="text-secondary">
						 			Comprar mais produtos
						 	</a></smal>
			                </div>
						</td>
				    </tr>

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
    <script>
	  // $('.toast').toast('show');
    </script>
  </body>
  	

</html>
