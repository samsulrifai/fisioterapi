<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_keluhan extends CI_Model
{

    public function GetAllkeluhan()
    {
        $query = $this->db->query("SELECT * FROM keluhan");
        return $query->result_array();
    }


    public function getkeluhanById($id)
    {
        $query = $this->db->query("SELECT * FROM keluhan where id_keluhan = $id");
        return $query->result_array();
    }

    public function tambah()
    {
        {
            $data = [
                "keluhan" => $this->input->post('keluhan')
            ];
            $this->db->insert('keluhan', $data);
        }
    }

    public function edit()
    {
        $data = [
            "keluhan" => $this->input->post('keluhan')
        ];
        $this->db->where('id_keluhan', $this->input->post('id_keluhan'));
        $this->db->update('keluhan', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_keluhan', $id);
        $this->db->delete('keluhan');
    }
}
