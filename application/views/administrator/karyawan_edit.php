<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="fas fa-university"></i> Edit Karyawan
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right bg-light">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('administrator/dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('administrator/dashboard') ?>">Karyawan</a></li>
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

                    <?php foreach ($karyawan as $rows) : ?>
                        <form method="post" action="<?php echo base_url('administrator/karyawan/update') ?>" class="ml-4 mr-4 mt-3 mb-3">

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Karyawan</label>
                                <input type="hidden" name="id_karyawan" class="form-control" value="<?php echo $rows->id_karyawan ?>">
                                <input type="text" name="nama_karyawan" placeholder=" Masukkan Nama" required class="form-control" value="<?php echo $rows->nama_karyawan ?>">

                                <?php echo form_error('nama_karyawan', '<div class="text-danger small" ml-3>'); ?>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Jabatan</label>
                                <select name="id_jabatan" class="form-control" required>
                                    <option value="">--piilih jabatan --</option>
                                    <?php foreach ($jabatan as $row) : ?>
                                        <option value="<?php echo $row->id_jabatan ?>" <?php if ($row->id_jabatan == $rows->id_jabatan) {
                                                                                            echo "selected=\"selected\"";
                                                                                        } ?>><?php echo $row->nama_jabatan ?></option>

                                    <?php endforeach ?>

                                </select>
                                <?php echo form_error('id_jabatan', '<div class="text-danger small" ml-3>'); ?>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save"></i> Update</button>
                            <a href="<?php echo base_url('administrator/karyawan') ?>" class="btn btn-danger mt-2 ml-2"><i class="fas fa-times"></i> Batal</a>

                        </form>
                    <?php endforeach ?>

                </div>
            </div>
        </div>
    </section>

</div>