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
            <li class="breadcrumb-item"><span>Contato</span></li> 
          </ol>
        </section>
      </div>
    </section>

    <div class="container">
	  <!-- Page Heading -->
	  <div class="row">
	    <div class="col-12">
	      <h1 class="page-header">Contato</h1>
	    </div>
	  </div>
	  <div class="row">
		    <section class="col-md-6 mb-3">
		      <h2>Entre em Contato</h2>
		      <p>Envie uma mensagem e responderemos o mais rápido possível.</p>
		      <h5 class="card-title text-gray-900">
			    	<i class="fa fa-check text-success" aria-hidden="true"></i>
			    	xxxxxxx@xxxxx.com
			    </h5>
		      <!-- DESABILITADO PORQUE NAO FOI FEITA A PROGRAMACAO DE ENVIO **********
		      <form action="#" accept-charset="UTF-8" method="post" id="contact_form">  
			      <div id="">
		    
				    <div id="" class="field">
				      <label for="email" class="required">E-mail <em>*</em></label><br>
				      <input type="email" name="contact[email]" id="contact_email" class="text form-control" required="required" autocomplete="email" />
				      
				    </div>
				    <div id="contactpage_name" class="field">
				      <label for="" class="required">Nome <em>*</em></label><br>
				      <input type="text" name="" id="" class="text form-control" required="required" autocomplete="name" />
				      
				    </div>
				    <div id="contactpage_phone" class="field">
				      <label for="">Telefone</label><br>
				      <input type="tel" name="" id="" class="text form-control" autocomplete="tel" />
				      
				    </div>
				    <div id="contactpage_message">
				      <label for="" class="required">Mensagem <em>*</em></label><br>
				      <textarea name="" id="" class="text form-control" style="height:10em;" required="required">
					  </textarea>  
				    </div>
					<p class="required">* Campos obrigatórios</p>
				    <div style="text-align:right;" class="actions">
				      <input type="submit" value="Submit" class="button btn btn-primary btn-block" />
				    </div>
		  		  </div>
				</form>
				-->
		    </section>
		
		    <section class="col-md-6">
		      <h2>Informações para contato</h2>
		      <ul id="contact-list">
		        
		        <li><i class="fas fa-phone"></i> 
		        	<a href="https://api.whatsapp.com/send?phone=+551191111111" target="_blank">+55 11 9111.1111</a>
		        </li>
		        <li><i class="fas fa-map-marker"></i> Rua Paulista xxx</li>
		      </ul>
		      
		      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.148782137148!2d-46.65657654886874!3d-23.563099367467682!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce59c8da0aa315%3A0xd59f9431f2c9776a!2sAv.%20Paulista%2C%20S%C3%A3o%20Paulo%20-%20SP!5e0!3m2!1spt-BR!2sbr!4v1592786450983!5m2!1spt-BR!2sbr" width="100%" height="390" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		
		    </section>
		</div>
	</div>

    <hr>

	<?php
		require_once "includes/footer.php";
	?>
    
  </body>

</html>
