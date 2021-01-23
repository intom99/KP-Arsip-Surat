<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_surat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_jenis_surat');
        is_logged(); //helper access
    }

    public function index()
    {
        if ($this->session->userdata['level'] == 'admin') {
            $data['title'] = 'KSPPS BMT Sehati';
            $data['jenis_surat'] = $this->M_jenis_surat->tampil();

            $this->load->view('templates_administrator/header', $data);
            $this->load->view('templates_administrator/sidebar');
            $this->load->view('administrator/jenis_surat', $data);
            $this->load->view('templates_administrator/footer');
        } else {
            $data['title'] = 'KSPPS BMT Sehati';
            $this->load->view('templates_ketua/header', $data);
            $this->load->view('templates_ketua/sidebar');
            $this->load->view('administrator/404_page');
            $this->load->view('templates_ketua/footer');
        }
    }

    // add
    public function add()
    {
        if ($this->session->userdata['level'] == 'admin') {
            $data = array(
                'title' => 'KSPPS BMT Sehati',
                'id_js' => set_value('id_js'),
                'jenis_surat' => set_value('jenis_surat'),

            );

            $this->load->view('templates_administrator/header', $data);
            $this->load->view('templates_administrator/sidebar');
            $this->load->view('administrator/jenis_surat_add', $data);
            $this->load->view('templates_administrator/footer');
        } else {
            $data['title'] = 'KSPPS BMT Sehati';
            $this->load->view('templates_ketua/header', $data);
            $this->load->view('templates_ketua/sidebar');
            $this->load->view('administrator/404_page');
            $this->load->view('templates_ketua/footer');
        }
    }

    // add action (input)
    public function input()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $data = array(
                'jenis_surat' => $this->input->post('jenis_surat', TRUE)
            );

            $this->M_jenis_surat->input_data($data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <b><i class="fas fa-check"></i> Sukses! </b>Data jenis surat berhasil ditambah
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');

            redirect('Jenis_surat');
        }
    }

    // edit
    public function edit($id)
    {
        if ($this->session->userdata['level'] == 'admin') {
            $data['title'] = 'KSPPS BMT Sehati';
            $where = array('id_js' => $id);
            $data['jenis_surat'] = $this->M_jenis_surat->edit_data($where, 'tb_jenis_surat')->result();
            $this->load->view('templates_administrator/header', $data);
            $this->load->view('templates_administrator/sidebar');
            $this->load->view('administrator/jenis_surat_edit', $data);
            $this->load->view('templates_administrator/footer');
        } else {
            $data['title'] = 'KSPPS BMT Sehati';
            $this->load->view('templates_ketua/header', $data);
            $this->load->view('templates_ketua/sidebar');
            $this->load->view('administrator/404_page');
            $this->load->view('templates_ketua/footer');
        }
    }

    // edit action (update)
    public function update()
    {
        $id_js = $this->input->post('id_js');
        $jenis_surat = $this->input->post('jenis_surat');

        $data = array(
            'jenis_surat' => $jenis_surat
        );

        $where = array('id_js' => $id_js);

        $this->M_jenis_surat->update_data($where, $data, 'tb_jenis_surat');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <b><i class="fas fa-check"></i> Sukses! </b>Data jenis surat berhasil diupdate
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');
        redirect('Jenis_surat');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('jenis_surat', 'jenis_surat', 'required', ['required' => 'Nama Instansi Wajib Diisi']);
    }

    // Hapus
    public function delete($id_js)
    {
        if ($this->session->userdata['level'] == 'admin') {
            $where = array(
                'id_js' => $id_js
            );
            $this->M_jenis_surat->delete_data($where, 'tb_jenis_surat');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <b><i class="fas fa-check"></i> Sukses! </b>Data jenis surat berhasil dihapus
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span></button></div>');
            redirect('Jenis_surat');
        } else {
            $data['title'] = 'KSPPS BMT Sehati';
            $this->load->view('templates_ketua/header', $data);
            $this->load->view('templates_ketua/sidebar');
            $this->load->view('administrator/404_page');
            $this->load->view('templates_ketua/footer');
        }
    }
}
