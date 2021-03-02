<?php
header('Access-Control-Allow-Origin: *');

defined('BASEPATH') or exit('No direct script access allowed');

class Manajemen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        cek_login();
    }
    public function index()
    {
        $data = [
            'title' => 'Manajemen',
            'role' => $this->M_admin->get_role($this->session->userdata('id_role')),
            'menu' => $this->M_admin->get_menu()
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('manajemen/index');
        $this->load->view('layout/footer');
        $this->load->view('manajemen/js');
    }
    public function tambah_menu()
    {
        $post = $this->input->post(null, true);
        $data = [
            'menu_id' => $post['menu_id'],
            'title' => $post['title'],
            'icon' => $post['icon'],
            'url' => $post['url']
        ];
        $insert = $this->M_admin->insert_menu($data);
        redirect('/Manajemen');
    }
}
