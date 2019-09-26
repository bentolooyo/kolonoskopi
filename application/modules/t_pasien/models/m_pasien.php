<?php

class M_pasien extends CI_Model{


function ambil_semua($tabel,$tanggal_awal,$tanggal_akhir){
        // $this->db->from($tabel);
        // $this->db->order_by("id_pasien", "desc");
$query = $this->db->query("SELECT id_pasien, no_rm, perkiraan_operasi,tempat, nama_pasien, tanggal_lahir, nama_dokter, nama_kelas, tanggal_input ,TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS umur ,status FROM `t_pasien`
LEFT JOIN m_dokter ON t_pasien.id_dokter = m_dokter.id_dokter
LEFT JOIN m_ruang ON t_pasien.id_kamar = m_ruang.id_ruang
WHERE tanggal_input  BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."'
ORDER BY id_pasien DESC");
        return $query->result();
  }

  function hariini($tabel){
          // $this->db->from($tabel);
          // $this->db->order_by("id_pasien", "desc");
          $tanggal = date('Y-m-d');
  $query = $this->db->query("SELECT id_pasien, no_rm, perkiraan_operasi, nama_pasien, tanggal_lahir, nama_dokter, nama_kelas, tanggal_input ,TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS umur ,status FROM `t_pasien`
  LEFT JOIN m_dokter ON t_pasien.id_dokter = m_dokter.id_dokter
  LEFT JOIN m_ruang ON t_pasien.id_kamar = m_ruang.id_ruang
  WHERE perkiraan_operasi = '".$tanggal."'
  ORDER BY id_pasien DESC");
          return $query->result();
    }

    function bulanini($tabel){
            // $this->db->from($tabel);
            // $this->db->order_by("id_pasien", "desc");
            $tanggal = date('m');
    $query = $this->db->query("SELECT id_pasien, no_rm, perkiraan_operasi, nama_pasien, tanggal_lahir, nama_dokter, nama_kelas, tanggal_input ,TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS umur ,status FROM `t_pasien`
    LEFT JOIN m_dokter ON t_pasien.id_dokter = m_dokter.id_dokter
    LEFT JOIN m_ruang ON t_pasien.id_kamar = m_ruang.id_ruang
    WHERE  MONTH(perkiraan_operasi) = '".$tanggal."'
    ORDER BY id_pasien DESC");
            return $query->result();
      }

      function belum_input($tabel){
              // $this->db->from($tabel);
              // $this->db->order_by("id_pasien", "desc");
              $status = 'belum';
      $query = $this->db->query("SELECT id_pasien, no_rm, perkiraan_operasi, nama_pasien, tanggal_lahir, nama_dokter, nama_kelas, tanggal_input ,TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS umur ,status FROM `t_pasien`
      LEFT JOIN m_dokter ON t_pasien.id_dokter = m_dokter.id_dokter
      LEFT JOIN m_ruang ON t_pasien.id_kamar = m_ruang.id_ruang
      WHERE  status = '".$status."'
      ORDER BY id_pasien DESC");
              return $query->result();
        }

        function semua($tabel){
                // $this->db->from($tabel);
                // $this->db->order_by("id_pasien", "desc");
                $status = 'belum';
        $query = $this->db->query("SELECT id_pasien, no_rm, perkiraan_operasi, nama_pasien, tanggal_lahir, nama_dokter, nama_kelas, tanggal_input ,TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS umur ,status FROM `t_pasien`
        LEFT JOIN m_dokter ON t_pasien.id_dokter = m_dokter.id_dokter
        LEFT JOIN m_ruang ON t_pasien.id_kamar = m_ruang.id_ruang
        ORDER BY id_pasien DESC");
                return $query->result();
          }

function insert($table,$data){
        $this->db->insert($table,$data);
    }

function ambilid($tabel,$where)
    {
      $query = $this->db->query("SELECT id_pasien, no_rm, nama_pasien, barcode, perkiraan_operasi, nama_kelas, alamat, keluhan, diagnosa, alat, obat_pre, hasil, kesimpulan, saran, nama_dokter, TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS umur, keluhan, jenis_kelamin, tempat,obat_pre, tanggal_lahir, keluhan, diagnosa, alat, nama_dokter, nama_kelas, tanggal_input ,TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS umur ,status FROM `t_pasien`LEFT JOIN m_dokter ON t_pasien.id_dokter = m_dokter.id_dokter LEFT JOIN m_ruang ON t_pasien.id_kamar = m_ruang.id_ruang WHERE id_pasien =".$where);
      return $query->result();
          // return $this->db->get_where($tabel,$where);
    }
public function ambil_dataid($id)
{
  return $this->db->get_where('t_pasien',$id);
}
function update($tabel,$data,$where)
    {
      $this->db->where($where);
      $this->db->update($tabel,$data);
    }

function hapus($table,$data){
        $this->db->delete($table,$data);
    }


    function kode_otomatis()
        {
          $this->db->select('RIGHT(t_pasien.barcode,4) as kode',false);
          $this->db->limit(1);
          $this->db->order_by('barcode','DESC');
          $query = $this->db->get('t_pasien');
          if($query->num_rows()<>0){
            $data = $query->row();
            $kode= intval($data->kode)+1;
          }else {
            $kode=1;
          }
          $kodemax = str_pad($kode,7,"0",STR_PAD_LEFT);
          $kodejadi = "KLRSWW".$kodemax;
          return $kodejadi;
        }


        function ambil_ruang($tabel){
                $this->db->from($tabel);
                $this->db->order_by("nama_kelas", "asc");
                $query = $this->db->get();
                return $query->result();
          }
          function ambil_dokter($tabel){
                  $this->db->from($tabel);
                  $this->db->order_by("nama_dokter", "asc");
                  $query = $this->db->get();
                  return $query->result();
            }
function get_kamar($id){
          $query = $this->db->query('Select * From m_ruang WHERE id_ruang ='.$id);
          return $query->result();
          }
function get_foto($id){
          $query = $this->db->query('Select * From t_foto WHERE id_pasien ='.$id);
          return $query->result();
          }
          function ambil_fotoid($id){
                    $query = $this->db->query('Select * From t_foto WHERE id_foto ='.$id);
                    return $query->result();
                    }
function get_dokter($id){
          $query = $this->db->query('Select * From m_dokter WHERE id_dokter ='.$id);
          return $query->result();
          }

}
