<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_invoice extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // if (empty($this->session->userdata('id_pegawai'))) {
        //     redirect('auth/loginPegawai', 'refresh');
        // }
        $this->load->model('M_invoice');
    }

    public function getProfilUsaha()
    {
        $getProfil = $this->db->query("SELECT * FROM profil_usaha");
        foreach ($getProfil->result_array() as $profil) {
            $arr['nama_usaha'] = $profil['nama_usaha'];
            $arr['alamat'] = $profil['alamat'];
            $arr['nomor_telepon'] = $profil['nomor_telepon'];
            $arr['maps_link'] = $profil['maps_link'];
            $arr['instagram'] = $profil['instagram'];
            $arr['facebook'] = $profil['facebook'];
            $arr['foto_usaha_1'] = $profil['foto_usaha_1'];
            $arr['foto_usaha_2'] = $profil['foto_usaha_2'];
            $arr['foto_usaha_3'] = $profil['foto_usaha_3'];
        }
        return $arr;
    }

    public function index()
    {
        if (empty($this->session->userdata('id_pegawai'))) {
            redirect('auth/loginPegawai', 'refresh');
        }
        $data['title'] = 'Daftar Riwayat Pemesanan';
        $data['invoice'] = $this->M_invoice->getAllinvoice();
        $data['keluhan'] = $this->M_invoice->getAllKeluhan();
        $data['teraphy'] = $this->M_invoice->getTeraphy();
        
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/invoice/V_invoice');
        $this->load->view('admin/layout/footer');
    }

    function getDataKeluhan()
    {
        $id_invoice   = $this->input->post('id_invoice');
        $data_keluhan = $this->M_invoice->getkeluhan_id($id_invoice);

        // print_r($id_invoice); exit();
        if (count($data_keluhan) > 0) {
            $result = array(
                'status'  => true,
                'vstatus' => 'berhasil',
                'pesan'   => "Berhasil Memuat data!",
                'data'    => $data_keluhan,
            );
        } else {
            $result = array(
                'status'  => false,
                'vstatus' => 'gagal',
                'pesan'   => "Data detail tidak ditemukan!!!",
            );
        }

        echo json_encode($result);
    }

    function getDataTeraphy()
    {
        $id_invoice   = $this->input->post('id_invoice');
        $data_teraphy = $this->M_invoice->getTeraphy_id($id_invoice);

        // print_r($id_invoice); exit();
        if (count($data_teraphy) > 0) {
            $result = array(
                'status'  => true,
                'vstatus' => 'berhasil',
                'pesan'   => "Berhasil Memuat data!",
                'data'    => $data_teraphy,
            );
        } else {
            $result = array(
                'status'  => false,
                'vstatus' => 'gagal',
                'pesan'   => "Data detail tidak ditemukan!!!",
            );
        }

        echo json_encode($result);
    }

    public function proses($id)
    {
        $data['title']   = 'Proses Invoice';
        $data['invoice'] = $this->M_invoice->getInvoiceByID($id);
        $data['keluhan'] = $this->M_invoice->getAllKeluhan();
        $data['teraphy'] = $this->M_invoice->getTeraphy();
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/invoice/V_detail_invoice');
        $this->load->view('admin/layout/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Detail & Konfirmasi';
        $data['invoice'] = $this->M_invoice->getinvoiceById($id);
        $data['keluhan'] = $this->M_invoice->getAllKeluhan();
        $data['teraphy'] = $this->M_invoice->getTeraphy();
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/invoice/detail');
        $this->load->view('admin/layout/footer');
    }

    public function transaksi_selesai($id)
    {
        $id_invoice      = $this->input->post('id_invoice');
        $id_pasien       = $this->input->post('id_pasien');
        $nama_pasien     = $this->input->post('nama_pasien');
        $umur            = $this->input->post('umur');
        $alamat          = $this->input->post('alamat');
        $no_hp           = $this->input->post('no_hp');
        $nik             = $this->input->post('nik');
        $tanggal_teraphy = $this->input->post('tanggal_teraphy');
        $jam_teraphy     = $this->input->post('jam_teraphy');
        $keluhan         = $this->input->post('keluhan');
        $diagnosa        = $this->input->post('diagnosa');
        $intervensi      = $this->input->post('intervensi');
        $terapi_ke       = $this->input->post('terapi_ke');

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
            // "id_pasien"        => $id_pasien,
            // "nama_pasien"      => $nama_pasien,
            // "umur"             => $umur,
            // "alamat"           => $alamat,
            // "nik"              => $nik,
            // "tanggal_teraphy"  => $tanggal_teraphy,
            // "jam_teraphy"      => $jam_teraphy,
            // "keluhan"          => $keluhan,
            // "diagnosa"         => $diagnosa,
            // "intervensi"       => $intervensi,
            // "terapi_ke"        => $terapi_ke,
            "status_transaksi" => 1,
        ];

        $this->M_invoice->komplit($data, $id);

        $this->session->set_flashdata('meesage_komplit', '<div class="alert alert-success" role="alert">Data Berhasil Dikomplit</div>');
        // echo "<script>alert('Data berhasil dikomplit !');</script>";
        redirect('C_invoice');
    }

    public function prosesEdit()
    {
        $this->form_validation->set_rules('nama_pasien', 'nama_pasien', 'required');
        $this->form_validation->set_rules('umur', 'umur', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'no_hp', 'required');
        $this->form_validation->set_rules('nik', 'nik', 'required|numeric');
        $this->form_validation->set_rules('tanggal_teraphy', 'tanggal_teraphy', 'required');
        $this->form_validation->set_rules('jam_teraphy', 'jam_teraphy', 'required');
        $this->form_validation->set_rules('keluhan', 'keluhan');
        $this->form_validation->set_rules('diagnosa', 'diagnosa');
        $this->form_validation->set_rules('intervensi', 'intervensi');
        $this->form_validation->set_rules('harga_teraphy', 'harga_teraphy', 'numeric');
        $this->form_validation->set_rules('terapi_ke', 'terapi_ke', 'numeric');
        $this->form_validation->set_rules('total_harga', 'total_harga', 'numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_edit_invoice', '<div class="alert alert-danger" role="alert">
            Gagal Mengedit Pasien
           </div>');
            redirect('C_invoice');
        } else {
            $this->M_invoice->edit();
            $this->session->set_flashdata('message_edit_invoice', '<div class="alert alert-success" role="alert">Sukses Mengedit Pasien</div>');
            // echo "<script>alert('Data berhasil diedit !');</script>";
            redirect('C_invoice');
        }
    }

    public function delete($id)
    {
        if (empty($this->session->userdata('id_pegawai'))) {
            redirect('auth/loginPegawai', 'refresh');
        }
        if ($this->session->userdata('jabatan') != "admin") {
            redirect('invoice');
        } else {
            $this->M_invoice->delete($id);
            $this->session->set_flashdata('message_invoice', '<div class="alert alert-success" role="alert">
            Sukses Menghapus Data Pemesanan
            </div>');
            redirect('invoice');
        }
    }

    public function uploadGambar()
    {
        $profil = $this->getProfilUsaha();
        $this->M_invoice->uploadBuktiBayar();
        $data['nama_usaha'] = $profil['nama_usaha'];
        $data['alamat'] = $profil['alamat'];
        $data['nomor_telepon'] = $profil['nomor_telepon'];
        $data['instagram'] = $profil['instagram'];
        $data['facebook'] = $profil['facebook'];
        $this->session->set_flashdata('message_invoice', '<div class="alert alert-success" role="alert">
            Sukses Mengupload bukti invoice.
            </div>');
        $this->load->view('home/layout/header', $data);
        $this->load->view('home/cekbayar', $data);
        $this->load->view('home/layout/footer');
    }
}
