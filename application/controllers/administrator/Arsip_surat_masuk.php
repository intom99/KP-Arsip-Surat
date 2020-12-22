<?php

class Arsip_surat_masuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_surat_masuk');
    }

    public function index()
    {
        $data = array(
            'title' => 'KSPPS BMT Sehati',
            // 'arsip_surat_masuk' => $this->M_surat_masuk->tampil()
            'tahun' => $this->M_surat_masuk->getTahun()
        );
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/arsipSuratMasuk', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function filter()
    {
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $tahun1 = $this->input->post('tahun1');
        $tahun2 = $this->input->post('tahun2');
        $bulan_awal = $this->input->post('bulan_awal');
        $bulan_akhir = $this->input->post('bulan_akhir');
        $nilai_filter = $this->input->post('nilai_filter');


        if ($nilai_filter == 1) {
            $data = array(
                'title' => 'Laporan',
                'subtitle' => 'Dari Tanggal : ' . format_indo(date('Y-m-d', strtotime($tgl_awal))) . ' Sampai Tanggal : ' . format_indo(date('Y-m-d', strtotime($tgl_akhir))),
                'daftarFilter' => $this->M_surat_masuk->filterByTanggal($tgl_awal, $tgl_akhir)

            );
            $this->load->view('administrator/printArsip', $data);
        } elseif ($nilai_filter == 2) {

            $data = array(
                'title' => 'Laporan',
                'subtitle' => 'Dari Bulan : ' . $bulan_awal . ' Sampai Bulan : ' . $bulan_akhir . ' Tahun : ' . $tahun1,
                'daftarFilter' => $this->M_surat_masuk->filterByBulan($tahun1, $bulan_awal, $bulan_akhir)

            );


            $this->load->view('administrator/printArsip', $data);
        } elseif ($nilai_filter == 3) {
            $data = array(
                'title' => 'Laporan',
                'subtitle' => ' Tahun : ' . $tahun2,
                'daftarFilter' => $this->M_surat_masuk->filterBytahun($tahun2)

            );
            $this->load->view('administrator/printArsip', $data);
        }
    }
}
