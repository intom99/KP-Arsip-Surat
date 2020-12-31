<div class="content-wrapper">

	<section class="content-header">
		<div class="container-fluid">
			<nav aria-label="breadcrumb">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1><i class="fas fa-university"></i> Instansi</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right bg-light">
							<li class="breadcrumb-item"><a href="<?php echo base_url('administrator/dashboard') ?>">Dashboard</a></li>
							<li class="breadcrumb-item active">Instansi</li>
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
					<a href="<?php echo base_url() . 'administrator/Instansi/add/' ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>

					<hr>

					<table class="table table-bordered table-striped" id="dataTable">
						<thead>
							<tr class="text-center">
								<th>NO</th>
								<th>NAMA INSTANSI</th>
								<th>Alamat INSTANSI</th>
								<th>AKSI</th>
							</tr>
						</thead>

						<tbody>
							<?php
							$no = 1;
							foreach ($instansi as $row) : ?>

								<tr>
									<td width="20px"><?php echo $no++; ?></td>
									<td><?php echo $row->nama_instansi; ?></td>
									<td><?php echo $row->alamat_instansi; ?></td>

									<td class="text-center" width="200px">
										<a href="<?php echo base_url() ?>administrator/instansi/edit/<?php echo $row->id_instansi; ?>" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-edit"></i> Edit</a>
										<a onclick="javascript: return confirm('Apakah anda yakin akan menghapus data instansi ?');" href="<?php echo base_url() ?>administrator/instansi/delete/<?php echo $row->id_instansi; ?>" class=" btn btn-sm btn-danger ml-3" title="Hapus"><i class="fa fa-trash"></i> Hapus</a>

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