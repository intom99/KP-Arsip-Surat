<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="fas fa-user"></i> Edit User
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right bg-light">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('administrator/dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('administrator/user') ?>">User</a></li>
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

                    <?php foreach ($user as $row) : ?>
                        <form action="<?php echo base_url('administrator/user/update') ?>" method="post" class="ml-4 mr-4 mt-3 mb-3" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col">

                                    <div class="form-group">
                                        <label class="font-weight-bold">Username</label>
                                        <input type="hidden" name="id" class="form-control" value="<?php echo $row->id ?>">
                                        <input type="text" class="form-control" id="username" name="username" required placeholder="Masukkan Username" value="<?php echo $row->username ?>">
                                        <?php echo form_error('no_surat', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" required value="<?php echo $row->password ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Level</label>
                                <select name="level" class="form-control" required>
                                    <option value="">--Pilih Level--</option>
                                    <option value="admin" <?php if ($row->level == "admin") {
                                                                echo "selected=\"selected\"";
                                                            } ?>>
                                        Admin</option>
                                    <option value="ketua" <?php if ($row->level == "ketua") {
                                                                echo "selected=\"selected\"";
                                                            } ?>>
                                        Ketua</option>




                                </select>
                            </div>


                            <hr>
                            <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save"></i> Simpan</button>
                            <a href="<?php echo base_url('/administrator/user') ?>" class="btn btn-danger mt-2 ml-2"><i class="fas fa-times"></i> Batal</a>

                        </form>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </section>

</div>