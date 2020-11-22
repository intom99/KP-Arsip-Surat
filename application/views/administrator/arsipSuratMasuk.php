<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="fas fa-folder"></i> Arsip Surat Masuk</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('administrator/dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Arsip Surat Masuk</li>
                        </ol>
                    </div>
                </div>
            </nav>
            <?php echo $this->session->flashdata('pesan') ?>
        </div>
    </section>



    <!-- content -->
    <section class="content">
        <div class="container-fluid">

            <!-- card of tables -->
            <div class="card">
                <div class="card-body">
                    <!-- button here-->

                    <hr>

                    <table class="table table-bordered table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Instansi</th>
                                <th>No. Surat, Tanggal Surat</th>
                                <th>Macam Surat</th>
                                <th>Perihal</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($arsip_surat_masuk as $row) : ?>

                                <tr>
                                    <td width="20px"><?php echo $no++; ?></td>
                                    <td></td>
                                    <td><?php echo $row->nama_instansi ?></td>

                                    <td width="200px"><?php echo $row->no_surat . '<br><br>' . $row->tgl_surat ?></td>

                                    <td><?php echo $row->jenis_surat ?></td>
                                    <td><?php echo $row->perihal . ',<br> ' . $row->ket ?></td>




                                </tr>

                            <?php endforeach ?>

                        </tbody>

                    </table>
                </div>
            </div>
            <!-- card of tables end -->

        </div>
    </section>
    <!-- content end -->

</div>