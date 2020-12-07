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

                    <!--  -->

                    <!--  -->
                    <hr>

                    <form action="<?php echo base_url('administrator/Arsip_surat_masuk/filter') ?>" method="post" target="_blank">
                        <div class="form-group">
                            <input type="hidden" name="nilai_filter" value="1">
                            <label>Tanggal Awal :</label>
                            <label class="ml-2">
                                <input type="date" name="tgl_awal" class="form-control" required>
                            </label>
                            <label class="ml-5">Tanggal Akhir :</label>
                            <label class="ml-2"><input type="date" name="tgl_akhir" class="form-control" required>
                            </label>
                            <input type="submit" value="print">
                        </div>
                    </form>

                    <form action="<?php echo base_url('administrator/Arsip_surat_masuk/filter') ?>" method="post" target="_blank">
                        <div class="form-group">
                            <H3>Filter By Bulan</H3>
                            <input type="hidden" name="nilai_filter" value="2">
                            <select name="tahun1">
                                <?php foreach ($tahun as $row) : ?>
                                    <option value="<?php echo $row->Tahun ?>"><?php echo $row->Tahun ?></option>

                                <?php endforeach ?>
                            </select>

                            <label>Bulan Awal :</label>
                            <label class="ml-2">
                                <select name="bulan_awal" class="form-control">
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>

                            </label>
                            <label class="ml-5">Bulan Akhir :</label>
                            <label class="ml-2">
                                <select name="bulan_akhir" class="form-control">
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>

                            </label>

                            <input type="submit" value="print">
                        </div>
                    </form>



                    <form action="<?php echo base_url('administrator/Arsip_surat_masuk/filter') ?>" method="post" target="_blank">
                        <div class="form-group">
                            <H3>Filter By Bulan</H3>
                            <input type="hidden" name="nilai_filter" value="3">
                            <select name="tahun2">
                                <?php foreach ($tahun as $row) : ?>
                                    <option value="<?php echo $row->Tahun ?>"><?php echo $row->Tahun ?></option>

                                <?php endforeach ?>
                            </select>



                            <input type="submit" value="print">
                        </div>
                    </form>



                </div>
            </div>
            <!-- card of tables end -->

        </div>
    </section>
    <!-- content end -->

</div>