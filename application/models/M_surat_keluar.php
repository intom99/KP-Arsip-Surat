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

    public function input_data($data)
    {
        return $this->db->insert('tb_surat_keluar', $data);
    }
    public function edit_data($where)
    {
        $this->db->join('tb_instansi', 'tb_instansi.id_instansi = tb_surat_keluar.id_instansi', 'left');
        $this->db->join('tb_jenis_surat', 'tb_jenis_surat.id_js = tb_surat_keluar.id_js', 'left');

        return $this->db->get_where('tb_surat_keluar', $where);
    }

    public function update_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    public function detail_data($id = Null)
    {

        $this->db->join('tb_instansi', 'tb_instansi.id_instansi = tb_surat_keluar.id_instansi', 'left');
        $this->db->join('tb_jenis_surat', 'tb_jenis_surat.id_js = tb_surat_keluar.id_js', 'left');
        $query = $this->db->get_where('tb_surat_keluar', array('id_surat_keluar' => $id))->row();

        return $query;
    }

    // hapus data
    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    //ambil data
    public function count_data($where = '')
    {
        return $this->db->query("select*from tb_surat_keluar $where");
    }

    // ------------ Filter Arsip Surat Masuk --------------------

    public function getTahun()
    {
        return $this->db->query("SELECT YEAR(created) AS Tahun 
		FROM tb_surat_keluar GROUP BY YEAR(created) 
		ORDER BY YEAR(created) ASC")->result();
    }

    public function filterByTanggal($tgl_awal, $tgl_akhir)
    {
        return $this->db->query("SELECT*FROM tb_surat_keluar INNER JOIN tb_instansi ON tb_instansi.id_instansi = tb_surat_keluar.id_instansi WHERE created BETWEEN '$tgl_awal' AND '$tgl_akhir'
		ORDER BY created ASC")->result();
    }
    public function filterByMinggu()
    {
        return $this->db->query("SELECT YEARWEEK(created) AS tahun_minggu, COUNT(*) AS jumlah_mingguan
		FROM tb_surat_keluar
		WHERE YEARWEEK(created)=YEARWEEK(NOW())
		GROUP BY YEARWEEK(created)
		")->result();
    }
    public function filterByBulan($tahun1, $bulan_awal, $bulan_akhir)
    {
        return $this->db->query("SELECT*FROM tb_surat_keluar INNER JOIN tb_instansi ON tb_instansi.id_instansi = tb_surat_keluar.id_instansi WHERE YEAR(created) = '$tahun1' AND MONTH(created) BETWEEN '$bulan_awal' AND '$bulan_akhir'
		ORDER BY created ASC")->result();
    }

    public function filterBytahun($tahun2)
    {
        return $this->db->query("SELECT*FROM tb_surat_keluar INNER JOIN tb_instansi ON tb_instansi.id_instansi = tb_surat_keluar.id_instansi WHERE YEAR(created) = '$tahun2'
		ORDER BY created ASC")->result();
    }

    // --------------------- Cetak------------------
}
