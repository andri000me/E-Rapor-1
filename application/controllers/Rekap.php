<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Rekap extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('datatables');
        $this->load->model(['M_admin', 'M_kelas', 'M_guru']);
        cek_login();
    }
    public function index(){
        $data = [
            'title' => 'Rekap',
            'role' => $this->M_admin->get_role($this->session->userdata('id_role'))
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('rekap/index');
        $this->load->view('layout/footer');
        $this->load->view('rekap/js');
    }
}