<?php

class Surat_keluar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_surat_keluar');
        is_logged(); //helper access
    }


    public function index()
    {
        if ($this->session->userdata['level'] == 'admin') {
            $data = array(
                'title' => 'KSPPS BMT Sehati',
                'suratKeluar' => $this->M_surat_keluar->tampil()
            );

            $this->load->view('templates_administrator/header', $data);
            $this->load->view('templates_administrator/sidebar');
            $this->load->view('administrator/suratKeluar', $data);
            $this->load->view('templates_administrator/footer');
        } else {
            $data['title'] = 'KSPPS BMT Sehati';
            $this->load->view('templates_ketua/header', $data);
            $this->load->view('templates_ketua/sidebar');
            $this->load->view('administrator/404_page');
            $this->load->view('templates_ketua/footer');
        }
    }

    // tambah
    public function add()
    {
        if ($this->session->userdata['level'] == 'admin') {
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
        } else {
            $data['title'] = 'KSPPS BMT Sehati';
            $this->load->view('templates_ketua/header', $data);
            $this->load->view('templates_ketua/sidebar');
            $this->load->view('administrator/404_page');
            $this->load->view('templates_ketua/footer');
        }
    }
    public function uploadGagal()
    {
        $this->load->view('administrator/suratKeluar_add', array('error' => '*format file harus PDF'));
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
            $lampiran = $_FILES['lampiran']['name'];
            if ($lampiran = '') {
            } else {
                $config['upload_path'] = './assets/arsip/surat-keluar';
                $config['allowed_types'] = 'pdf';
                $config['max_size']             = 0;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('lampiran')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('administrator/suratKeluar_add', $error);
                } else {
                    $lampiran = $this->upload->data('file_name');
                }
            }

            $data = array(
                'no_surat' => $no_surat,
                'tgl_surat' => $tgl_surat,
                'id_instansi' => $id_instansi,
                'id_js' => $id_js,
                'perihal' => $perihal,
                'ket' => $ket,
                'lampiran' => $lampiran
            );

            $this->M_surat_keluar->input_data($data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						Data Surat keluar Berhasil ditambahkan
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');

            redirect('Surat_keluar');
        }
    }

    // edit
    public function edit($id)
    {
        if ($this->session->userdata['level'] == 'admin') {
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
        } else {
            $data['title'] = 'KSPPS BMT Sehati';
            $this->load->view('templates_ketua/header', $data);
            $this->load->view('templates_ketua/sidebar');
            $this->load->view('administrator/404_page');
            $this->load->view('templates_ketua/footer');
        }
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
            $lampiran = $_FILES['lampiran']['name'];
            if ($lampiran) {
                $config['upload_path'] = './assets/arsip/surat-keluar';
                $config['allowed_types'] = 'pdf';
                $config['max_size']             = 0;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('lampiran')) {
                    $lampiran = $this->upload->data('file_name');
                    $this->db->set('lampiran', $lampiran);
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $data = array(
                'no_surat' => $no_surat,
                'tgl_surat' => $tgl_surat,
                'id_instansi' => $id_instansi,
                'id_js' => $id_js,
                'perihal' => $perihal,
                'ket' => $ket,

            );
            $where = array('id_surat_keluar' => $id_surat_keluar);

            $this->M_surat_keluar->update_data('tb_surat_keluar', $data, $where);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						Data Surat keluar Berhasil diupdate
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');

            redirect('Surat_keluar');
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
        if ($this->session->userdata['level'] == 'admin') {
            $this->load->model('M_surat_keluar');
            $data = array(
                'title' => 'KSPPS BMT Sehati',
                'suratKeluar' => $this->M_surat_keluar->detail_data($id)
            );

            $this->load->view('templates_administrator/header', $data);
            $this->load->view('templates_administrator/sidebar');
            $this->load->view('administrator/suratKeluar_detail', $data);
            $this->load->view('templates_administrator/footer');
        } else {
            $data['title'] = 'KSPPS BMT Sehati';
            $this->load->view('templates_ketua/header', $data);
            $this->load->view('templates_ketua/sidebar');
            $this->load->view('administrator/404_page');
            $this->load->view('templates_ketua/footer');
        }
    }

    // hapus data
    public function delete($id)
    {
        if ($this->session->userdata['level'] == 'admin') {
            $where = array('id_surat_keluar' => $id);
            $this->M_surat_keluar->delete_data($where, 'tb_surat_keluar');

            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Data Surat Keluar Berhasil Dihapus
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button></div>');
            redirect('Surat_keluar');
        } else {
            $data['title'] = 'KSPPS BMT Sehati';
            $this->load->view('templates_ketua/header', $data);
            $this->load->view('templates_ketua/sidebar');
            $this->load->view('administrator/404_page');
            $this->load->view('templates_ketua/footer');
        }
    }
}
