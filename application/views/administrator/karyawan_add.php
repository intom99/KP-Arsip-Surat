<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<nav aria-label="breadcrumb">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="text-gray-800"><i class="fas fa-university"></i> Tambah Karyawan
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right bg-light">
							<li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
							<li class="breadcrumb-item"><a href="<?php echo base_url('karyawan') ?>">Karyawan</a></li>
							<li class="breadcrumb-item active">Tambah</li>
						</ol>
					</div>
				</div>
			</nav>
		</div>
	</section>

	<section class="content text-gray-800">
		<div class="container-fluid">
			<div class="card">

				<div class="card-body">


					<form method="post" action="<?php echo base_url('karyawan/input') ?>" class="ml-4 mr-4 mt-3 mb-3">

						<div class="form-group">
							<label class="font-weight-bold">Nama Karyawan</label>
							<input type="text" name="nama_karyawan" placeholder=" Masukkan Nama" class="form-control" required>

							<?php echo form_error('nama_karyawan', '<div class="text-danger small" ml-3>'); ?>
						</div>

						<div class="form-group">
							<label class="font-weight-bold">Jabatan</label>
							<select name="id_jabatan" class="form-control" required>
								<option value="">--Pilih Jabatan--</option>
								<?php foreach ($jabatan as $row) : ?>
									<option value="<?php echo $row->id_jabatan ?>"><?php echo $row->nama_jabatan ?></option>


								<?php endforeach ?>

							</select>
						</div>
						<hr>

						<button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save"></i> Simpan</button>
						<a href="<?php echo base_url('karyawan') ?>" class="btn btn-danger mt-2 ml-2"><i class="fas fa-times"></i> Batal</a>

					</form>




				</div>
			</div>
		</div>
	</section>

</div>