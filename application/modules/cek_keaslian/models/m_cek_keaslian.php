<?php

class m_cek_keaslian extends CI_Model{


function ambil_semua($tabel){
        $this->db->from($tabel);
        $this->db->order_by("id_dokter", "desc");
        $query = $this->db->get();
        return $query->result();
  }

function insert($table,$data){
        $this->db->insert($table,$data);
    }

function ambilid($tabel,$where)
    {
          return $this->db->get_where($tabel,$where);
    }

function update($tabel,$data,$where)
    {
      $this->db->where($where);
      $this->db->update($tabel,$data);
    }

function hapus($table,$data){
        $this->db->delete($table,$data);
    }
}
