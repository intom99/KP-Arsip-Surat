<?php defined('BASEPATH') or die('No direct script access allowed');

/**
 * 
 */
class Surat_masuk extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_surat_masuk');

		if (!isset($this->session->userdata['username'])) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						Anda Belum Login
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');
			redirect('auth');
		}
	}

	// rule
	public function _rules()
	{

		$this->form_validation->set_rules('no_surat', 'no_surat', 'required', ['required' => 'No Surat Wajib Diisi']);
		$this->form_validation->set_rules('tgl_surat', 'tgl_surat', 'required', ['required' => 'Tanggal Surat Wajib Diisi']);
		$this->form_validation->set_rules('perihal', 'perihal', 'required', ['required' => 'perihal Wajib Diisi']);
		$this->form_validation->set_rules('ket', 'ket', 'required', ['required' => 'keterangan Wajib Diisi']);
		//$this->form_validation->set_rules('lampiran', 'lampiran', 'required', ['required' => 'lampiran Wajib Diisi']);
	}


	public function index()
	{
		$data = array(
			'title' => 'KSPPS BMT Sehati',
			'suratMasuk' => $this->M_surat_masuk->tampil()
		);

		$this->load->view('templates_administrator/header', $data);
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/suratMasuk', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function add()
	{
		$data = array(
			'title' => 'KSPPS BMT Sehati',
			'suratMasuk' => $this->M_surat_masuk->tampil(),
			'instansi' => $this->M_instansi->tampil(),
			'jenis_surat' => $this->M_jenis_surat->tampil()
		);
		$this->load->view('templates_administrator/header', $data);
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/suratMasuk_add', $data);
		$this->load->view('templates_administrator/footer');
	}

	// input
	public function input()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->add();
		} else {
			$no_surat = $this->input->post('no_surat', TRUE);
			$tgl_surat = $this->input->post('tgl_surat', TRUE);
			$id_instansi = $this->input->post('id_instansi', TRUE);
			$id_js = $this->input->post('id_js', TRUE);
			$perihal = $this->input->post('perihal', TRUE);
			$ket = $this->input->post('ket', TRUE);
			// $lampiran = $_FILES['lampiran'];

			// if ($lampiran = '') {
			// } else {
			// 	$config['upload_path'] = './assets/arsip';
			// 	$config['allowed_types'] = 'pdf|jpeg';
			// 	$config['max_size']             = 0;

			// 	$this->load->library('upload', $config);
			// 	if (!$this->upload->do_upload('lampiran')) {
			// 		echo "Upload Gagal";
			// 		die();
			// 	} else {
			// 		$lampiran = $this->upload->data('file_name');
			// 	}
			// }

			$data = array(
				'no_surat' => $no_surat,
				'tgl_surat' => $tgl_surat,
				'id_instansi' => $id_instansi,
				'id_js' => $id_js,
				'perihal' => $perihal,
				'ket' => $ket,
				//'lampiran' => $lampiran
			);

			$this->M_surat_masuk->input_data($data);

			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						Data Surat Masuk Berhasil ditambahkan
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');

			redirect('administrator/Surat_masuk');
		}


		// // upload file
		// $config['upload_path']          = './uploads/';
		// $config['allowed_types']        = 'pdf';
		// $config['max_size']             = 0;
		// // $config['max_width']            = 1024;
		// // $config['max_height']           = 768;

		// $this->load->library('upload', $config);

		// if (!$this->upload->do_upload('lampiran')) {
		// 	$error = array('error' => $this->upload->display_errors());
		// 	$data['title'] = 'KSPPS BMT Sehati';

		// 	$this->load->view('templates_administrator/header', $data);
		// 	$this->load->view('templates_administrator/sidebar');
		// 	$this->load->view('administrator/suratMasuk_add', $error);
		// 	$this->load->view('templates_administrator/footer');
		// } else {
		// 	$upload_data = $this->upload->data();
		// 	$data = array(
		// 		'lampiran' => $upload_data['file_name']
		// 	);
		// 	$this->M_surat_masuk->input_data($data);
		// 	redirect('administrator/surat_masuk');

		// 	// //$this->load->view('upload_success', $data);
		// 	// $this->load->view('templates_administrator/header', $data);
		// 	// $this->load->view('templates_administrator/sidebar');
		// 	// $this->load->view('administrator/suratMasuk', $data);
		// 	// $this->load->view('templates_administrator/footer');
		// }
	}

	//fungsi edit
	public function edit($id)
	{
		$this->load->model('M_surat_masuk');
		$where = array('id_surat_masuk' => $id);

		// $data = array(
		// 	'title' => 'KSPPS BMT Sehati',
		// 	'suratMasuk' => $this->M_surat_masuk->edit_data($where, 'tb_surat_masuk')->result()
		// );
		$data = array(
			'title' => 'KSPPS BMT Sehati',
			'instansi' => $this->M_instansi->tampil(),
			'jenis_surat' => $this->M_jenis_surat->tampil(),
			'suratMasuk' => $this->M_surat_masuk->edit_data($where)->result()
		);
		//$data['title'] = 'KSPPS BMT Sehati';

		//$data['suratMasuk'] = $this->M_surat_masuk->edit_data($where)->result();


		$this->load->view('templates_administrator/header', $data);
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/suratMasuk_edit', $data);
		$this->load->view('templates_administrator/footer');
	}

	// Edit Aksi
	public function update()
	{
	}

	//Detail
	public function detail($id)
	{
		$this->load->model('M_surat_masuk');
		$data = array(
			'title' => 'KSPPS BMT Sehati',
			'suratMasuk' => $this->M_surat_masuk->detail_data($id)
		);


		$this->load->view('templates_administrator/header', $data);
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/suratMasuk_detail', $data);
		$this->load->view('templates_administrator/footer');
	}
}
