<div class="content-wrapper">

	<section class="content-header">
		<div class="container-fluid">
			<nav aria-label="breadcrumb">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="text-gray-800"><i class="fas fa-users"></i> Users</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right bg-light">
							<li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
							<li class="breadcrumb-item active">Users</li>
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
					<?php echo anchor('user/add', ' <button class="btn btn-primary" title="Tambah"><i class="fas fa-plus"></i> Tambah </button>'); ?>
					<hr>

					<table class="table table-bordered table-striped text-gray-800" id="dataTable">
						<thead>
							<tr>
								<th>NO</th>
								<th>NAMA</th>
								<th>USERNAME</th>
								<th>LEVEL</th>

								<th>AKSI</th>
							</tr>
						</thead>

						<tbody>
							<?php
							$no = 1;
							foreach ($tb_user as $row) : ?>

								<tr>
									<td width="20px"><?php echo $no++; ?></td>
									<td><?php echo $row->nama_karyawan; ?></td>
									<td><?php echo $row->username; ?></td>
									<td><?php echo $row->level; ?></td>

									<td width="200px" class="text-center">
										<a href="<?php echo base_url() ?>user/edit/<?php echo $row->id; ?>" class="btn btn-sm btn-primary mr-2" title="Edit"><i class="fa fa-edit"></i> Edit</a>
										<a onclick="javascript:return confirm('Apakah anda yakin akan menghapus data user ?');" href="<?php echo base_url() ?>user/delete/<?php echo $row->id; ?>" class="btn btn-sm btn-danger" title="Hapus"><i class="fa fa-trash"></i> Hapus</a>

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