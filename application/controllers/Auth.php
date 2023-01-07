<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
    }

    public function index()
    {
        $this->load->view('halaman_awal/header');
        $this->load->view('auth/login');
        $this->load->view('halaman_awal/footer');
    }

    public function login()
    {
        $data['title'] = 'Login';

        if ($this->input->post()) {
            // proses login disini
            $nama = $this->input->post('nama');
            $password = $this->input->post('password');
            $user = $this->Users_model->get_user_by_nama_and_password($nama, $password);
            $role = $this->Users_model->get_role_id_by_name_and_password($nama, $password);
            //$id = $this->Users_model->get_id_user_by_name_and_password($nama, $password);


            if ($user && $role == 1) {
                // login sukses, simpan data user ke session
                $this->session->set_userdata('user', $user);
                redirect('Admin');
            } elseif ($user && $role == 2) {
                // login sukses, simpan data user ke session
                $this->session->set_userdata('user', $user);
                redirect('Member');
            } else {
                // login gagal, tampilkan pesan error
                //$data['error'] = 'Email atau password salah';
                redirect('auth');
            }
        }
    }

    public function register()
    {
        $data['title'] = 'Register';

        if ($this->input->post()) {
            // proses register disini
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user_data = array(
                'name' => $name,
                'email' => $email,
                'password' => $password
            );

            $result = $this->Users_model->insert_user($user_data);

            if ($result) {
                // register sukses, redirect ke halaman login
                redirect('auth/login');
            } else {
                // register gagal, tampilkan pesan error
                $data['error'] = 'Terjadi kesalahan saat mendaftar';
            }
        }

        $this->load->view('auth/register', $data);
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        redirect('auth');
    }
}
