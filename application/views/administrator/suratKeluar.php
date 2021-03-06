<div class="content-wrapper">

	<section class="content-header">
		<div class="container-fluid">
			<nav aria-label="breadcrumb">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="text-gray-800"><i class="fas fa-envelope-open"></i> Surat Keluar</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right bg-light">
							<li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
							<li class="breadcrumb-item active">Surat Keluar</li>
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
					<?php echo anchor('Surat_keluar/add', ' <button class="btn btn-primary" title="Tambah"><i class="fas fa-plus"></i> Tambah </button>'); ?>
					<hr>

					<table class="table table-bordered table-striped text-gray-800" id="dataTable">
						<thead>
							<tr>
								<th>No.</th>
								<th>Tanggal</th>
								<th>Instansi</th>
								<th>No. Surat, Tanggal Surat</th>
								<th>Perihal</th>
								<th>Aksi</th>
							</tr>
						</thead>

						<tbody>
							<?php
							$no = 1;
							foreach ($suratKeluar as $row) : ?>

								<tr>
									<td width="20px"><?php echo $no++; ?></td>
									<td><?php echo format_indo(date('Y-m-d', strtotime($row->created))) ?></td>
									<td><?php echo $row->nama_instansi ?></td>
									<td><?php echo $row->no_surat . ', <br>' . date('d-m-Y', strtotime($row->tgl_surat)); ?></td>
									<td><?php echo $row->perihal ?></td>

									<td width="200px" class="text-center">
										<a href="<?php echo base_url('Surat_keluar/detail/') . $row->id_surat_keluar ?>" class="btn btn-sm btn-success" title="Detail"><i class="fa fa-plus-circle"></i> Detail</a>
										<a onclick="javascript:return confirm('apakah anda yakin akan dihapus ?');" href="<?php echo base_url('Surat_keluar/delete/') . $row->id_surat_keluar ?>" class="btn btn-sm btn-danger ml-2" title="Hapus"><i class="fa fa-trash"></i> Hapus</a>
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