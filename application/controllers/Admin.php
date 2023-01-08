<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('user')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['nama'] = $this->session->userdata('user')['nama'];
        $data['pkl'] = $this->db->count_all('pkl');
        $data['form'] = $this->db->count_all('form_pengajuan');
        $this->db->where('id_role', 1);
        $data['jumlah_admin'] = $this->db->count_all_results('user');
        $this->load->view('admin/header_admin', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/footer_admin', $data);
    }

    public function ajuan()
    {
        $data['nama'] = $this->session->userdata('user')['nama'];
        $this->load->view('admin/header_admin', $data);
        $this->load->view('admin/tampilkan_ajuan', $data);
        $this->load->view('admin/footer_admin', $data);
    }

    public function disetujui()
    {
        $data['nama'] = $this->session->userdata('user')['nama'];
        $this->load->view('admin/header_admin', $data);
        $this->load->view('admin/ajuan_disetujui', $data);
        $this->load->view('admin/footer_admin', $data);
    }

    public function setujui($id)
    {
        // update data form_pengajuan dengan id_status = 2
        $this->db->set('id_status', 2);
        $this->db->where('id_form', $id);
        $this->db->update('form_pengajuan');

        // ambil data form_pengajuan yang diupdate
        $form_pengajuan = $this->db->get_where('form_pengajuan', ['id_form' => $id])->row_array();

        // insert data ke tabel data_pkl
        $data = [
            'nama' => $form_pengajuan['nama'],
            'nik' => $form_pengajuan['nik'],
            'alamat' => $form_pengajuan['alamat'],
            'luas' => $form_pengajuan['luas'],
            'jenis_jualan' => $form_pengajuan['jenis_jualan'],
            'kecamatan' => $form_pengajuan['kecamatan'],
            'kelurahan' => $form_pengajuan['kelurahan'],
            'jalan' => $form_pengajuan['jalan'],
            'id_form' => $form_pengajuan['id_form'],
        ];
        $this->db->insert('data_pkl', $data);

        // ambil data terakhir yang diinsert ke tabel data_pkl
        $pkl = $this->db->order_by('id_pkl', 'DESC')->limit(1)->get('data_pkl')->row_array();

        // insert data ke tabel masa_izin
        $masa_izin = [
            'berlaku' => date("Y-m-d"),
            'berakhir' => date("Y-m-d", strtotime("+2 years")),
            'id_form' => $pkl['id_form'],
            'id_pkl' => $pkl['id_pkl'],
        ];
        $this->db->insert('masa_izin', $masa_izin);

        //$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disetujui</div>');
        redirect('admin/disetujui');
    }

    public function batal_setuju($id)
    {
        $this->db->delete('masa_izin', ['id_form' => $id]);
        $this->db->delete('data_pkl', ['id_form' => $id]);
        // update data form_pengajuan dengan id_status = 1
        $this->db->set('id_status', 1);
        $this->db->where('id_form', $id);
        $this->db->update('form_pengajuan');
        redirect('admin/ajuan');
    }

    public function pkl($kec)
    {
        $data['nama'] = $this->session->userdata('user')['nama'];
        $data['kec'] = str_replace("%20", " ", $kec);
        $this->load->view('admin/header_admin', $data);
        $this->load->view('admin/pkl_kec', $data);
        $this->load->view('admin/footer_admin', $data);
    }
}
