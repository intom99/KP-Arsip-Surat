<?php

class M_surat_masuk extends CI_Model
{

	public function tampil()
	{
		$this->db->select('*');
		$this->db->from('tb_surat_masuk');
		$this->db->join('tb_instansi', 'tb_instansi.id_instansi=tb_surat_masuk.id_instansi', 'left');
		$this->db->join('tb_jenis_surat', 'tb_jenis_surat.id_js=tb_surat_masuk.id_js', 'left');


		$this->db->order_by('tb_surat_masuk.id_surat_masuk', 'desc');
		return $this->db->get()->result();
	}

	public function input_data($data)
	{
		return $this->db->insert('tb_surat_masuk', $data);
	}

	public function edit_data($where)
	{
		$this->db->join('tb_instansi', 'tb_instansi.id_instansi=tb_surat_masuk.id_instansi', 'left');
		$this->db->join('tb_jenis_surat', 'tb_jenis_surat.id_js=tb_surat_masuk.id_js', 'left');

		return $this->db->get_where('tb_surat_masuk', $where);
	}

	// update data
	public function update_data($table, $data, $where)
	{
		$this->db->update($table, $data, $where);
	}

	public function detail_data($id = Null)
	{
		$this->db->join('tb_instansi', 'tb_instansi.id_instansi = tb_surat_masuk.id_instansi', 'left');
		$this->db->join('tb_jenis_surat', 'tb_jenis_surat.id_js = tb_surat_masuk.id_js', 'left');
		$query = $this->db->get_where('tb_surat_masuk', array('id_surat_masuk' => $id))->row();

		return $query;
	}

	// hapus data
	public function delete_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	// ambil data
	public function count_data($where = '')
	{
		return $this->db->query("select*from tb_surat_masuk $where;");
	}

	// ------------ Filter Arsip Surat Masuk --------------------

	public function getTahun()
	{
	}
}
