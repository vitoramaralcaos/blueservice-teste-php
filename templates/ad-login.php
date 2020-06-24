<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->

  <head>
    <title>Loja BlueService</title>
    <?php
		require_once "includes/head.php";
	?>
</head>

  <body>
    <!-- Navigation -->
    <div class="fixed-top">
     
    </div>

    <div class="container">
	  <!-- Page Heading -->
	  	<div class="row">
	    	<div class="col-5-lg mx-auto">
	        	<div class="text-center">
	          
					<div class="card mb-4 shadow-sm">
						<img src="<?php echo ROOT_LIB; ?>imagens/logo-login.png" />
						<div class="card-body">
							<form class="user" id="login" name="login" method="post" class="form-signin" enctype="multipart/form-data">
								<input type="hidden" name="login" id="login" value="acao">
								<input type="hidden" name="acao" id="acao" value="<?php echo md5("login"); ?>">  
						      <div>
							    <div class="form-group">
							      <input type="text" name="inputLogin" id="inputLogin" class="text form-control" placeholder="Login..." />  
							    </div>
							    <div class="form-group">
							      <input type="text" name="inputPassword" id="inputPassword" class="text form-control" placeholder="Senha..." />  
							    </div>
							    <div style="text-align:right;" class="form-group">
							      <input type="button" value="Entrar" onclick="javascript:Login();" class="button btn btn-primary btn-block" />
							    </div>
							    <div id="response_login" class="form-group text-center" style="display: none;">
							    </div>
					  		  </div>
							</form>
				        </div>
					</div>
	          
	          
	        	</div>
	    	</div>
		</div>
	</div>

    <hr>

	<div class="container">
      <footer>
        <div class="row">
          <div class="col-12 col-md-6 order-2 order-md-1">
            <p class="powerd-by">&copy; 2020 Loja virtual fictícia para estudo.</p>
          </div>
          <div class="col-12 col-md-6 order-1 order-md-2">
          </div>

        </div>
      </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
    <script src="<?php echo ROOT_LIB; ?>includes/scripts-ad.js"></script>
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </body>

</html>
