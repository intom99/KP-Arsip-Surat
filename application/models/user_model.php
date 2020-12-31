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
		$this->db->order_by('tb_user.id', 'desc');
		return $this->db->get('tb_user');
	}

	//
	public function count_data($where = '')
	{
		return $this->db->query("select*from tb_user $where");
	}
}
