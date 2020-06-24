<?php
	//Verificando Login
	require_once "_validar_login_admin.php";
	
	require_once "classes/Class_Admin.php";
	$admin = new Admin();
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
	          <h1 class="h3 mb-4 text-gray-800">Categorias</h1>
	          
	        <div class="card shadow mb-4">
	                <div class="card-body">
		                  	<div class="row align-items-center"> 
				              	<div class="card-body col-lg-4 mb-6">
					              	<a href="javascript:Div_Categorias('cad_categoria');" class="btn btn-primary btn-icon-split btn-sm" id="btn_cad">
					                    <span class="icon text-white-50">
					                      <i class="fas fa-plus"></i>
					                    </span>
					                    <span class="text">Cadastrar nova categoria</span>
					                </a>
				              	</div> 
				              	<div id="div_btn_list" class="card-body col-lg-4 mb-6" style="display: none;">
					              	<a href="javascript:Div_Categorias('list_categoria');" class="btn btn-primary btn-icon-split btn-sm" id="btn_list">
					                    <span class="icon text-white-50">
					                      <i class="fas fa-list"></i>
					                    </span>
					                    <span class="text">Voltar para lista</span>
					                </a>
				              	</div>	
			              	</div>
	                </div>
	        </div>
	            
	       	<div id="div_cad" style="display: none;">     
		        <div class="card shadow mb-4">
		            <div class="card-body">
			            
			            <div class="row align-items-center"> 
							<div class="card-body col-lg-3 mb-6">
			              		<span class="text-xs font-weight-bold text-primary_2 text-uppercase mb-1">Nome da categoria</span>
			              		<input id="nome_categoria" name="nome_categoria" type="text" class="form-control" placeholder="" value="">
			              		<span id="aviso_nome_categoria" class="text-xs font-weight-bold text-danger text-uppercase mb-1" style="visibility: hidden;">Campo obrigatório</span>
			              	</div>
			              	
			              	<div class="card-body col-lg-3 mb-6">
				              	<a href="javascript:Acao_Cad_Categoria();" class="btn btn-primary btn-icon-split btn-sm">
				                    <span class="icon text-white-50">
				                      <i class="fas fa-plus-square"></i>
				                    </span>
				                    <span class="text">Cadastrar</span>
				                </a>
			              	</div> 	
		              	</div>
			            
		            </div>
		            <div id="div_loading_cad" class="card-body">
		            </div>
		        </div>
			</div>
			
			<div id="div_edit" style="display: none;">     
		        <div class="card shadow mb-4">
		            <div class="card-body">
			            
			            <div class="row align-items-center"> 
							<div class="card-body col-lg-3 mb-6">
			              		<span class="text-xs font-weight-bold text-primary_2 text-uppercase mb-1">Nome da categoria</span>
			              		<input id="nome_categoria_edit" name="nome_categoria_edit" type="text" class="form-control" placeholder="" value="">
			              		<input id="nome_categoria_edit_id" name="nome_categoria_edit_id" type="hidden" value="">
			              		<span id="aviso_nome_categoria_edit" class="text-xs font-weight-bold text-danger text-uppercase mb-1" style="visibility: hidden;">Campo obrigatório</span>
			              	</div>
			              	
			              	<div class="card-body col-lg-3 mb-6">
				              	<a href="javascript:Acao_Edit_Categoria();" class="btn btn-primary btn-icon-split btn-sm">
				                    <span class="icon text-white-50">
				                      <i class="fas fa-check"></i>
				                    </span>
				                    <span class="text">Salvar edição</span>
				                </a>
			              	</div> 	
		              	</div>
			            
		            </div>
		            <div id="div_loading_edit" class="card-body">
		            </div>
		        </div>
			</div>
			
	          <!-- DataTales Example -->
	        <div id="div_lista" style="display: block;">
		        
	          <div class="card shadow mb-4">
	
						  	
	            <div class="card-header py-3">
	              <h6 class="m-0 font-weight-bold text-primary">Lista de todos os gêneros cadastrados</h6>
	            </div>
	            <div class="card-body">
		          <?php
			        if($num_cat == 0){
				        echo "Nenhuma categoria foi encontrada!";
			        }else{
		          ?>
	              <div class="table-responsive">
	                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	                  <thead>
	                    <tr>
	                      <th>Nome do Gênero</th>
	                      <th></th>
	                    </tr>
	                  </thead>
	                  <tfoot>
	                    <tr>
	                      <th>Nome do Gênero</th>
	                      <th></th>
	                    </tr>
	                  </tfoot>
	                  <tbody>
		                <?php
			                $cont = 1;
			                 while ($row = $res_cat->fetch()) { ?>
	                    <tr>
	                      <td>
		                      	<span class="text-gray-600">
					                <?php echo utf8_encode($row["nome"]); ?>
					                <input type="hidden" value="<?php echo utf8_encode($row["nome"]); ?>" id="categoria_<?php echo $cont; ?>">
					            </span>
					         
		                 </td>
	                      <td>
				                <a href="javascript:Editar_Categoria('<?php echo $cont; ?>','<?php echo md5($row["id_categoria"]);?>');" class="btn btn-warning btn-user btn-sm">
					                    <i class="fa fa-fw fa-exclamation-triangle"></i> editar
					            </a>
					            <a href="javascript:Acao_Del_Categoria('<?php echo $cont; ?>','<?php echo md5($row["id_categoria"]);?>');" class="btn btn-danger btn-user btn-sm" id="btn_del<?php echo $cont; ?>">
					                    <i class="fa fa-fw fa-times-circle"></i> deletar
					            </a>
	                      </td>
	                    </tr>
	                    <?php $cont = $cont + 1;
		                    } ?>
	                  </tbody>
	                </table>
	              </div>
	              <?php
		          }
	              ?>
	            </div>
	          </div> 
	          
	        </div><!-- fim table -->

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

<script src="<?php echo ROOT_LIB; ?>includes/scripts-ad.js"></script>

</body>


</html>
