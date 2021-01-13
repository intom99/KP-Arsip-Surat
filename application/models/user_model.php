<?php

class User_model extends CI_Model
{

	// public $table = 'tb_user';
	public $id = 'id';

	public function ambil_data($id)
	{
		$this->db->where('username', $id);
		return $this->db->get('tb_user')->row();
	}

	public function tampil_data()
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->join('tb_karyawan', 'tb_karyawan.id_karyawan = tb_user.id_karyawan', 'left');
		$this->db->order_by('tb_user.id', 'desc');
		return $this->db->get()->result();
	}



	//model tambah data
	function input_data($data)
	{
		return $this->db->insert('tb_user', $data);
	}

	//edit
	public function edit_data($where, $table)
	{
		//$this->db->join('tb_user', 'tb_jabatan.id_jabatan = tb_karyawan.id_jabatan', 'left');
		return $this->db->get_where($table, $where);
	}

	//edit aksi
	public function update_data($table, $data, $where)
	{
		$this->db->update($table, $data, $where);
	}

	//Hapus
	public function delete_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	//
	public function count_data($where = '')
	{
		return $this->db->query("select*from tb_user $where");
	}
}
