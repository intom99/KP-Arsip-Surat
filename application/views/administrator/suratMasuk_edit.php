<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="fas fa-envelope"></i> Edit Surat Masuk
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('administrator/dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('administrator/surat_masuk') ?>">Surat Masuk</a></li>
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

                    <?php foreach ($suratMasuk as $rows) : ?>
                        <form method="post" action="<?php echo base_url('/administrator/surat_masuk/update'); ?>" class="ml-4 mr-4 mt-3 mb-3">

                            <hr>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="font-weight-bold">No Surat</label>
                                        <input type="hidden" class="form-control" name="id_surat_masuk" value="<?php echo $rows->id_surat_masuk ?>">
                                        <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?php echo $rows->no_surat ?>">
                                        <?php echo form_error('no_surat', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Tanggal Surat</label>
                                        <input type="date" name="tgl_surat" class="form-control" value="<?php echo $rows->tgl_surat ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Instansi</label>
                                <select name="id_instansi" class="form-control">
                                    <option value="">--Pilih Instansi--</option>
                                    <?php foreach ($instansi as $row) : ?>
                                        <option value="<?php echo $row->id_instansi ?>" <?php if ($row->id_instansi == $rows->id_instansi) {
                                                                                            echo "selected=\"selected\"";
                                                                                        } ?>><?php echo $row->nama_instansi ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Jenis Surat</label>
                                <select name="id_js" class="form-control">
                                    <option value="">--Pilih Jenis Surat--</option>
                                    <?php foreach ($jenis_surat as $row) : ?>
                                        <option value="<?php echo $row->id_js ?>" <?php if ($row->id_js == $rows->id_js) {
                                                                                        echo "selected=\"selected\"";
                                                                                    } ?>><?php echo $row->jenis_surat ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Perihal</label>
                                        <input type="text" class="form-control" id="perihal" name="perihal" value="<?php echo $rows->perihal ?>">
                                        <?php echo form_error('perihal', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Keterangan</label>
                                        <input type="text" class="form-control" id="ket" name="ket" placeholder="Masukkan Keterangan" value="<?php echo $rows->ket ?>">
                                        <?php echo form_error('keterangan', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>

                            <!-- lampiran atau upload file pdf -->

                            <div class="form-group">
                                <label class="font-weight-bold">Lampiran</label>

                                <input type="file" name="lampiran" class="form-control">

                            </div>


                            <hr>
                            <a href="<?php echo base_url() ?>/administrator/surat_masuk/detail/<?php echo $rows->id_surat_masuk ?>" class="btn btn-secondary mt-2 mr-2"><i class="fas fa-chevron-left"></i> Kembali</a>
                            <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save"></i> Update</button>
                        </form>
                    <?php endforeach ?>




                </div>
            </div>
        </div>
    </section>

</div>