<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_keluhan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('id_pegawai'))) {
            redirect('auth/loginPegawai', 'refresh');
        }
        $this->load->model('M_keluhan');
        $this->model = $this->{'M_keluhan'};
    }

    public function index()
    {
        $data['title'] = 'Dashboard Pegawai';
        $data['keluhan'] = $this->model->GetAllkeluhan();
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/keluhan/V_keluhan');
        $this->load->view('admin/layout/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('keluhan', 'keluhan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_keluhan', '<div class="alert alert-danger" role="alert">Data Gagal Ditambahkan</div>');
            redirect('C_keluhan');
        } else {
            $this->model->tambah();
            $this->session->set_flashdata('message_keluhan', '<div class="alert alert-success" role="alert">
           Sukses Menambah Data Keluhan
          </div>');
            redirect('C_keluhan');
        }
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Pengumuman';
        $data['keluhan'] = $this->model->getkeluhanById($id);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/keluhan/detail');
        $this->load->view('admin/layout/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Data';
        $data['keluhan'] = $this->model->getkeluhanById($id);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/keluhan/V_edit_keluhan');
        $this->load->view('admin/layout/footer');
    }

    public function prosesEdit()
    {
        $this->form_validation->set_rules('keluhan', 'keluhan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_keluhan', '<div class="alert alert-danger" role="alert">
            Gagal Mengedit Keluhan
           </div>');
            redirect('C_keluhan');
        } else {
            $this->model->edit();
            $this->session->set_flashdata('message_keluhan', '<div class="alert alert-success" role="alert">
           Sukses Mengedit Keluhan
          </div>');
            redirect('C_keluhan');
        }
    }

    public function delete($id)
    {
        $this->model->delete($id);
        $this->session->set_flashdata('message_keluhan', '<div class="alert alert-success" role="alert">
           Sukses Menghapus Keluhan.
          </div>');
        redirect('C_keluhan');
    }

}
