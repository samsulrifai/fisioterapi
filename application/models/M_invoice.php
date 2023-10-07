
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_invoice extends CI_Model
{
    public function getAllinvoice()
    {
        $query = $this->db->query("SELECT * FROM invoice WHERE status_transaksi = '0'");
        return $query->result_array();
    }

    public function getAllKeluhan()
    {
        $query = $this->db->query("SELECT keluhan FROM keluhan");
        return $query->result_array();
    }

    public function getTeraphy()
    {
        $query = $this->db->query("SELECT nama_teraphy, harga FROM teraphy");
        return $query->result_array();
    }

    public function getTeraphy_id($id)
    {
        $query = $this->db->query("SELECT intervensi, harga_teraphy FROM invoice WHERE id_invoice = '$id'");
        return $query->result_array();
    }

    public function getinvoiceById($id)
    {
        $query = $this->db->query("SELECT * FROM invoice WHERE id_invoice = '$id'");
        return $query->result_array();
    }

    public function getkeluhan_id($id_pasien)
    {
        $query = $this->db->query("SELECT keluhan FROM invoice WHERE id_invoice = '$id_pasien'");
        return $query->result_array();
    }

    public function komplit($data, $id)
    {
        $this->db->where('id_invoice', $id);
        $this->db->update('invoice', $data);
    }

    public function cariDetail($keyword)
    {
        $query = $this->db->query("SELECT * FROM invoice where id_detail_menu like '%$keyword%' ");
        return $query->result_array();
    }

    public function delete($id)
    {
        $this->db->where('id_invoice', $id);
        $this->db->delete('invoice');
    }

    public function edit()
    {

        $keluhan = $this->input->post('keluhan');
        $intervensi = $this->input->post('intervensi');

        $keluhan_arr = '';
        if(isset($keluhan)){
            foreach($keluhan as $dt_keluhan){
                $arr_keluhan[] = $dt_keluhan;
            }
            $keluhan_arr = implode(',', $arr_keluhan);
        }

        $teraphy_arr = '';
        if(isset($intervensi)){
            foreach($intervensi as $dt_teraphy){
                $arr_teraphy[] = $dt_teraphy;
            }
            $teraphy_arr = implode(',', $arr_teraphy);
        }

        $data = [
            "nama_pasien"     => $this->input->post('nama_pasien'),
            "umur"            => $this->input->post('umur'),
            "nik"             => $this->input->post('nik'),
            "alamat"          => $this->input->post('alamat'),
            "no_hp"           => $this->input->post('no_hp'),
            "tanggal_teraphy" => $this->input->post('tanggal_teraphy'),
            "jam_teraphy"     => $this->input->post('jam_teraphy'),
            "keluhan"         => $keluhan_arr,
            "diagnosa"        => $this->input->post('diagnosa'),
            "intervensi"      => $teraphy_arr,
            "harga_teraphy"   => $this->input->post('harga_teraphy'),
            "terapi_ke"       => $this->input->post('terapi_ke'),
            "total_harga"     => $this->input->post('total_harga')
        ];
        $this->db->where('id_invoice', $this->input->post('id_invoice'));
        $this->db->update('invoice', $data);
    }

    public function save()
    {
        // Upload Gambar
        if (empty($_FILES['bukti_pembayaran']['name'])) {
            $data = [
                "id_invoice" => $this->session->userdata('id_invoice'),
                "bukti_pembayaran" => 'Tidak Ada Gambar'
            ];
            $this->db->insert('invoice', $data);
        } else {
            $file_name = $_FILES['bukti_pembayaran']['name'];
            $newfile_name = str_replace(' ', '', $file_name);
            $config['upload_path']          = './assets/dataresto/invoice/';
            $config['allowed_types']        = 'jpg|png';
            $newName = date('dmYHis') . $newfile_name;
            $config['file_name']         = $newName;
            $config['max_size']             = 5100;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('bukti_pembayaran')) {
                $this->upload->data('file_name');
                $data = [
                    "id_invoice" => $this->session->userdata('id_invoice'),
                    "bukti_pembayaran" => $newName
                ];
                $this->db->insert('invoice', $data);
            }
        }
    }

    public function uploadBuktiBayar()
    {
        $invoice = $this->input->post('invoice');

        $file_name1 = $_FILES['bukti_pembayaran']['name'];
        $newfile_name1 = str_replace(' ', '', $file_name1);
        $config['upload_path']          = './assets/dataresto/bukti_bayar';
        $newName = date('dmYHis') .  $newfile_name1;
        $config['file_name']         = $newName;
        $config['max_size']             = 10100;
        $config['allowed_types']        = 'jpg|png|jpeg';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('bukti_pembayaran')) {
            $data = [
                'bukti_pembayaran' => $newName
            ];

            $this->db->where('id_detail_menu', $invoice);
            $this->db->update('invoice', $data);
        }
    }
}
