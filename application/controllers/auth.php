<?php


/**
 * 
 */
class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('login_model');
	}

	public function index()
	{
		//tidak bisa kembali ke-auth
		if ($this->session->userdata('level') === 'admin') {
			if ($this->session->userdata('username')) {
				redirect('administrator/dashboard');
			}
		} elseif ($this->session->userdata('level') === 'ketua') {
			if ($this->session->userdata('username')) {
				redirect('ketua/dashboard');
			}
		}


		// if ($this->session->userdata('username')) {
		// 	if ($this->session->userdata('level') === 'admin') {
		// 		redirect('administrator/dashboard');
		// 	} else {
		// 		redirect('ketua/dashboard');
		// 	}
		// }

		$this->form_validation->set_rules('username', 'username', 'required', ['required' => '*username wajib diisi']);
		$this->form_validation->set_rules('password', 'password', 'required', ['required' => '*password wajib diisi']);

		if ($this->form_validation->run() == FALSE) {

			$data['title'] = 'Login';
			$this->load->view('templates_administrator/header', $data);
			$this->load->view('administrator/login');
			$this->load->view('templates_administrator/footer');
		} else {
			//$this->_login();
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$user = $username;
			$pass = MD5($password);
			$cek = $this->login_model->cek_login($user, $pass);

			if ($cek->num_rows() > 0) {

				foreach ($cek->result() as $ck) {
					$sess_data['username'] = $ck->username;
					$sess_data['level'] = $ck->level;

					$this->session->set_userdata($sess_data);
				}
				if ($sess_data['level' == 'admin']) {
					redirect('administrator/dashboard');
				} else {
					redirect('ketua/dashboard');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						username atau password salah!!
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');
				redirect('auth');
			}


			// Cara lain
			// 	$username = $this->input->post('username', TRUE);
			// 	$password = $this->input->post('password', TRUE);

			// 	$result = $this->login_model->check_user($username, $password);

			// 	if ($result->num_rows() > 0) {
			// 		$data = $result->row_array();
			// 		$username = $data['username'];
			// 		$level = $data['level'];

			// 		$sesdata = array(
			// 			'username' => $username,
			// 			'level' => $level,
			// 			'logged_in' => TRUE
			// 		);

			// 		$this->session->set_userdata($sesdata);

			// 		if ($level === 'admin') {
			// 			redirect('administrator/dashboard');
			// 		} elseif ($level === 'ketua') {
			// 			redirect('ketua/dashboard');
			// 		}
			// 	} else {
			// 		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			// 					username atau password salah!!
			// 					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			// 					<span aria-hidden="true">&times;</span></button></div>');
			// 		redirect('auth');
			// 	}
			// 	$this->load->view('administrator/login');
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('tb_user', ['username' => $username])->row_array();

		if ($user) {
			if (password_verify($password, $user['password'])) {
				$data = [
					'username' => $user['username'],
					'level' => $user['level']
				];
				$this->session->set_userdata($data);
				redirect('admini');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							username atau password salah!!
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							username atau password salah!!
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');
		//$this->session->sess_destroy();
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-success" role="alert">You have been Logged out </div>'
		);
		redirect('auth');
	}
}
