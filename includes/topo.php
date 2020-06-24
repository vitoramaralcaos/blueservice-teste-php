<?php
	
	$val_carr = $produtos->Valores_Carrinho(session_id());
	$num_val_carr = $val_carr->rowCount();
	$row_val_carr = $val_carr->fetch();

		
	if($row_val_carr["total"] == 0){
		$carr_valor = "0,00";
		$carr_qtd = 0;
	}else{
		$carr_valor = $row_val_carr["total_valor"];
		$carr_qtd = $row_val_carr["total_qtd"];
	}
	

	
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
	        <a href="<?php echo ROOT_LIB; ?>home/" class="navbar-brand">
	        	<img src="<?php echo ROOT_LIB; ?>imagens/logotipo-loja-nome.png" width="300px" /> 
	        </a>
	        
	        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarContainer" aria-controls="navbarContainer" aria-expanded="false" aria-label="Toggle navigation">
            	<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-end" id="navbarContainer">
		      <form id="search_mini_form" class="d-lg-none d-md-block" method="get" action="/search">
	              <div class="input-group mb-3">
	                <input type="text" value="" name="q" class="form-control form-control-sm" onFocus="javascript:this.value=''" placeholder="Search for products" />
	                <button type="submit" class="btn btn-outline-secondary"><i class="fas fa-search"></i></button>
	              </div>
            	</form>
            <ul id="navbarContainerMobile" class="navbar-nav d-lg-none">
              
	            <li class="nav-item  ">
					<a href="<?php echo ROOT_LIB; ?>"  title="Inicio" class="level-1 trsn nav-link" >Inicio</a>
				</li>
				<li class="nav-item  ">
					<a href="<?php echo ROOT_LIB; ?>sobre"  title="About Us" class="level-1 trsn nav-link" >Sobre Nós</a>
				</li>
				<li class="nav-item  ">
					<a href="<?php echo ROOT_LIB; ?>contato"  title="Contact" class="level-1 trsn nav-link" >Contato</a>
				</li>
            </ul>
            <ul class="nav navbar-nav float-right nav-top">
              <li >
                <a id="cart-link" href="<?php echo ROOT_LIB; ?>carrinho-de-compras" class="trsn nav-link text-primary" title="View/Edit Cart">
                  <i class="fas fa-shopping-cart"></i>
                  <span id="nav-bar-cart"><span class="cart-size"><?php echo $carr_qtd; ?></span> Produtos(s) | R$ <?php echo $carr_valor; ?></span>
                </a>
              </li>
              <!-- 
              <li >
                <a href="" id="login-link" class="trsn nav-link text-primary" title="Login toBootstrap">
                  <i class="fas fa-user"></i>
                  <span class="customer-name">
                    &nbsp;Login
                  </span>
                </a>
              </li>
              -->
            </ul>
            <form id="search_mini_form" class="navbar-form float-right form-inline d-none d-lg-flex" method="post" enctype="multipart/form-data" action="<?php echo ROOT_LIB; ?>buscar-produtos">
              <input type="text" value="" name="inputBusca" class="form-control form-control-sm" placeholder="Buscar produtos" />
              <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></button>
            </form>
          </div>
        </div>
      </nav>