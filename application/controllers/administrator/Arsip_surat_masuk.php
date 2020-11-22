<?php

class Arsip_surat_masuk extends CI_Controller
{
    public function index()
    {
        $data = array(
            'title' => 'KSPPS BMT Sehati',
            'arsip_surat_masuk' => $this->M_surat_masuk->tampil()
        );
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/arsipSuratMasuk', $data);
        $this->load->view('templates_administrator/footer');
    }
}
