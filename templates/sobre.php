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
            <li class="breadcrumb-item"><span>Sobre a Loja</span></li> 
          </ol>
        </section>
      </div>
    </section>

    <div class="container">
	  <!-- Page Heading -->
	  <div class="row">
	    <div class="col-12">
	      <h1 class="page-header">Sobre a Loja</h1>
	    </div>
	    <div class="col-12 page">
	      <p>
		      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus elementum elementum arcu sit amet mollis. Phasellus tristique purus lectus, id rutrum augue fermentum at. Curabitur pretium, metus non molestie laoreet, arcu sem tempus est, venenatis rhoncus elit ipsum id tortor. Nunc pellentesque ornare felis et pellentesque. Fusce vel imperdiet diam. Morbi mollis et purus vitae tempor. Integer rutrum ex quis libero feugiat, ut lobortis nibh sodales. Ut eget dolor sit amet turpis auctor gravida. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ultricies nulla nec ante sagittis, sit amet bibendum mauris volutpat. Aenean ullamcorper euismod tellus vel rutrum. Pellentesque a dui sapien. Aliquam erat volutpat. Fusce enim leo, semper vel vehicula nec, pretium ut risus. Ut lobortis gravida nibh vel dapibus.
	      </p>
	      
	    </div>
	  </div>
	  <div class="row">
		    <div class="col-6">
			    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus elementum elementum arcu sit amet mollis. Phasellus tristique purus lectus, id rutrum augue fermentum at. Curabitur pretium, metus non molestie laoreet, arcu sem tempus est, venenatis rhoncus elit ipsum id tortor.Aliquam erat volutpat. Fusce enim leo, semper vel vehicula nec, pretium ut risus. Ut lobortis gravida nibh vel dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus elementum elementum arcu sit amet mollis. Phasellus tristique purus lectus, id rutrum augue fermentum at.</p>
		    </div>
		    <div class="col-6">
			    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus elementum elementum arcu sit amet mollis. Phasellus tristique purus lectus, id rutrum augue fermentum at. Curabitur pretium, metus non molestie laoreet, arcu sem tempus est, venenatis rhoncus elit ipsum id tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus elementum elementum arcu sit amet mollis. Phasellus tristique purus lectus, id rutrum augue fermentum at. Nunc pellentesque ornare felis et pellentesque. Fusce vel imperdiet diam. Morbi mollis et purus vitae tempor. Integer rutrum ex quis libero feugiat, ut lobortis nibh sodales. Ut eget dolor sit amet turpis auctor gravida. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ultricies nulla nec ante sagittis, sit amet bibendum mauris volutpat. Aenean ullamcorper euismod tellus vel rutrum. Pellentesque a dui sapien.</p>
		    </div>
	   </div>
	</div>

    <hr>

	<?php
		require_once "includes/footer.php";
	?>
    
  </body>

</html>
