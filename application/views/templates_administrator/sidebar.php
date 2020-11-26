<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('administrator/dashboard') ?>">
        <div class="sidebar-brand-icon">
          <div>KSPPS</div>
        </div>
        <div class="sidebar-brand-text mx-2">BMT Sehati</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('administrator/dashboard') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-database"></i>
          <span>Master Data</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Sub-Master Data :</h6> -->
            <a class="collapse-item" href="<?php echo base_url('administrator/karyawan') ?>">Karyawan</a>
            <a class="collapse-item" href="<?php echo base_url('administrator/jabatan') ?>">Jabatan</a>
            <a class="collapse-item" href="<?php echo base_url('administrator/instansi') ?>">Instansi</a>
            <a class="collapse-item" href="<?php echo base_url('administrator/jenis_surat') ?>">Jenis Surat</a>
          </div>
        </div>
      </li>

      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Arsip
      </div>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('administrator/surat_masuk/') ?>">
          <i class="far fa-envelope"></i>
          <span>Surat Masuk</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('administrator/Surat_keluar/') ?>">
          <i class="far fa-envelope-open"></i>
          <span>Surat Keluar</span></a>
      </li>

      <hr class="sidebar-divider">

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-folder"></i>
          <span>Arsip</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!--  <h6 class="collapse-header">Sub-Laporan:</h6> -->
            <a class="collapse-item" href="<?php echo base_url('administrator/Arsip_surat_masuk') ?>">Arsip Surat Masuk</a>
            <a class="collapse-item" href="<?php echo base_url('administrator/Arsip_surat_keluar') ?>">Arsip Surat Keluar</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Setting
      </div>



      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('administrator/user') ?>">
          <i class="fas fa-user"></i>
          <span>Users</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <!-- Topbar Search -->
          <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
          <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
              </button>
            </div>
          </div>
        </form> -->
          <!-- Topbar Search End (Ditutup sementara) -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <!-- <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-search fa-fw"></i>
            </a> -->
            <!-- Dropdown - Messages -->
            <!-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
              <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                  <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                      <i class="fas fa-search fa-sm"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li> -->

            <ul class="nav navbar-nav navbar-right mt-2">
              <?php if ($this->session->userdata('username')) { ?>
                <li>
                  <b> <i class="fas fa-user-circle"></i>
                    <?php echo $this->session->userdata('username'); ?></b>
                </li>

              <?php } ?>
            </ul>


            <div class="topbar-divider d-none d-sm-block"></div>

            <ul class="nav navbar-nav navbar-right mt-2">
              <?php if ($this->session->userdata('username')) { ?>

                <li class="mr-3"><i class="fas fa-sign-out-alt"></i><?php echo anchor('auth/logout', ' Logout'); ?></li>
              <?php } else { ?>
                <li><?php echo anchor('auth/login', 'Login'); ?></li>
              <?php } ?>
            </ul>


          </ul>

        </nav>