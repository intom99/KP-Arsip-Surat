<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="fas fa-envelope"></i> Tambah Surat Masuk
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('administrator/dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('administrator/surat_masuk') ?>">Surat Masuk</a></li>
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

                    <form action="<?php echo base_url('administrator/surat_masuk/input') ?>" method="post" class="ml-4 mr-4 mt-3 mb-3" enctype="multipart/form-data">

                        <div class="form-group text-right">
                            <label class="font-weight-bold text-center">Tanggal Hari Ini :</label><span> <?php echo format_indo(date('Y-m-d H:i:s')); ?></span>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="font-weight-bold">No Surat</label>
                                    <input type="text" class="form-control" id="no_surat" name="no_surat" required placeholder="Masukkan No. Surat...">
                                    <?php echo form_error('no_surat', '<small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="font-weight-bold">Tanggal Surat</label>
                                    <input type="date" name="tgl_surat" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Instansi</label>
                            <select name="id_instansi" class="form-control" required>
                                <option value="">--Pilih Instansi--</option>
                                <?php foreach ($instansi as $row) : ?>
                                    <option value="<?php echo $row->id_instansi ?>"><?php echo $row->nama_instansi ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Jenis Surat</label>
                            <select name="id_js" class="form-control" required>
                                <option value="">--Pilih Jenis Surat--</option>
                                <?php foreach ($jenis_surat as $row) : ?>
                                    <option value="<?php echo $row->id_js ?>"><?php echo $row->jenis_surat ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>


                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="font-weight-bold">Perihal</label>
                                    <input type="text" class="form-control" id="perihal" name="perihal" required placeholder="Masukkan Perihal...">
                                    <?php echo form_error('perihal', '<small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="font-weight-bold">Keterangan</label>
                                    <input type="text" class="form-control" id="ket" name="ket" placeholder="Masukkan Keterangan">
                                    <?php echo form_error('keterangan', '<small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                            </div>
                        </div>

                        <!-- lampiran atau upload file pdf -->

                        <div class="form-group">
                            <label class="font-weight-bold">Lampiran</label><br>
                            <label>
                                <input type="file" id="lampiran" name="lampiran" class="form-control" required></label>
                        </div>

                        <hr>
                        <a href="<?php echo base_url('/administrator/surat_masuk') ?>" class="btn btn-secondary mt-2 mr-2"><i class="fas fa-chevron-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save"></i> Simpan</button>

                    </form>




                </div>
            </div>
        </div>
    </section>

</div>