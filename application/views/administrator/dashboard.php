<div class="container-fluid">


  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"> Dashboard</h1>
    <!-- Nav -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light">
        <li class="breadcrumb-item active" aria-current="page"> <i class="fas fa-tachometer-alt"></i> Dashboard /</li>
      </ol>
    </nav>
  </div>

  <!--  -->
  <div class="row">

    <!--  -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Surat Masuk</div>
              <div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $suratMasuk ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-envelope fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--  -->

    <!--  -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Surat Keluar</div>
              <div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $suratKeluar ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-envelope-open fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--  -->
    <!--  -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Instansi</div>
              <div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $instansi ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-university fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--  -->
    <!--  -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Users</div>
              <div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $users ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--  -->

  </div>

  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">Selamat Datang!!</h4>
    <p>Selamat Datang <strong><?php echo $username; ?></strong>, Anda Login Sebagai <strong><?php echo $level; ?></strong></p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <div class="jumbotron jumbotron-fluid">
    <div class="container text-dark text-center">
      <h1 class="display-4">KSPPS BMT Sehati</h1>
      <p class="lead">Visi dan Misi</p>
      <p>Berperan serta dalam usaha pemberdayaan perekonomian umat, KSPPS Sehati selalu mengembangkan diri menjadi lembaga keuangan yang berprinsip syariah sehingga dapat menjembatani antara pelaku usaha dengan penyedia dana sebagai sumber permodalan dan pengembangan usaha yang sehat dan islami. Dapat turut serta menciptakan masyarakat madani seperti yang kita cita-citakan bersama.</p>
    </div>
  </div>

  <!-- Batas Table Baru -->

  <!--  -->

</div>