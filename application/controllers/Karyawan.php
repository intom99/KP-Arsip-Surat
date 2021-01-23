<?php


class Karyawan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_karyawan');

		is_logged(); //helper access
	}

	// tampil data
	public function index()
	{
		if ($this->session->userdata['level'] == 'admin') {
			$data = array(
				'title' => 'KSPPS BMT Sehati',
				'karyawan' => $this->M_karyawan->tampil()
			);

			$this->load->view('templates_administrator/header', $data);
			$this->load->view('templates_administrator/sidebar');
			$this->load->view('administrator/karyawan', $data);
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
				'karyawan' => $this->M_karyawan->tampil(),
				'jabatan' => $this->M_jabatan->tampil()
			);

			$this->load->view('templates_administrator/header', $data);
			$this->load->view('templates_administrator/sidebar');
			$this->load->view('administrator/karyawan_add', $data);
			$this->load->view('templates_administrator/footer');
		} else {
			$data['title'] = 'KSPPS BMT Sehati';
			$this->load->view('templates_ketua/header', $data);
			$this->load->view('templates_ketua/sidebar');
			$this->load->view('administrator/404_page');
			$this->load->view('templates_ketua/footer');
		}
	}



	// aksi add (input)
	public function input()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->add();
		} else {
			$nama_karyawan = $this->input->post('nama_karyawan', TRUE);
			$id_jabatan = $this->input->post('id_jabatan', TRUE);


			$data = array(
				'nama_karyawan' => $nama_karyawan,
				'id_jabatan' => $id_jabatan
			);

			$this->M_karyawan->input_data($data);

			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<b><i class="fas fa-check"></i> Sukses! </b>Data karyawan berhasil ditambah
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');

			redirect('karyawan');
		}
	}

	//edit
	public function edit($id)
	{
		if ($this->session->userdata['level'] == 'admin') {
			$where = array('id_karyawan' => $id);
			$data = array(
				'title' => 'KSPPS BMT Sehati',
				'karyawan' => $this->M_karyawan->edit_data($where, 'tb_karyawan')->result(),
				'jabatan' => $this->M_jabatan->tampil()
			);
			$this->load->view('templates_administrator/header', $data);
			$this->load->view('templates_administrator/sidebar');
			$this->load->view('administrator/karyawan_edit', $data);
			$this->load->view('templates_administrator/footer');
		} else {
			$data['title'] = 'KSPPS BMT Sehati';
			$this->load->view('templates_ketua/header', $data);
			$this->load->view('templates_ketua/sidebar');
			$this->load->view('administrator/404_page');
			$this->load->view('templates_ketua/footer');
		}
	}

	//edit aksi(update)
	public function update()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
		} else {
			$id_karyawan = $this->input->post('id_karyawan', TRUE);
			$nama_karyawan = $this->input->post('nama_karyawan', TRUE);
			$id_jabatan = $this->input->post('id_jabatan', TRUE);

			$data = array(
				'nama_karyawan' => $nama_karyawan,
				'id_jabatan' => $id_jabatan
			);

			$where = array(
				'id_karyawan' => $id_karyawan
			);

			$this->M_karyawan->update_data('tb_karyawan', $data, $where);

			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<b><i class="fas fa-check"></i> Sukses! </b>Data karyawan berhasil diupdate
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');

			redirect('karyawan');
		}
	}

	// rules
	public function _rules()
	{
		$this->form_validation->set_rules('nama_karyawan', 'nama_karyawan', 'required', ['required' => 'nama wajib diisi']);
		$this->form_validation->set_rules('id_jabatan', 'id_jabatan', 'required', ['required' => 'jabatan wajib diisi']);
	}

	// Hapus
	public function delete($id)
	{
		if ($this->session->userdata['level'] = 'admin') {
			$where = array(
				'id_karyawan' => $id
			);
			$this->M_karyawan->delete_data($where, 'tb_karyawan');

			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<b><i class="fas fa-check"></i> Sukses! </b>Data karyawan berhasil dihapus
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span></button></div>');
			redirect('karyawan');
		} else {
			$data['title'] = 'KSPPS BMT Sehati';
			$this->load->view('templates_ketua/header', $data);
			$this->load->view('templates_ketua/sidebar');
			$this->load->view('administrator/404_page');
			$this->load->view('templates_ketua/footer');
		}
	}
}
