<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('user')) {
            redirect('auth');
        }
        $this->load->model('Form_pengajuan_model');
    }

    public function index()
    {
        $data['nama'] = $this->session->userdata('user')['nama'];
        $data['id_user'] = $this->session->userdata('user')['id_user'];
        $this->load->view('member/header_member', $data);
        $this->load->view('member/panduan', $data);
        $this->load->view('member/footer_member');
    }

    public function status()
    {
        $data['nama'] = $this->session->userdata('user')['nama'];
        $data['id_user'] = $this->session->userdata('user')['id_user'];
        $this->load->view('member/header_member', $data);
        $this->load->view('member/cek_ajuan', $data);
        $this->load->view('member/footer_member');
    }

    public function formulir()
    {
        $data['nama'] = $this->session->userdata('user')['nama'];
        $data['id_user'] = $this->session->userdata('user')['id_user'];
        $this->load->view('member/header_member', $data);
        $this->load->view('member/form_ajuan', $data);
        $this->load->view('member/footer_member');
    }
    public function ajukan()
    {
        $data = [
            'id_user' => $this->input->post('id_user'),
            'id_status' => $this->input->post('id_status'),
            'izin_dibuat' => $this->input->post('izin_dibuat'),
            'no_reg' => $this->input->post('no_reg'),
            'nama' => $this->input->post('nama'),
            'nik' => $this->input->post('nik'),
            'alamat' => $this->input->post('alamat'),
            'luas' => $this->input->post('luas'),
            'jenis_jualan' => $this->input->post('jenis_jualan'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kelurahan' => $this->input->post('kelurahan'),
            'jalan' => $this->input->post('jalan'),
        ];
        $this->Form_pengajuan_model->tambah_data($data);
        redirect('member');
    }

    public function cetak()
    {
        $data['nama'] = $this->session->userdata('user')['nama'];
        $data['id_user'] = $this->session->userdata('user')['id_user'];
        $this->load->view('member/header_member', $data);
        $this->load->view('member/cetak_izin', $data);
        $this->load->view('member/footer_member');
    }
}
