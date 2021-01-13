<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="fas fa-folder-open"></i> Laporan Surat Keluar</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right bg-light">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('administrator/dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active"> Laporan Surat Keluar</li>
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

            <div class="row">
                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                            <h5>Form Filter</h5>
                            <hr>
                            <form>
                                <b>Pilih Filter berdasarkan :</b><br>
                                <label class="mt-1">
                                    <input type="radio" id="showform" value="tanggal" name="showform" onchange="showhideForm(this.value);" /> Tanggal
                                </label><br>

                                <label>
                                    <input type="radio" id="showform" value="bulan" name="showform" onchange="showhideForm(this.value);" /> Bulan
                                </label>
                            </form>
                            <a class="btn btn-primary mt-5" href="<?php echo base_url('administrator/Arsip_surat_keluar') ?>" onclick="document.getElementById('form_[form_key]').reset();"><i class="fas fa-sync"></i> Reset</a>
                        </div>
                    </div>

                </div>




                <div class="col">
                    <div id="div1" style="display:none">

                        <div class="card">
                            <div class="card-body">
                                <h5>Form Filter Tanggal</h5>
                                <hr>
                                <form action="<?php echo base_url('administrator/Arsip_surat_keluar/filter') ?>" method="post" target="_blank">
                                    <div class="form-group">
                                        <input type="hidden" name="nilai_filter" value="1">
                                        <label>Tanggal Awal :</label>
                                        <label class="ml-2">
                                            <!-- <input type="date" name="tgl_awal" id="datepicker" class="form-control" required> -->
                                            <input type="date" name="tgl_awal" class="form-control" required>
                                        </label>


                                        <label class="ml-5">Tanggal Akhir :</label>
                                        <label class="ml-2">
                                            <input type="date" name="tgl_akhir" class="form-control" required>
                                        </label>
                                        <br>
                                    </div>
                                    <button type="submit" class="btn btn-warning mt-3"><i class="fas fa-print"></i> Print</button>
                                </form>
                            </div>

                        </div>
                    </div>

                    <div id="div2" style="display:none">
                        <div class="card">
                            <div class="card-body">
                                <h5>Form Filter Bulan</h5>
                                <hr>
                                <form action="<?php echo base_url('administrator/Arsip_surat_keluar/filter') ?>" method="post" target="_blank">
                                    <div class="form-group">
                                        <input type="hidden" name="nilai_filter" value="2">
                                        <label>Tahun :</label>
                                        <label class="ml-3 mb-2">
                                            <select name="tahun1" class="form-control">
                                                <?php foreach ($tahun as $row) : ?>
                                                    <option value="<?php echo $row->Tahun ?>"><?php echo $row->Tahun ?></option>

                                                <?php endforeach ?>
                                            </select>
                                        </label><br>

                                        <div class="row">
                                            <div class="col">
                                                <!-- bulan awal -->
                                                <label>Bulan Awal :</label>
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
                                                <!--  -->
                                            </div>
                                            <div class="col">
                                                <!--  -->
                                                </label>
                                                <label>Bulan Akhir :
                                                </label>

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
                                                <!--  -->
                                            </div>
                                        </div>

                                    </div>
                                    <button class="btn btn-warning mt-2" type="submit"><i class="fas fa-print"></i> Print</button>
                                </form>

                            </div>

                        </div>
                    </div>



                </div>

            </div>
    </section>
    <!-- content end -->

</div>