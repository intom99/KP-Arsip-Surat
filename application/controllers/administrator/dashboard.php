<?php

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		if (!isset($this->session->userdata['username'])) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						Anda Belum Login
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');
			redirect('auth');
		}
	}

	public function index()
	{
		$sm = $this->M_surat_masuk->count_data();
		$suratMasuk = $sm->num_rows();

		$sk = $this->M_surat_keluar->count_data();
		$suratKeluar = $sk->num_rows();

		$ins = $this->M_instansi->count_data();
		$instansi = $ins->num_rows();

		$us = $this->user_model->count_data();
		$users = $us->num_rows();

		$data = $this->user_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'title' => 'KSPPS BMT Sehati',
			'username' => $data->username,
			'level' => $data->level,
			'suratMasuk' => $suratMasuk,
			'suratKeluar' => $suratKeluar,
			'instansi' => $instansi,
			'users' => $users
		);





		$this->load->view('templates_administrator/header', $data);
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/dashboard', $data);
		$this->load->view('templates_administrator/footer');
	}
}
