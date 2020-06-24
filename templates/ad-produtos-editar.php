<?php
// 05/2020 VITOR AMARAL

	//Verificando Login
	require_once "_validar_login_admin.php";
	
	require_once "classes/Class_Admin.php";
	$admin = new Admin();
	$res_prod = $admin->Lista_Produtos_ID($_SESSION["parametro2"]);
	$num_prod = $res_prod->rowCount();
	if($num_prod == 0){
		header("Location: ".ROOT_LIB."ad-produtos");
		die();
	}
	
	
	$row_prod = $res_prod->fetch();
	$res_cat = $admin->Lista_Produtos_Categorias();
	$num_cat = $res_cat->rowCount();
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		require_once "includes/ad-head.php";
	?>
	<link href="<?php echo ROOT_LIB; ?>tema/bootstrap-4.5.0/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	
	<script type="text/javascript" src="<?php echo ROOT_LIB; ?>tema/plugins/ckeditor-full/ckeditor.js"></script>
	<script type="text/javascript" src="<?php echo ROOT_LIB; ?>tema/plugins/ckeditor-full/samples/js/sample.js"></script>
	
	<!-- Bootstrap 3.3.6 - SELECT -->
	 <link rel="stylesheet" href="<?php echo ROOT_LIB; ?>tema/bootstrap-4.5.0/css/bootstrap.select.css">
	 <link rel="stylesheet" href="<?php echo ROOT_LIB; ?>tema/plugins/bootstrap-select-1.12.1/dist/css/bootstrap-select.min.css">
	 
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php require_once "includes/ad-menu.php"; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <?php require_once "includes/ad-topo.php"; ?>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
	          <h1 class="h3 mb-4 text-gray-800">Editar Produtos</h1>
	          
	        <div class="card shadow mb-4">
	                <div class="card-body">
		                  	<div class="row align-items-center"> 
				              	<div class="card-body col-lg-4 mb-6">
					              	<a href="<?php echo ROOT_LIB; ?>ad-produtos" class="btn btn-primary btn-icon-split btn-sm" id="btn_list">
					                    <span class="icon text-white-50">
					                      <i class="fas fa-list"></i>
					                    </span>
					                    <span class="text">Voltar para lista</span>
					                </a>
				              	</div> 	
			              	</div>
	                </div>
	        </div>
	            
	       	<div id="div_cad" style="display: block;">     
		        <div class="card shadow mb-4">
		            <div class="card-body">
			            
			            <form class="user" id="form_cad" method="post" enctype="multipart/form-data">
				            <input type="hidden" id="acao" name="acao" value="cad_produto">
				            
				            <div class="form-group">
					          <span class="text-xs font-weight-bold text-primary_2 text-uppercase mb-1">Nome do produto *</span>
			                  <input type="text" class="form-control" id="nome_produto" name="nome_produto" value="<?php echo utf8_encode($row_prod["nome"]); ?>">
			                  <span id="aviso_nome_produto" class="text-xs font-weight-bold text-danger text-uppercase mb-1" style="visibility: hidden;">Campo obrigatório</span>
			                </div>
			                <div class="form-group">
				              	<span class="text-xs font-weight-bold text-primary_2 text-uppercase mb-1">Descrição do produto</span>
				               	<textarea name="descricao_produto" id="descricao_produto" rows="10" cols="80">
				               		<?php echo utf8_encode($row_prod["descricao"]); ?>
				               	</textarea>
				               	<span id="aviso_descricao_produto" class="text-xs font-weight-bold text-danger text-uppercase mb-1" style="visibility: hidden;">Campo obrigatório</span>
			                </div>
			                <div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<span class="text-xs font-weight-bold text-primary_2 text-uppercase mb-1">Status</span>
									<select class="form-control" id="status_produto" name="status_produto">
										<option value="1" <?php echo ($row_prod["status"] == 1) ? "selected" : ""; ?> >Ativo</option>
					                    <option value="2" <?php echo ($row_prod["status"] == 2) ? "selected" : ""; ?> >Inativo</option>
			                		</select>
		                  		</div>
						  		<div class="col-sm-6">
							  		<span class="text-xs font-weight-bold text-primary_2 text-uppercase mb-1">Preço</span>
						  			<input type="text" class="form-control" id="preco_produto" name="preco_produto" placeholder="Preço" value="<?php echo number_format($row_prod["preco"],2,",",".") ?>">
		                  		</div>
		                	</div>
		                	<div class="form-group">
				              	<span class="text-xs font-weight-bold text-primary_2 text-uppercase mb-1">Categorias *</span>
				               	<select id="categorias_produto" name="categorias_produto[]" class="form-control selectpicker" multiple>
					              <?php while($row_cat = $res_cat->fetch()) { ?>
											<option value="<?php echo $row_cat["id_categoria"]; ?>" <?php echo ($row_prod["id_categorias"] == $row_cat["id_categoria"]) ? "selected" : ""; ?>><?php echo utf8_encode($row_cat["nome"]); ?></option>   	
					             <?php  } ?>
						   		</select>
						   		<span id="aviso_categorias_produto" class="text-xs font-weight-bold text-danger text-uppercase mb-1" style="visibility: hidden;">Campo obrigatório</span>
			                </div>
							<a href="javascript:Acao_Cad_Produto();" class="btn btn-primary btn-user btn-block" id="btn_cad_acervo_reg">
							Salvar
		                	</a>
							<hr>			            
				        </form>
			            
		            </div>
		            <div id="div_loading_cad" class="card-body">
		            </div>
		        </div>
			</div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php
	      require_once "includes/ad-footer.php";
      ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

<?php
	require_once "includes/ad-footer_plugins.php";
?>
<script src="<?php echo ROOT_LIB; ?>tema/bootstrap-4.5.0/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo ROOT_LIB; ?>tema/bootstrap-4.5.0//vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo ROOT_LIB; ?>tema/bootstrap-4.5.0/vendor/dist/js/demo/datatables-demo.js"></script>
<script type="text/javascript" src="<?php echo ROOT_LIB; ?>tema/plugins/maskMoney/jquery.maskMoney.min.js"></script>
<script type="text/javascript" src="<?php echo ROOT_LIB; ?>tema/plugins/bootstrap-select-1.12.1/dist/js/bootstrap-select.min.js"></script>

<script src="<?php echo ROOT_LIB; ?>includes/scripts-ad.js"></script>

<script>
	$(document).ready(function(){
		
		$("#preco_produto").maskMoney({allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
		
	});
	//initSample();
	CKEDITOR.replace( 'descricao_produto', {
		height: 350
	} );
</script>
</body>


</html>
