<?php
header('Access-Control-Allow-Origin: *');

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
    }
    public function index()
    {
        sudah_login();
        $this->load->view('login/index');
    }
    public function auth()
    {
        // ambil nilai dari form login
        $post = $this->input->post(null, true);
        // ambil nilai dari database accoount
        $valid = $this->M_admin->valid_email($post['email'])->row_array();
        // validasi account email
        if ($valid['is_active'] == 1) {
            if ($valid['password'] == sha1($post['password'])) {

                $params = [
                    'id' => $valid['id'],
                    'nama' => $valid['nama'],
                    'email' => $valid['email'],
                    'id_role' => $valid['id_role']
                ];
                // untuk menyimpan session login
                $this->session->set_userdata($params);
                // untuk menampikan pesan sukses
                $this->session->set_flashdata('sukses', 'Selamat Datang ' . $valid['fullname']);
                if ($valid['id_role'] == 1) {
                    redirect('/Dashboard');
                } else if ($valid['id_role'] == 2) {
                    redirect('/Rapot');
                } else if ($valid['id_role'] == 3) {
                    redirect('/Jurnal');
                } else {
                    $this->session->set_flashdata('error', 'Maaf Anda Tidak Boleh Mengakses Halaman Ini');
                    redirect('/Login');
                }
            } else {
                $this->session->set_flashdata('error', 'Password Error');
                redirect('/Login');
            }
        } else {
            $this->session->set_flashdata('error', 'Email Tidak Terdaftar');
            redirect('/Login');
        }
    }
    public function blocked()
    {
        $data = [
            'title' => 'Page Error'
        ];
        $this->load->view('login/error_page', $data);
    }
    public function logout()
    {
        $param = ['id', 'nama', 'id_role', 'email'];
        $this->session->unset_userdata($param);
        redirect('/Login');
    }
}
