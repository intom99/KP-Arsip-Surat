<div class="content-wrapper">

	<section class="content-header">
		<div class="container-fluid">
			<nav aria-label="breadcrumb">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1><i class="fas fa-users"></i> Users</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right bg-light">
							<li class="breadcrumb-item"><a href="<?php echo base_url('administrator/dashboard') ?>">Dashboard</a></li>
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
					<button type="button" data-toggle="modal" data-target="#formModal" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah </button>
					<hr>

					<table class="table table-bordered table-striped" id="dataTable">
						<thead>
							<tr>
								<th>NO</th>
								<th>USERNAME</th>
								<th>LEVEL</th>
								<th>BLOKIR</th>
								<th>AKSI</th>
							</tr>
						</thead>

						<tbody>
							<?php
							$no = 1;
							foreach ($tb_user as $row) : ?>

								<tr>
									<td width="20px"><?php echo $no++; ?></td>
									<td><?php echo $row->username; ?></td>
									<td><?php echo $row->level; ?></td>
									<td><?php echo $row->blokir; ?></td>
									<td width="200px" class="text-center">
										<a href="#" class="btn btn-sm btn-primary mr-2"><i class="fa fa-edit"></i> Edit</a>
										<a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>

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