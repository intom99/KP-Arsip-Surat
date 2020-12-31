<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="fas fa-file"></i> Jenis Surat</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right bg-light">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('administrator/dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Jenis Surat</li>
                        </ol>
                    </div>
                </div>
            </nav>
            <?php echo $this->session->flashdata('pesan') ?>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <!-- card of tables -->
            <div class="card">
                <div class="card-body">
                    <a href="<?php echo base_url() . 'administrator/Jenis_surat/add/' ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>

                    <hr>

                    <table class="table table-bordered table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>JENIS SURAT</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($jenis_surat as $row) : ?>

                                <tr>
                                    <td width="20px"><?php echo $no++; ?></td>
                                    <td><?php echo $row->jenis_surat; ?></td>


                                    <td width="200px" class="text-center">
                                        <a href="<?php echo base_url() ?>administrator/jenis_surat/edit/<?php echo $row->id_js; ?>" class="btn btn-sm btn-primary mr-2" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                                        <a onclick="javascript: return confirm('Apakah anda yakin akan menghapus data jenis surat ?');" href="<?php echo base_url() ?>administrator/jenis_surat/delete/<?php echo $row->id_js; ?>" class=" btn btn-sm btn-danger" title="Hapus"><i class="fa fa-trash"></i> Hapus</a>
                                    </td>

                                </tr>

                            <?php endforeach ?>

                        </tbody>

                    </table>
                </div>
            </div>
            <!-- card of tables end -->

        </div>

    </section>



</div>