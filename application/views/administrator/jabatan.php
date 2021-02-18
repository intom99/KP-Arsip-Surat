<div class="content-wrapper">

	<section class="content-header">
		<div class="container-fluid">
			<nav aria-label="breadcrumb">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="text-gray-800"><i class="fas fa-university"></i> Jabatan</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right bg-light">
							<li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
							<li class="breadcrumb-item active">Jabatan</li>
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
					<a href="<?php echo base_url() . 'Jabatan/add/' ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
					<hr>

					<table class="table table-bordered table-striped text-gray-800" id="dataTable">
						<thead>
							<tr>
								<th>NO</th>
								<th>NAMA JABATAN</th>
								<th>AKSI</th>
							</tr>
						</thead>

						<tbody>
							<?php
							$no = 1;
							foreach ($jabatan as $row) : ?>

								<tr>
									<td width="20px"><?php echo $no++; ?></td>
									<td><?php echo $row->nama_jabatan; ?></td>
									<td width="200px" class="text-center">

										<a href="<?php echo base_url() ?>jabatan/edit/<?php echo $row->id_jabatan; ?>" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-edit"></i> Edit</a>
										<a onclick="javascript: return confirm('Apakah anda yakin akan menghapus data jabatan ?');" href="<?php echo base_url() ?>jabatan/delete/<?php echo $row->id_jabatan; ?>" class=" btn btn-sm btn-danger ml-2" title="Hapus"><i class="fa fa-trash"></i> Hapus</a>
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
	<!-- content end -->
</div>