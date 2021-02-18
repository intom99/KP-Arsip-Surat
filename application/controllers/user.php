<?php

/**
 * 
 */
class User extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		is_logged();
	}



	public function index()
	{
		if ($this->session->userdata('level') === 'admin') {
			$data['title'] = 'KSPPS BMT Sehati';
			$data['tb_user'] = $this->user_model->tampil_data('tb_user');

			$this->load->view('templates_administrator/header', $data);
			$this->load->view('templates_administrator/sidebar');
			$this->load->view('administrator/user', $data);
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
		if ($this->session->userdata('level') === 'admin') {
			$data = array(
				'title' => 'KSPPS BMT Sehati',
				'user' => $this->user_model->tampil_data(),
				'karyawan' => $this->M_karyawan->tampil(),
			);
			$this->load->view('templates_administrator/header', $data);
			$this->load->view('templates_administrator/sidebar');
			$this->load->view('administrator/user_add', $data);
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


			$this->user_model->input_data($data);

			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<b><i class="fas fa-check"></i> Sukses! </b>Data user berhasil ditambah
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');

			redirect('user');
		}
	}

	//edit
	public function edit($id)
	{
		if ($this->session->userdata['level'] == 'admin') {
			$where = array('id' => $id);
			$data = array(
				'title' => 'KSPPS BMT Sehati',
				'karyawan' => $this->M_karyawan->tampil(),
				'user' => $this->user_model->edit_data($where, 'tb_user')->result(),
			);
			$this->load->view('templates_administrator/header', $data);
			$this->load->view('templates_administrator/sidebar');
			$this->load->view('administrator/user_edit', $data);
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
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('level', 'level', 'required');
		$this->form_validation->set_rules('id_karyawan', 'id_karyawan', 'required');

		if ($this->form_validation->run() == FALSE) {
			redirect('user/edit'); //masih salah
		} else {
			if (empty($_POST['password'])) {
				$id = $this->input->post('id', TRUE);
				$username = $this->input->post('username', TRUE);
				$level = $this->input->post('level', TRUE);
				$id_karyawan = $this->input->post('id_karyawan', TRUE);

				$data = array(
					'username' => $username,
					'level' => $level,
					'id_karyawan' => $id_karyawan
				);

				$where = array(
					'id' => $id
				);

				$this->user_model->update_data('tb_user', $data, $where);
			} else {

				$id = $this->input->post('id', TRUE);
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

				$where = array(
					'id' => $id
				);

				$this->user_model->update_data('tb_user', $data, $where);
			}


			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<b><i class="fas fa-check"></i> Sukses! </b>Data user berhasil diupdate
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');

			redirect('user');
		}
	}


	// rules
	public function _rules()
	{
		$this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[tb_user.username]', [
			'is_unique' => '*username sudah digunakan'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('level', 'level', 'required');
		$this->form_validation->set_rules('id_karyawan', 'id_karyawan', 'required');
	}


	// Hapus
	public function delete($id)
	{

		if ($this->session->userdata['level'] == 'admin') {

			if ($id != $_SESSION['id']) {
				$where = array(
					'id' => $id
				);
				$this->user_model->delete_data($where, 'tb_user');

				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<b><i class="fas fa-check"></i> Sukses! </b>Data user berhasil dihapus
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span></button></div>');
				redirect('user');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<b><i class="fas fa-times-circle"></i> Gagal! </b>Data user tidak dapat dihapus
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span></button></div>');
				redirect('user');
			}
		} else {
			$data['title'] = 'KSPPS BMT Sehati';
			$this->load->view('templates_ketua/header', $data);
			$this->load->view('templates_ketua/sidebar');
			$this->load->view('administrator/404_page');
			$this->load->view('templates_ketua/footer');
		}
	}
}
