<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="fas fa-envelope"></i> Detail Surat Masuk</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right bg-light">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('administrator/dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('administrator/surat_masuk') ?>">Surat Masuk</a></li>
                            <li class="breadcrumb-item active">Detail</li>
                        </ol>
                    </div>
                </div>
            </nav>
        </div>
    </section>



    <!-- content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card">

                <div class="card-body">
                    <a href="<?php echo base_url() ?>administrator/surat_masuk/" class="btn btn-secondary" title="Kembali"><i class="fas fa-chevron-left"></i> Kembali</a>
                    <a href="<?php echo base_url() ?>administrator/surat_masuk/edit/<?php echo $suratMasuk->id_surat_masuk ?>" class="btn btn-primary ml-2" title="Edit"><i class="fas fa-edit"></i> Edit</a>
                    <hr>
                    <!--  -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="dataSurat-tab" data-toggle="tab" href="#dataSurat" role="tab" aria-controls="dataSurat" aria-selected="true">Data Surat</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="arsipSurat-tab" data-toggle="tab" href="#arsipSurat" role="tab" aria-controls="arsipSurat" aria-selected="false">Arsip Surat</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="dataSurat" role="tabpanel" aria-labelledby="dataSurat-tab">

                            <!-- table -->
                            <table class="table text-left mt-5">

                                <tr>
                                    <td width="200px" class="font-weight-bold">Nomor Surat</td>
                                    <td width="30px">:</td>
                                    <td><?php echo $suratMasuk->no_surat ?></td>

                                </tr>
                                <tr>
                                    <td width="200px" class="font-weight-bold">Tanggal Surat</td>
                                    <td width="30px">:</td>
                                    <td><?php echo $suratMasuk->tgl_surat = date('d M Y', strtotime($suratMasuk->tgl_surat)); ?></td>
                                    <!-- tanggal surat coba berurutan -->

                                </tr>
                                <tr>
                                    <td width="200px" class="font-weight-bold">Asal Surat</td>
                                    <td width="30px">:</td>
                                    <td><?php echo $suratMasuk->nama_instansi ?></td>

                                </tr>

                                <tr>
                                    <td width="200px" class="font-weight-bold">Jenis Surat</td>
                                    <td width="30px">:</td>
                                    <td><?php echo $suratMasuk->jenis_surat ?></td>
                                </tr>
                                <tr>
                                    <td width="200px" class="font-weight-bold">Perihal</td>
                                    <td width="30px">:</td>
                                    <td><?php echo $suratMasuk->perihal ?></td>


                                </tr>
                                <tr>
                                    <td width="200px" class="font-weight-bold">Keterangan</td>
                                    <td width="30px">:</td>
                                    <td><?php echo $suratMasuk->ket ?></td>

                                </tr>

                            </table>
                            <table class="table text-left mt-5">
                                <tr>
                                    <td width="200px" class="font-weight-bold">Tanggal Diinput</td>
                                    <td width="30px">:</td>
                                    <td><?php echo date('d M Y H:i:s', strtotime($suratMasuk->created))  ?></td>
                                </tr>
                                <tr>
                                    <td width="200px" class="font-weight-bold">Tanggal Diedit</td>
                                    <td width="30px">:</td>
                                    <td><?php if ($suratMasuk->modified == null) {
                                            echo '-';
                                        } else {
                                            echo date('d M Y H:i:s', strtotime($suratMasuk->modified));
                                        } ?></td>
                                </tr>
                            </table>

                            <!-- end table -->

                        </div>
                        <div class="tab-pane fade" id="arsipSurat" role="tabpanel" aria-labelledby="arsipSurat-tab">
                            <embed class="mt-5" width="1270" height="600" src="<?php echo base_url('assets/arsip/surat-masuk' . $suratMasuk->lampiran); ?>" type="application/pdf"></embed>

                        </div>
                    </div>



                </div>
            </div>










        </div>
    </section>
    <!-- content end -->

</div>