<?php
	//Verificando Login
	require_once "_validar_login_admin.php";	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		require_once "includes/ad-head.php";
	?>
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
          <h1 class="h3 mb-4 text-gray-800">Bem-Vindo</h1>

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

</body>


</html>
