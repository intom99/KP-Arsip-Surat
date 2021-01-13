<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="fas fa-user"></i> Tambah User
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right bg-light">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('administrator/dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('administrator/user') ?>">User</a></li>
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

                    <form action="<?php echo base_url('administrator/user/input') ?>" method="post" class="ml-4 mr-4 mt-3 mb-3" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col">

                                <div class="form-group">
                                    <label class="font-weight-bold">Nama</label>
                                    <select name="id_karyawan" class="form-control" required>
                                        <option value="">--Pilih Karyawan--</option>
                                        <?php foreach ($karyawan as $row) : ?>
                                            <option value="<?php echo $row->id_karyawan;
                                                            ?> "><?php echo $row->nama_karyawan ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" required placeholder="Username">
                                    <?php echo form_error('username', '<small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="font-weight-bold">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                    <?php echo form_error('password', '<small class="text-danger pl-2">', '</small>'); ?>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Level</label>
                            <select name="level" class="form-control" required>
                                <option value="">--Pilih Level--</option>

                                <option value="admin">Admin</option>
                                <option value="ketua">Ketua</option>

                            </select>
                        </div>


                        <hr>
                        <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save"></i> Simpan</button>
                        <a href="<?php echo base_url('/administrator/user') ?>" class="btn btn-danger mt-2 ml-2"><i class="fas fa-times"></i> Batal</a>

                    </form>

                </div>
            </div>
        </div>
    </section>

</div>