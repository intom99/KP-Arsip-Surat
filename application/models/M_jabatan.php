<?php


class M_jabatan extends CI_Model
{

	public function tampil()
	{
		$this->db->select('*');
		$this->db->from('tb_jabatan');
		$this->db->order_by('tb_jabatan.id_jabatan', 'desc');

		return $this->db->get()->result();
	}

	public function input_data($data)
	{
		$this->db->insert('tb_jabatan', $data);
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
