<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
            'title' => 'Dashboard',
            'role' => $this->M_admin->get_role($this->session->userdata('id_role'))
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('dashboard/index');
        $this->load->view('layout/footer');
        $this->load->view('dashboard/js');
    }
}
