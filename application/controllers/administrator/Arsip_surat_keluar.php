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
        //$tahun2 = $this->input->post('tahun2');
        $bulan_awal = $this->input->post('bulan_awal');
        $bulan_akhir = $this->input->post('bulan_akhir');
        $nilai_filter = $this->input->post('nilai_filter');


        if ($nilai_filter == 1) {
            $data = array(
                'title' => 'Laporan',
                'laporan' => 'Surat Keluar',
                'subtitle' => 'Periode : ' . format_indo(date('Y-m-d', strtotime($tgl_awal))) . ' s/d ' . format_indo(date('Y-m-d', strtotime($tgl_akhir))),
                'daftarFilter' => $this->M_surat_keluar->filterByTanggal($tgl_awal, $tgl_akhir),
                //'username' => $this->user_model->tampil_data()

            );
            $this->load->view('administrator/printArsip', $data);
        } elseif ($nilai_filter == 2) {

            // conver $bulan_awal value int to string
            if ($bulan_awal == 1) {
                $bln_awal = "Januari";
            } elseif ($bulan_awal == 2) {
                $bln_awal = "Februari";
            } elseif ($bulan_awal == 3) {
                $bln_awal = "Maret";
            } elseif ($bulan_awal == 4) {
                $bln_awal = "April";
            } elseif ($bulan_awal == 5) {
                $bln_awal = "Mei";
            } elseif ($bulan_awal == 6) {
                $bln_awal = "Juni";
            } elseif ($bulan_awal == 7) {
                $bln_awal = "Juli";
            } elseif ($bulan_awal == 8) {
                $bln_awal = "Agustus";
            } elseif ($bulan_awal == 9) {
                $bln_awal = "September";
            } elseif ($bulan_awal == 10) {
                $bln_awal = "Oktober";
            } elseif ($bulan_awal == 11) {
                $bln_awal = "November";
            } elseif ($bulan_awal == 12) {
                $bln_awal = "Desember";
            }

            // conver $bulan_akhir value int to string
            if ($bulan_akhir == 1) {
                $bln_akhir = "Januari";
            } elseif ($bulan_akhir == 2) {
                $bln_akhir = "Februari";
            } elseif ($bulan_akhir == 3) {
                $bln_akhir = "Maret";
            } elseif ($bulan_akhir == 4) {
                $bln_akhir = "April";
            } elseif ($bulan_akhir == 5) {
                $bln_akhir = "Mei";
            } elseif ($bulan_akhir == 6) {
                $bln_akhir = "Juni";
            } elseif ($bulan_akhir == 7) {
                $bln_akhir = "Juli";
            } elseif ($bulan_akhir == 8) {
                $bln_akhir = "Agustus";
            } elseif ($bulan_akhir == 9) {
                $bln_akhir = "September";
            } elseif ($bulan_akhir == 10) {
                $bln_akhir = "Oktober";
            } elseif ($bulan_akhir == 11) {
                $bln_akhir = "November";
            } elseif ($bulan_akhir == 12) {
                $bln_akhir = 'Desember';
            }

            $data = array(
                'title' => 'Laporan',
                'laporan' => 'Surat Keluar',
                'subtitle' => 'Periode : ' . $bln_awal . ' s/d ' . $bln_akhir . ' Tahun : ' . $tahun1,
                'daftarFilter' => $this->M_surat_keluar->filterByBulan($tahun1, $bulan_awal, $bulan_akhir)

            );


            $this->load->view('administrator/printArsip', $data);
        }
        // elseif ($nilai_filter == 3) {
        //     $data = array(
        //         'title' => 'Laporan',
        //         'subtitle' => ' Tahun : ' . $tahun2,
        //         'daftarFilter' => $this->M_surat_keluar->filterBytahun($tahun2),
        //         //'username' => $this->user_model->tampil_data()->result()
        //     );
        //     $this->load->view('administrator/printArsip', $data);
        // }
    }
}
