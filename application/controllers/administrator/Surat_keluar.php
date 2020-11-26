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

    // tambah
    public function add()
    {
        $data = array(
            'title' => 'KSPPS BMT Sehati',
            'suratKeluar' => $this->M_surat_keluar->tampil(),
            'instansi' => $this->M_instansi->tampil(),
            'jenis_surat' => $this->M_jenis_surat->tampil()
        );

        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/suratKeluar_add', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function input()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $no_surat = $this->input->post('no_surat', TRUE);
            $tgl_surat = $this->input->post('tgl_surat', TRUE);
            $id_instansi = $this->input->post('id_instansi', TRUE);
            $id_js = $this->input->post('id_js', TRUE);
            $perihal = $this->input->post('perihal', TRUE);
            $ket = $this->input->post('ket', TRUE);


            $data = array(
                'no_surat' => $no_surat,
                'tgl_surat' => $tgl_surat,
                'id_instansi' => $id_instansi,
                'id_js' => $id_js,
                'perihal' => $perihal,
                'ket' => $ket,
                //'lampiran' => $lampiran
            );

            $this->M_surat_keluar->input_data($data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						Data Surat keluar Berhasil ditambahkan
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');

            redirect('administrator/Surat_keluar');
        }
    }

    // edit
    public function edit($id)
    {
        $where = array('id_surat_keluar' => $id);
        $data = array(
            'title' => 'KSPPS BMT Sehati',
            'suratKeluar' => $this->M_surat_keluar->edit_data($where)->result(),
            'instansi' => $this->M_instansi->tampil(),
            'jenis_surat' => $this->M_jenis_surat->tampil()
        );

        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/suratKeluar_edit', $data);
        $this->load->view('templates_administrator/footer');
    }

    // update data
    public function update()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            //$this->edit();
        } else {
            $id_surat_keluar = $this->input->post('id_surat_keluar', TRUE);
            $no_surat = $this->input->post('no_surat', TRUE);
            $tgl_surat = $this->input->post('tgl_surat', TRUE);
            $id_instansi = $this->input->post('id_instansi', TRUE);
            $id_js = $this->input->post('id_js', TRUE);
            $perihal = $this->input->post('perihal', TRUE);
            $ket = $this->input->post('ket', TRUE);


            $data = array(
                'no_surat' => $no_surat,
                'tgl_surat' => $tgl_surat,
                'id_instansi' => $id_instansi,
                'id_js' => $id_js,
                'perihal' => $perihal,
                'ket' => $ket,
                //'lampiran' => $lampiran
            );
            $where = array('id_surat_keluar' => $id_surat_keluar);

            $this->M_surat_keluar->update_data('tb_surat_keluar', $data, $where);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						Data Surat keluar Berhasil diupdate
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');

            redirect('administrator/Surat_keluar');
        }
    }

    // rule
    public function _rules()
    {

        $this->form_validation->set_rules('no_surat', 'no_surat', 'required', ['required' => 'No Surat Wajib Diisi']);
        $this->form_validation->set_rules('tgl_surat', 'tgl_surat', 'required', ['required' => 'Tanggal Surat Wajib Diisi']);
        $this->form_validation->set_rules('perihal', 'perihal', 'required', ['required' => 'perihal Wajib Diisi']);
        $this->form_validation->set_rules('ket', 'ket', 'required', ['required' => 'keterangan Wajib Diisi']);
        //$this->form_validation->set_rules('lampiran', 'lampiran', 'required', ['required' => 'lampiran Wajib Diisi']);
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

    // hapus data
    public function delete($id)
    {
        $where = array('id_surat_keluar' => $id);
        $this->M_surat_keluar->delete_data($where, 'tb_surat_keluar');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						Data Surat Keluar Berhasil Dihapus
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');
        redirect('administrator/Surat_keluar');
    }
}
