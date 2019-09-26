<?php

class M_dashboard extends CI_Model{

public function jumlah_anggota()
{
// return  $this->db->query('SELECT sum(jumlah_anggota) as jumlah_semua FROM t_lapor ')->result_array();
}


public function jumlah_hariini()
{
  $tanggal = date('Y-m-d');
return  $this->db->query('SELECT COUNT(id_pasien) as jumlah_hariini FROM t_pasien WHERE perkiraan_operasi ="'.$tanggal.'"')->result_array();
}

public function jumlah_satubulan()
{
  $tanggal = date('m');
return  $this->db->query('SELECT COUNT(id_pasien) as jumlah_satubulan FROM t_pasien WHERE MONTH(perkiraan_operasi)  ="'.$tanggal.'"')->result_array();
}

public function jumlah_beluminput()
{
  $status = 'belum';
return  $this->db->query('SELECT COUNT(id_pasien) as jumlah_beluminput FROM t_pasien WHERE status  ="'.$status.'"')->result_array();
}

public function jumlah_keseluruhan()
{

return  $this->db->query('SELECT COUNT(id_pasien) as jumlah_keseluruhan FROM t_pasien')->result_array();
}

public function jumlah_kelompok_ta()
{
// return  $this->db->query('SELECT COUNT(id_lapor) as jumlah_kelompok_ta FROM t_lapor WHERE status = "tidak"')->result_array();
}

public function jumlah_seluruh_kelompok()
{
// return  $this->db->query('SELECT COUNT(id_lapor) as jumlah_kelompok FROM t_lapor ')->result_array();
}

public function semua_bulan()
{
return  $this->db->query('SELECT DATE_FORMAT(tanggal_input, "%M") as bulan ,COUNT(*) AS jumlah_bulanan FROM t_pasien GROUP BY MONTH(tanggal_input)')->result();
}
}
