<?php


class M_karyawan extends CI_Model
{

	//tampil
	public function tampil()
	{

		$this->db->select('*');
		$this->db->from('tb_karyawan');
		$this->db->join('tb_jabatan', 'tb_jabatan.id_jabatan = tb_karyawan.id_jabatan', 'left');

		$this->db->order_by('tb_karyawan.id_karyawan', 'desc');
		return $this->db->get()->result();
	}

	//input
	public function input_data($data)
	{
		$this->db->insert('tb_karyawan', $data);
	}

	//edit
	public function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	//edit aksi
	public function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	//Hapus
	public function delete_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}
