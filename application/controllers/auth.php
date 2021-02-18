<?php
defined('BASEPATH') or exit('No direct script access allowed');
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
				redirect('dashboard');
			}
		} elseif ($this->session->userdata('level') === 'ketua') {
			if ($this->session->userdata('username')) {
				redirect('dashboard');
			}
		}

		$this->form_validation->set_rules('username', 'username', 'required', ['required' => '*username wajib diisi']);
		$this->form_validation->set_rules('password', 'password', 'required', ['required' => '*password wajib diisi']);

		if ($this->form_validation->run() == FALSE) {

			$data['title'] = 'Login';
			$this->load->view('templates_administrator/header', $data);
			$this->load->view('administrator/login');
			$this->load->view('templates_administrator/footer');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$user = $username;
			$pass = MD5($password);
			$cek = $this->login_model->cek_login($user, $pass);

			if ($cek->num_rows() > 0) {

				foreach ($cek->result() as $ck) {
					$sess_data['username'] = $ck->username;
					$sess_data['level'] = $ck->level;
					$sess_data['id'] = $ck->id;

					$this->session->set_userdata($sess_data);
				}
				if ($sess_data['level' === 'admin']) {
					redirect('dashboard');
				} elseif ($sess_data['level'] === 'ketua') {
					redirect('dashboard');
				} else {
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<i class="fas fa-times-circle"></i> username atau password salah!!
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');
				redirect('auth');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-success" role="alert"><i class="fas fa-check"></i> Kamu berhasil logout </div>'
		);
		redirect('auth');
	}
}
