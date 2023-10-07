<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_pasien extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('id_pegawai'))) {
            redirect('auth/loginPegawai', 'refresh');
        }
        $this->load->model('M_pasien');
        $this->model = $this->{'M_pasien'};
    }

    public function index()
    {
        $data['title'] = 'Dashboard Pegawai';
        $data['pasien'] = $this->model->GetAllpasien();
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/pasien/V_pasien');
        $this->load->view('admin/layout/footer');
    }

    public function getkeluhan(){
        $list_keluhan = $this->model->getkeluhan();

        if(!empty($list_keluhan)){
            $hasil =  array(
                'status'  => 0,
                'vstatus' => 'berhasil',
                'pesan'   => 'berhasil',
                'data'    => $list_keluhan,
            );
        }else {
            $hasil = array(
                'status'  => 1,
                'vstatus' => 'gagal',
                'pesan'   => 'Tidak ada data',
            );
        }

        echo json_encode ($list_keluhan);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama_pasien', 'nama_pasien', 'required');
        $this->form_validation->set_rules('umur', 'umur', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'no_hp', 'numeric');
        $this->form_validation->set_rules('nik', 'nik', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_pasien', '<div class="alert alert-danger" role="alert">Data Gagal Ditambahkan</div>');
            redirect('C_pasien');
        } else {
            $this->model->tambah();
            $this->session->set_flashdata('message_pasien', '<div class="alert alert-success" role="alert">
           Sukses Menambah Data Pasien
          </div>');
            redirect('C_pasien');
        }
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Pengumuman';
        $data['pasien'] = $this->model->getpasienById($id);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/pasien/detail');
        $this->load->view('admin/layout/footer');
    }

    public function proses($id)
    {
        $data['title']   = 'Proses Pasien';
        $data['pasien']  = $this->model->getpasienById($id);
        $data['invoice'] = $this->model->getInvoiceByID($id);
        $data['keluhan'] = $this->model->getkeluhan();
        $data['teraphy'] = $this->model->get_teraphy();
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/pasien/V_proses_pasien');
        $this->load->view('admin/layout/footer');
    }

    public function proses_tambah_invoice()
    {
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
        $harga_teraphy   = $this->input->post('harga_teraphy');
        $terapi_ke       = $this->input->post('terapi_ke');
        $total_harga     = $this->input->post('total_harga');

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

        $data = array(
            'id_pasien'        => $id_pasien,
            'nama_pasien'      => $nama_pasien,
            'umur'             => $umur,
            'alamat'           => $alamat,
            'no_hp'            => $no_hp,
            'nik'              => $nik,
            'tanggal_teraphy'  => $tanggal_teraphy,
            'jam_teraphy'      => $jam_teraphy,
            'keluhan'          => $keluhan_arr,
            'diagnosa'         => $diagnosa,
            'intervensi'       => $teraphy_arr,
            'harga_teraphy'    => $harga_teraphy,
            'terapi_ke'        => $terapi_ke,
            'status_transaksi' => 0,
            'total_harga'      => $total_harga,
        );

        // echo "<pre>";
        // print_r ($data);
        // echo "</pre>";exit();
        
        $cekhead = $this->model->cek_invoice($id_pasien, $nama_pasien, $nik, $tanggal_teraphy, $jam_teraphy);

        if($cekhead->num_rows() > 0 ){
            $this->session->set_flashdata('message_tambah_invoice', '<div class="alert alert-danger" role="alert">Data Tanggal ='. $tanggal_teraphy .', Pasien = '.$nama_pasien.' , NIK = '.$nik.' Sudah Pernah disimpan sebelumnya</div>');
            redirect('C_pasien');
        } else 
            $this->model->proses_invoice($data);
            $this->session->set_flashdata('message_tambah_invoice', '<div class="alert alert-success" role="alert">Sukses Menambah Data Invoice</div>');
            echo "<script>alert('Data berhasil disimpan !');</script>";
            redirect('C_invoice');
        
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Data';
        $data['pasien'] = $this->model->getpasienById($id);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/pasien/V_edit_pasien');
        $this->load->view('admin/layout/footer');
    }

    public function prosesEdit()
    {
        $this->form_validation->set_rules('nama_pasien', 'nama_pasien', 'required');
        $this->form_validation->set_rules('umur', 'umur', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'no_hp', 'required');
        $this->form_validation->set_rules('nik', 'nik', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_pasien', '<div class="alert alert-danger" role="alert">
            Gagal Mengedit Pasien
           </div>');
            redirect('C_pasien');
        } else {
            $this->model->edit();
            $this->session->set_flashdata('message_pasien', '<div class="alert alert-success" role="alert">Sukses Mengedit Pasien</div>');
            redirect('C_pasien');
        }
    }

    public function delete($id)
    {
        $this->model->delete($id);
        $this->session->set_flashdata('message_pasien', '<div class="alert alert-success" role="alert">
           Sukses Menghapus Pasien.
          </div>');
        redirect('C_pasien');
    }

}
