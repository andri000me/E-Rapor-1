<?php
header('Access-Control-Allow-Origin: *');

defined('BASEPATH') or exit('No direct script access allowed');

class Jurnal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_admin', 'M_guru', 'M_kelas']);
        cek_login();
    }
    public function index()
    {
        $data = [
            'title' => 'Jurnal',
            'role' => $this->M_admin->get_role($this->session->userdata('id_role')),
            'guru' => $this->M_guru->get_data_akun($this->session->userdata('email'))->row(),
            'kelas' => $this->M_kelas->get_kelas()
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('jurnal/index');
        $this->load->view('layout/footer');
        $this->load->view('jurnal/js');
    }
    public function get_jadwal()
    {
        $data = $this->M_guru->get_jadwal_guru($this->input->post('id_guru', true))->result();
        echo json_encode($data);
    }
    public function simpan()
    {
        $post = $this->input->post(null, true);
        $data = [
            'id_guru' => $post['id_guru'],
            'id_mapel' => $post['id_mapel'],
            'hari' => $post['hari'],
            'id_kelas' => $post['kelas'],
            'jam' => $post['jam']
        ];
        $this->M_guru->insert_jadwal($data);
        echo json_encode($data);
    }
    public function hapus()
    {
        $post = $this->input->post('id', true);
        $this->M_guru->delete_jadwal($post);
        echo json_encode($post);
    }
}
