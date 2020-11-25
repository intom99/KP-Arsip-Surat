<?php

class User_model extends CI_Model
{

	public $table = 'user';
	public $id = 'id';

	public function ambil_data($id)
	{
		$this->db->where('username', $id);
		return $this->db->get('tb_user')->row();
	}

	public function tampil_data($table)
	{
		return $this->db->get($table);
	}

	//
	public function count_data($where = '')
	{
		return $this->db->query("select*from tb_user $where");
	}
}
