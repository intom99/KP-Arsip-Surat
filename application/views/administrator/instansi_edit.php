<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<nav aria-label="breadcrumb">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1><i class="fas fa-university"></i> Edit Intansi
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="<?php echo base_url('administrator/dashboard') ?>">Dashboard</a></li>
							<li class="breadcrumb-item"><a href="<?php echo base_url('administrator/instansi') ?>">Instansi</a></li>
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
					<?php foreach ($instansi as $row) : ?>

						<form method="post" action="<?php echo base_url('administrator/Instansi/update') ?>" class="ml-4 mr-4 mt-3 mb-3">

							<div class="form-group">
								<label class="font-weight-bold">Nama Instansi</label>
								<input type="hidden" name="id_instansi" value="<?php echo $row->id_instansi ?>">
								<input type="text" name="nama_instansi" class="form-control" value="<?php echo $row->nama_instansi ?>">
							</div>

							<div class="form-group">
								<label class="font-weight-bold">Alamat Instansi</label>
								<textarea name="alamat_instansi" placeholder="Masukkan Alamat Instansi" class="form-control" required><?php echo $row->alamat_instansi ?></textarea>
								<?php echo form_error('alamat_instansi', '<div class="text-danger small" ml-3>'); ?>

							</div>
							<hr>
							<a href="<?php echo base_url('administrator/instansi') ?>" class="btn btn-secondary mt-2"><i class="fas fa-chevron-left"></i> Kembali</a>
							<button type="submit" class="btn btn-primary mt-2 ml-2"><i class="fas fa-save"></i> Update</button>
						</form>



					<?php endforeach ?>
				</div>
			</div>
		</div>
	</section>

</div>