


<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo ROOT_LIB; ?>home">
        <!-- <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div> -->
        <div class="logo-menu">
          <img src="<?php echo ROOT_LIB; ?>imagens/logotipo-loja.png" width="80px" />
        </div>
        <div class="sidebar-brand-text mx-1">Loja<sup>Blue</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link animsition-link" href="<?php echo ROOT_LIB; ?>home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      
       <!-- Heading -->
      <div class="sidebar-heading">
        Administração
      </div>
      
        <li class="nav-item <?php echo $navActiveU; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUserSistem" aria-expanded="true" aria-controls="collapseUserSistem">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Produtos</span>
        </a>
        <div id="collapseUserSistem" class="collapse" aria-labelledby="headingUserSistem" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Administrar produtos:</h6>
            <a class="animsition-link collapse-item" href="<?php echo ROOT_LIB; ?>ad-produtos" data-animsition-out-class="fade-out-up">Produtos</a>
            <a class="animsition-link collapse-item" href="<?php echo ROOT_LIB; ?>ad-produtos-categorias" data-animsition-out-class="fade-out-up">Categorias</a>
          </div>
        </div>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>