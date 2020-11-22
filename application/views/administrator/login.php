<body class="bg-gradient-info">

  <div class="container"><br><br><br>

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5 col-lg-6 col-md-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <img src="<?php echo base_url() ?>assets/img/gambar.png" alt="gambar logo" height="90px" width="100px" class="text-center mb-3">
                    <h1 class="h4 text-gray-900 mb-4">KSPPS BMT Sehati</h1>
                    <?php echo $this->session->flashdata('pesan') ?>
                  </div>
                  <form method="post" action="<?php echo base_url('auth/proses_login') ?>" class="user">
                    <div class="form-group mb-4">
                      <input type="text" class="form-control border border-dark" id="username" placeholder="Username" name="username" value="<?= set_value('username'); ?>">
                      <?php echo form_error('username', '<small class="text-danger pl-2">', '</small>'); ?>

                    </div>
                    <div class="form-group">
                      <!-- masih salah -->
                      <!-- <input type="password" class="form-control border border-dark" id="password" maxlength="10" placeholder="Password" name="password"> -->

                      <input type="password" class="form-control border border-dark" maxlength="10" placeholder="Password" name="password">
                      <?php echo form_error('password', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>


                    <button class="btn btn-primary btn-block mt-5 mb-3">Login</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>