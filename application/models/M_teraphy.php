<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_teraphy extends CI_Model
{

    public function GetAllTeraphy()
    {
        $query = $this->db->query("SELECT * FROM teraphy");
        return $query->result_array();
    }


    public function getTeraphyById($id)
    {
        $query = $this->db->query("SELECT * FROM teraphy where id_teraphy = $id");
        return $query->result_array();
    }

    public function tambah()
    {
        {
            $data = [
                "nama_teraphy" => $this->input->post('nama_teraphy'),
                "deskripsi"    => $this->input->post('deskripsi'),
                "kode"         => $this->input->post('kode'),
                "harga"        => $this->input->post('harga')
            ];
            $this->db->insert('teraphy', $data);
        }
    }

    public function edit()
    {
        $data = [
            "nama_teraphy" => $this->input->post('nama_teraphy'),
            "deskripsi"    => $this->input->post('deskripsi'),
            "kode"         => $this->input->post('kode'),
            "harga"        => $this->input->post('harga')
        ];
        $this->db->where('id_teraphy', $this->input->post('id_teraphy'));
        $this->db->update('teraphy', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_teraphy', $id);
        $this->db->delete('teraphy');
    }
}
