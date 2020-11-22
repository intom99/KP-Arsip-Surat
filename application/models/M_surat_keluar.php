<?php

class M_surat_keluar extends CI_Model
{
    public function tampil()
    {
        $this->db->select('*');
        $this->db->from('tb_surat_keluar');
        $this->db->join('tb_instansi', 'tb_instansi.id_instansi = tb_surat_keluar.id_instansi', 'left');
        $this->db->join('tb_jenis_surat', 'tb_jenis_surat.id_js = tb_surat_keluar.id_js', 'left');
        $this->db->order_by('tb_surat_keluar.id_surat_keluar', 'desc');

        return $this->db->get()->result();
    }

    public function detail_data($id = Null)
    {

        $this->db->join('tb_instansi', 'tb_instansi.id_instansi = tb_surat_keluar.id_instansi', 'left');
        $this->db->join('tb_jenis_surat', 'tb_jenis_surat.id_js = tb_surat_keluar.id_js', 'left');
        $query = $this->db->get_where('tb_surat_keluar', array('id_surat_keluar' => $id))->row();

        return $query;
    }
}
