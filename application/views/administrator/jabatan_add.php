<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="fas fa-university"></i> Tambah Jabatan
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('administrator/dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('administrator/jabatan') ?>">Jabatan</a></li>
                            <li class="breadcrumb-item active">Tambah</li>
                        </ol>
                    </div>
                </div>
            </nav>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">

                <div class="card-body">


                    <form method="post" action="<?php echo base_url('/administrator/Jabatan/input'); ?>" class="ml-4 mr-4 mt-3 mb-3">
                        <div class="form-group">
                            <label class="font-weight-bold">Jabatan</label>
                            <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" placeholder="" required>
                            <?php echo form_error('nama_jabatan', '<div class="text-danger small" ml-3>'); ?>
                        </div>
                        <hr>
                        <a href="<?php echo base_url('administrator/jabatan') ?>" class="btn btn-secondary mt-2 mr-2"><i class="fas fa-chevron-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save"></i> Simpan</button>
                    </form>




                </div>
            </div>
        </div>
    </section>

</div>