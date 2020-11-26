<?php

class Arsip_surat_keluar extends CI_Controller
{
    public function index()
    {
        $data = array(
            'title' => 'KSPPS BMT Sehati',
            'arsip_surat_keluar' => $this->M_surat_keluar->tampil()
        );

        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/arsipSuratKeluar', $data);
        $this->load->view('templates_administrator/footer');
    }
}
