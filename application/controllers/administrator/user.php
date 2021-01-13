<?php

/**
 * 
 */
class User extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		is_logged(); //helper access
	}



	public function index()
	{
		$data['title'] = 'KSPPS BMT Sehati';
		$data['tb_user'] = $this->user_model->tampil_data('tb_user');

		$this->load->view('templates_administrator/header', $data);
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/user', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function add()
	{
		$data = array(
			'title' => 'KSPPS BMT Sehati',
			'user' => $this->user_model->tampil_data(),
			'karyawan' => $this->M_karyawan->tampil()
		);
		$this->load->view('templates_administrator/header', $data);
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/user_add', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function input()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->add();
		} else {

			$username = $this->input->post('username', TRUE);
			$password = md5($this->input->post('password', TRUE));
			$level = $this->input->post('level', TRUE);
			$id_karyawan = $this->input->post('id_karyawan', TRUE);


			$data = array(

				'username' => $username,
				'password' => $password,
				'level' => $level,
				'id_karyawan' => $id_karyawan
			);
			//masih salah
			// $data = array(
			// 	'id_karyawan' => $this->input->post('id_karyawan'),
			// 	'username' => $this->input->post('username'),
			// 	'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			// 	'level' => $this->input->post('level')
			// );


			$this->user_model->input_data($data);

			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						Data User Berhasil ditambahkan
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');

			redirect('administrator/user');
		}
	}

	//edit
	public function edit($id)
	{
		$where = array('id' => $id);
		$data = array(
			'title' => 'KSPPS BMT Sehati',
			//'karyawan' => $this->db->query("select*from tb_karyawan, tb_jabatan $where tb_karyawan.id_jabatan = tb_jabatan.id_jabatan and tb_karyawan.id_karyawan = '$id'")->result(),
			'user' => $this->user_model->edit_data($where, 'tb_user')->result(),
		);
		$this->load->view('templates_administrator/header', $data);
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/user_edit', $data);
		$this->load->view('templates_administrator/footer');
	}

	//edit aksi(update)
	public function update()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
		} else {
			$id = $this->input->post('id', TRUE);
			$username = $this->input->post('username', TRUE);
			$password = $this->input->post('password', TRUE);
			$level = $this->input->post('level', TRUE);

			$data = array(
				'username' => $username,
				'password' => $password,
				'level' => $level
			);

			$where = array(
				'id' => $id
			);

			$this->user_model->update_data('tb_user', $data, $where);

			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						Data User Berhasil diupdate
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');

			redirect('administrator/user');
		}
	}


	// rules
	public function _rules()
	{
		//$this->form_validation->set_rules('id_karyawan', 'id_karyawan', 'required', ['required' => 'id wajib diisi']);
		$this->form_validation->set_rules('username', 'username', 'required|is_unique[tb_user.username]', ['required' => 'username sudah terdaftar']);
		$this->form_validation->set_rules('password', 'password', 'required|min_length[5]');
		$this->form_validation->set_rules('level', 'level', 'required');
		$this->form_validation->set_rules('id_karyawan', 'id_karyawan', 'required');
	}

	// Hapus
	public function delete($id)
	{
		$where = array(
			'id' => $id
		);
		$this->user_model->delete_data($where, 'tb_user');

		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						Data User Berhasil Dihapus
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');
		redirect('administrator/user');
	}
}
