<div class="content-wrapper">

	<section class="content-header">
		<div class="container-fluid">
			<nav aria-label="breadcrumb">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="text-gray-800"><i class="fas fa-user"></i> Karyawan</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right bg-light">
							<li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
							<li class="breadcrumb-item active">Karyawan</li>
						</ol>
					</div>
				</div>
			</nav>
			<?php echo $this->session->flashdata('pesan') ?>
		</div>
	</section>

	<section class="content text-gray-800">
		<div class="container-fluid">
			<div class="card">
				<div class="card-body">
					<?php echo anchor('karyawan/add', ' <button class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button>'); ?>
					<hr>

					<table class="table table-bordered table-striped" id="dataTable">
						<thead>
							<tr>
								<th>NO</th>

								<th>NAMA KARYAWAN</th>
								<th>JABATAN</th>
								<th>AKSI</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($karyawan as $row) :
							?>

								<tr>
									<td width="20px"><?php echo $no++; ?></td>

									<td><?php echo $row->nama_karyawan ?></td>
									<td><?php echo $row->nama_jabatan ?></td>
									<td width="200px" class="text-center">
										<a href="<?php echo base_url() ?>karyawan/edit/<?php echo $row->id_karyawan; ?>" class="btn btn-sm btn-primary mr-2" title="Edit"><i class="fa fa-edit"></i> Edit</a>
										<a onclick="javascript:return confirm('Apakah anda yakin akan menghapus data karyawan ?');" href="<?php echo base_url() ?>karyawan/delete/<?php echo $row->id_karyawan; ?>" class="btn btn-sm btn-danger" title="Hapus"><i class="fa fa-trash"></i> Hapus</a>

									</td>
								</tr>



							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>


	</section>

</div>