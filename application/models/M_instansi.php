<?php


class M_instansi extends CI_Model
{

	public function tampil()
	{
		return $this->db->get('tb_instansi')->result();
	}

	public function input_data($data)
	{
		$this->db->insert('tb_instansi', $data);
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

	// hitung data (count dashboard)
	public function count_data($where = '')
	{
		return $this->db->query("select*from tb_instansi $where");
	}
}
