<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="fas fa-university"></i> Edit Jabatan
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right bg-light">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('Jabatan') ?>">Jabatan</a></li>
                            <li class="breadcrumb-item active">Edit</li>
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
                    <?php foreach ($jabatan as $row) : ?>

                        <form method="post" action="<?php echo base_url('Jabatan/update') ?>" class="ml-4 mr-4 mt-3 mb-3">

                            <div class="form-group">
                                <label class="font-weight-bold">Jabatan</label>
                                <input type="hidden" name="id_jabatan" value="<?php echo $row->id_jabatan ?>">
                                <input type="text" name="nama_jabatan" class="form-control" value="<?php echo $row->nama_jabatan ?>" required>
                                <?php echo form_error('nama_jabatan', '<div class="text-danger small" ml-3>'); ?>
                            </div>

                            <hr>
                            <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save"></i> Update</button>
                            <a href="<?php echo base_url('Jabatan') ?>" class="btn btn-danger mt-2 ml-2"><i class="fas fa-times"></i> Batal</a>
                        </form>



                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </section>

</div>