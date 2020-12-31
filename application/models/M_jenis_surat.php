<?php

class M_jenis_surat extends CI_Model
{

    public function tampil()
    {
        $this->db->order_by('tb_jenis_surat.id_js', 'desc');
        return $this->db->get('tb_jenis_surat')->result();
    }

    public function input_data($data)
    {
        $this->db->insert('tb_jenis_surat', $data);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }


    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
