<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Rapot extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_admin', 'M_siswa']);
        cek_login();
    }
    public function index()
    {
        $data = [
            'title' => 'Rapot',
            'role' => $this->M_admin->get_role($this->session->userdata('id_role')),
            'siswa' => $this->M_siswa->get_data_siswa($this->session->userdata('email'))
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('rapot/index');
        $this->load->view('layout/footer');
        $this->load->view('rapot/js');
    }
    public function get_rapot()
    {
        $id = $this->input->post('id_siswa', true);
        $data = $this->M_siswa->get_rapot_siswa($id);
        echo json_encode($data->result());
    }
}
