<?php


/**
 * 
 */
class Jabatan extends CI_Controller
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
		$data['title'] = 'KSPPS BMT Sehati';
		$data['jabatan'] = $this->M_jabatan->tampil();

		$this->load->view('templates_administrator/header', $data);
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/jabatan', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function add()
	{
		$data = array(
			'title' => 'KSPPS BMT Sehati',
			'id_jabatan' => set_value('id_jabatan'),
			'nama_jabatan' => set_value('nama_jabatan'),
		);

		$this->load->view('templates_administrator/header', $data);
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/jabatan_add', $data);
		$this->load->view('templates_administrator/footer');
	}


	public function input()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->add();
		} else {
			$data = array(
				'nama_jabatan' => $this->input->post('nama_jabatan', TRUE),
			);

			$this->M_jabatan->input_data($data);

			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						Data Jabatan Berhasil ditambahkan
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');

			redirect('administrator/jabatan');
		}
	}

	// edit
	public function edit($id_jabatan)
	{
		$data['title'] = 'KSPPS BMT Sehati';
		$where = array('id_jabatan' => $id_jabatan);
		$data['jabatan'] = $this->M_jabatan->edit_data($where, 'tb_jabatan')->result();
		$this->load->view('templates_administrator/header', $data);
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/jabatan_edit', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function update()
	{
		$id_jabatan = $this->input->post('id_jabatan');
		$nama_jabatan = $this->input->post('nama_jabatan');

		$data = array(
			'nama_jabatan' => $nama_jabatan
		);

		$where = array('id_jabatan' => $id_jabatan);

		$this->M_jabatan->update_data($where, $data, 'tb_jabatan');

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						Data Jabatan Berhasil Diupdate
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');
		redirect('administrator/jabatan/index');
	}


	public function _rules()
	{

		$this->form_validation->set_rules('nama_jabatan', 'nama_jabatan', 'required', ['required' => 'Nama Jabatan Wajib Diisi']);
	}


	// Hapus
	public function delete($id_jabatan)
	{
		$where = array('id_jabatan' => $id_jabatan);
		$this->M_jabatan->delete_data($where, 'tb_jabatan');

		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						Data Jabatan Berhasil Dihapus
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');
		redirect('administrator/jabatan');
	}
}
