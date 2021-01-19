<?php


/**
 * 
 */
class Instansi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		is_logged(); //helper access
	}



	public function index()
	{
		if ($this->session->userdata['level'] == 'admin') {
			$data['title'] = 'KSPPS BMT Sehati';
			$data['instansi'] = $this->M_instansi->tampil();

			$this->load->view('templates_administrator/header', $data);
			$this->load->view('templates_administrator/sidebar');
			$this->load->view('administrator/instansi', $data);
			$this->load->view('templates_administrator/footer');
		} else {
			$data['title'] = 'KSPPS BMT Sehati';
			$this->load->view('templates_ketua/header', $data);
			$this->load->view('templates_ketua/sidebar');
			$this->load->view('administrator/404_page');
			$this->load->view('templates_ketua/footer');
		}
	}

	// add
	public function add()
	{
		if ($this->session->userdata['level'] == 'admin') {
			$data = array(
				'title' => 'KSPPS BMT Sehati',
				'id_instansi' => set_value('id_instansi'),
				'nama_instansi' => set_value('nama_instansi'),
				'alamat_instansi' => set_value('alamat_instansi'),
			);

			$this->load->view('templates_administrator/header', $data);
			$this->load->view('templates_administrator/sidebar');
			$this->load->view('administrator/instansi_add', $data);
			$this->load->view('templates_administrator/footer');
		} else {
			$data['title'] = 'KSPPS BMT Sehati';
			$this->load->view('templates_ketua/header', $data);
			$this->load->view('templates_ketua/sidebar');
			$this->load->view('administrator/404_page');
			$this->load->view('templates_ketua/footer');
		}
	}

	// add action (input)
	public function input()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->add();
		} else {
			$data = array(
				'nama_instansi' => $this->input->post('nama_instansi', TRUE),
				'alamat_instansi' => $this->input->post('alamat_instansi', TRUE),
			);

			$this->M_instansi->input_data($data);

			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						Data Instansi Berhasil ditambahkan
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');

			redirect('instansi');
		}
	}

	// edit
	public function edit($id)
	{
		if ($this->session->userdata['level'] == 'admin') {

			$data['title'] = 'KSPPS BMT Sehati';
			$where = array('id_instansi' => $id);
			$data['instansi'] = $this->M_instansi->edit_data($where, 'tb_instansi')->result();
			$this->load->view('templates_administrator/header', $data);
			$this->load->view('templates_administrator/sidebar');
			$this->load->view('administrator/instansi_edit', $data);
			$this->load->view('templates_administrator/footer');
		} else {
			$data['title'] = 'KSPPS BMT Sehati';
			$this->load->view('templates_ketua/header', $data);
			$this->load->view('templates_ketua/sidebar');
			$this->load->view('administrator/404_page');
			$this->load->view('templates_ketua/footer');
		}
	}

	// edit action (update)
	public function update()
	{
		$id_instansi = $this->input->post('id_instansi');
		$nama_instansi = $this->input->post('nama_instansi');
		$alamat_instansi = $this->input->post('alamat_instansi');

		$data = array(
			'nama_instansi' => $nama_instansi,
			'alamat_instansi' => $alamat_instansi
		);

		$where = array('id_instansi' => $id_instansi);

		$this->M_instansi->update_data($where, $data, 'tb_instansi');

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						Data Instansi Berhasil Diupdate
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');
		redirect('instansi');
	}

	// rule
	public function _rules()
	{
		$this->form_validation->set_rules('nama_instansi', 'nama_instansi', 'required', ['required' => 'Nama Instansi Wajib Diisi']);
		$this->form_validation->set_rules('alamat_instansi', 'alamat_instansi', 'required', ['required' => 'Alamat Instansi Wajib Diisi']);
	}

	// delete
	public function delete($id)
	{
		if ($this->session->userdata['level'] == 'admin') {

			$where = array('id_instansi' => $id);
			$this->M_instansi->delete_data($where, 'tb_instansi');

			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						Data Instansi Berhasil Dihapus
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');
			redirect('instansi');
		} else {
			$data['title'] = 'KSPPS BMT Sehati';
			$this->load->view('templates_ketua/header', $data);
			$this->load->view('templates_ketua/sidebar');
			$this->load->view('administrator/404_page');
			$this->load->view('templates_ketua/footer');
		}
	}
}
