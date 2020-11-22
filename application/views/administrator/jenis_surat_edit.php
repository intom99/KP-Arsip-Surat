<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="fas fa-file"></i> Edit Jenis Surat
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('administrator/dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('administrator/jenis_surat') ?>">Jenis Surat</a></li>
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
                    <?php foreach ($jenis_surat as $row) : ?>

                        <form method="post" action="<?php echo base_url('administrator/Jenis_surat/update') ?>" class="ml-4 mr-4 mt-3 mb-3">

                            <div class="form-group">
                                <label class="font-weight-bold">Jenis Surat</label>
                                <input type="hidden" name="id_js" value="<?php echo $row->id_js ?>">
                                <input type="text" name="jenis_surat" class="form-control" value="<?php echo $row->jenis_surat ?>">
                            </div>
                            <hr>
                            <a href="<?php echo base_url('administrator/Jenis_surat') ?>" class="btn btn-secondary mt-2 mr-2"><i class="fas fa-chevron-left"></i> Kembali</a>
                            <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save"></i> Update</button>
                        </form>



                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </section>

</div>