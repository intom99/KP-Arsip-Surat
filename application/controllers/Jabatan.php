<?php


/**
 * 
 */
class Jabatan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_jabatan');
		is_logged(); //helper access
	}

	public function index()
	{
		if ($this->session->userdata['level'] == 'admin') {
			$data['title'] = 'KSPPS BMT Sehati';
			$data['jabatan'] = $this->M_jabatan->tampil();

			$this->load->view('templates_administrator/header', $data);
			$this->load->view('templates_administrator/sidebar');
			$this->load->view('administrator/jabatan', $data);
			$this->load->view('templates_administrator/footer');
		} else {
			$data['title'] = 'KSPPS BMT Sehati';
			$this->load->view('templates_ketua/header', $data);
			$this->load->view('templates_ketua/sidebar');
			$this->load->view('administrator/404_page');
			$this->load->view('templates_ketua/footer');
		}
	}

	public function add()
	{
		if ($this->session->userdata['level'] == 'admin') {
			$data = array(
				'title' => 'KSPPS BMT Sehati',
				'id_jabatan' => set_value('id_jabatan'),
				'nama_jabatan' => set_value('nama_jabatan'),
			);

			$this->load->view('templates_administrator/header', $data);
			$this->load->view('templates_administrator/sidebar');
			$this->load->view('administrator/jabatan_add', $data);
			$this->load->view('templates_administrator/footer');
		} else {
			$data['title'] = 'KSPPS BMT Sehati';
			$this->load->view('templates_ketua/header', $data);
			$this->load->view('templates_ketua/sidebar');
			$this->load->view('administrator/404_page');
			$this->load->view('templates_ketua/footer');
		}
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

			redirect('jabatan');
		}
	}

	// edit
	public function edit($id_jabatan)
	{
		if ($this->session->userdata['level'] == 'admin') {
			$data['title'] = 'KSPPS BMT Sehati';
			$where = array('id_jabatan' => $id_jabatan);
			$data['jabatan'] = $this->M_jabatan->edit_data($where, 'tb_jabatan')->result();
			$this->load->view('templates_administrator/header', $data);
			$this->load->view('templates_administrator/sidebar');
			$this->load->view('administrator/jabatan_edit', $data);
			$this->load->view('templates_administrator/footer');
		} else {
			$data['title'] = 'KSPPS BMT Sehati';
			$this->load->view('templates_ketua/header', $data);
			$this->load->view('templates_ketua/sidebar');
			$this->load->view('administrator/404_page');
			$this->load->view('templates_ketua/footer');
		}
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
		redirect('jabatan');
	}


	public function _rules()
	{
		$this->form_validation->set_rules('nama_jabatan', 'nama_jabatan', 'required', ['required' => 'Jabatan Wajib Diisi']);
	}


	// Hapus
	public function delete($id_jabatan)
	{
		if ($this->session->userdata['level'] == 'admin') {
			$where = array('id_jabatan' => $id_jabatan);
			$this->M_jabatan->delete_data($where, 'tb_jabatan');

			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							Data Jabatan Berhasil Dihapus
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span></button></div>');
			redirect('jabatan');
		} else {
			$data['title'] = 'KSPPS BMT Sehati';
			$this->load->view('templates_ketua/header', $data);
			$this->load->view('templates_ketua/sidebar');
			$this->load->view('administrator/404_page');
			$this->load->view('templates_ketua/footer');
		}
	}
}
