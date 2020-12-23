<?php

class Arsip_surat_keluar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_surat_keluar');
    }

    public function index()
    {
        $data = array(
            'title' => 'KSPPS BMT Sehati',
            // 'arsip_surat_keluar' => $this->M_surat_keluar->tampil(),
            'tahun' => $this->M_surat_keluar->getTahun()
        );

        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/arsipSuratKeluar', $data);
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
                'daftarFilter' => $this->M_surat_keluar->filterByTanggal($tgl_awal, $tgl_akhir),
                //'username' => $this->user_model->tampil_data()

            );
            $this->load->view('administrator/printArsip', $data);
        } elseif ($nilai_filter == 2) {

            $data = array(
                'title' => 'Laporan',
                'subtitle' => 'Dari Bulan : ' . $bulan_awal . ' Sampai Bulan : ' . $bulan_akhir . ' Tahun : ' . $tahun1,
                'daftarFilter' => $this->M_surat_keluar->filterByBulan($tahun1, $bulan_awal, $bulan_akhir)

            );


            $this->load->view('administrator/printArsip', $data);
        } elseif ($nilai_filter == 3) {
            $data = array(
                'title' => 'Laporan',
                'subtitle' => ' Tahun : ' . $tahun2,
                'daftarFilter' => $this->M_surat_keluar->filterBytahun($tahun2),
                //'username' => $this->user_model->tampil_data()->result()
            );
            $this->load->view('administrator/printArsip', $data);
        }
    }
}
