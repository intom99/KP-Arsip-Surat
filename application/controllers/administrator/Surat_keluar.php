<?php

class Surat_keluar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_surat_keluar');

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
        $data = array(
            'title' => 'KSPPS BMT Sehati',
            'suratKeluar' => $this->M_surat_keluar->tampil()
        );

        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/suratKeluar', $data);
        $this->load->view('templates_administrator/footer');
    }

    //detail
    public function detail($id)
    {
        $this->load->model('M_surat_keluar');

        $data = array(
            'title' => 'KSPPS BMT Sehati',
            'suratKeluar' => $this->M_surat_keluar->detail_data($id)
        );

        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/suratKeluar_detail', $data);
        $this->load->view('templates_administrator/footer');
    }
}
