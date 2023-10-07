<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pasien extends CI_Model
{

    public function GetAllpasien()
    {
        $query = $this->db->query("SELECT * FROM pasien ORDER BY nama_pasien ASC");
        return $query->result_array();
    }

    public function getpasienById($id)
    {
        $query = $this->db->query("SELECT * FROM pasien where id_pasien = $id");
        return $query->result_array();
    }

    public function getInvoiceByID($id){
        $query = $this->db->query("SELECT * FROM invoice WHERE id_pasien = $id ORDER BY tanggal_teraphy ASC");
        return $query->result_array();
    }

    public function getkeluhan(){
        $query = $this->db->query("SELECT * FROM keluhan ORDER BY keluhan ASC");
        return $query->result_array();
    }

    public function get_teraphy()
    {
        $query = $this->db->query("SELECT * FROM teraphy ORDER BY nama_teraphy ASC");
        return $query->result_array();
    }

    public function tambah()
    {
        {
            $data = [
                "nama_pasien" => $this->input->post('nama_pasien'),
                "umur"        => $this->input->post('umur'),
                "nik"         => $this->input->post('nik'),
                "alamat"      => $this->input->post('alamat'),
                "no_hp"       => $this->input->post('no_hp')
            ];
            $this->db->insert('pasien', $data);
        }
    }

    public function cek_invoice($id_pasien, $nama_pasien, $nik, $tanggal_teraphy, $jam_teraphy)
    {
        $this->db->from('invoice');
        $this->db->where('id_pasien', $id_pasien);
        $this->db->where('nama_pasien', $nama_pasien);
        $this->db->where('nik', $nik);
        $this->db->where('tanggal_teraphy', $tanggal_teraphy);
        $this->db->where('jam_teraphy', $jam_teraphy);

        $query = $this->db->get();
        return $query;
    }

    public function proses_invoice($data)
    {
        // $this->db->trans_begin();
        // $this->db->insert('invoice', $data);
        // if ($this->db->trans_status() == FALSE) {
        //     $this->db->trans_rollback();
        //     $result = 0;
        //     } else {
        //         $this->db->trans_commit();
        //         $result = 1;
        //     }
        //     return $result;
        // return TRUE;
        $this->db->insert('invoice', $data);
    }

    public function edit()
    {
        $data = [
            "nama_pasien" => $this->input->post('nama_pasien'),
            "umur"        => $this->input->post('umur'),
            "nik"         => $this->input->post('nik'),
            "alamat"      => $this->input->post('alamat'),
            "no_hp"       => $this->input->post('no_hp')
        ];
        $this->db->where('id_pasien', $this->input->post('id_pasien'));
        $this->db->update('pasien', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_pasien', $id);
        $this->db->delete('pasien');
    }
}
