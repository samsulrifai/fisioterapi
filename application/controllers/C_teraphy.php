<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_teraphy extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('id_pegawai'))) {
            redirect('auth/loginPegawai', 'refresh');
        }
        $this->load->model('M_teraphy');
        $this->model = $this->{'M_teraphy'};
    }

    public function index()
    {
        $data['title'] = 'Dashboard Pegawai';
        $data['teraphy'] = $this->model->GetAllTeraphy();
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/teraphy/V_teraphy');
        $this->load->view('admin/layout/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama_teraphy', 'nama_teraphy', 'required');
        $this->form_validation->set_rules('kode', 'kode', 'required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_teraphy', '<div class="alert alert-danger" role="alert">Data Gagal Ditambahkan</div>');
            redirect('C_teraphy');
        } else {
            $this->model->tambah();
            $this->session->set_flashdata('message_teraphy', '<div class="alert alert-success" role="alert">
           Sukses Menambah Data Teraphy
          </div>');
            redirect('C_teraphy');
        }
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Pengumuman';
        $data['teraphy'] = $this->model->getTeraphyById($id);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/teraphy/detail');
        $this->load->view('admin/layout/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Teraphy';
        $data['teraphy'] = $this->model->getTeraphyById($id);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/teraphy/edit');
        $this->load->view('admin/layout/footer');
    }

    public function prosesEdit()
    {
        $this->form_validation->set_rules('nama_teraphy', 'nama_teraphy', 'required');
        $this->form_validation->set_rules('kode', 'kode', 'required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_teraphy', '<div class="alert alert-danger" role="alert">
            Gagal Mengedit Teraphy
           </div>');
            redirect('C_teraphy');
        } else {
            $this->model->edit();
            $this->session->set_flashdata('message_teraphy', '<div class="alert alert-success" role="alert">
           Sukses Mengedit Teraphy
          </div>');
            redirect('C_teraphy');
        }
    }

    public function delete($id)
    {
        $this->model->delete($id);
        $this->session->set_flashdata('message_teraphy', '<div class="alert alert-success" role="alert">
           Sukses Menghapus Teraphy.
          </div>');
        redirect('C_teraphy');
    }

}
