<?php
header('Access-Control-Allow-Origin: *');

defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('datatables');
        $this->load->model(['M_admin', 'M_guru', 'M_kelas']);
        cek_login();
    }
    public function index()
    {
        $data = [
            'title' => 'Nilai',
            'role' => $this->M_admin->get_role($this->session->userdata('id_role')),
            'guru' => $this->M_guru->get_data_akun($this->session->userdata('email'))->row(),
            'kelas' => $this->M_kelas->get_kelas()
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('nilai/index');
        $this->load->view('layout/footer');
        $this->load->view('nilai/js');
    }
    public function get_kelas_guru()
    {
        $post = $this->input->post('id_guru', true);
        $data = $this->M_guru->get_jadwal_guru($post)->result();
        echo json_encode($data);
    }
    public function get_nilai_kelas()
    {
        $post = $this->input->post('kelas', true);
        $data = $this->M_guru->get_nilai($post)->result();
        echo json_encode($data);
    }
    public function simpan()
    {
        $post = $this->input->post(null, true);
        $data = [
            'jenis_nilai' => $post['jenis_nilai'],
            'semester' => $post['semester'],
            'id_mapel' => $post['id_mapel'],
            'id_guru' => $post['id_guru'],
            'id_siswa' => $post['id_siswa'],
            'id_kelas' => $post['id_kelas'],
            'nilai' => $post['nilai']
        ];
        $this->M_guru->insert_nilai($data);
        echo json_encode($post);
    }
    public function hapus()
    {
        $post = $this->input->post(null, true);
        $delete = $this->M_guru->nilai_delete($post['id_rekap']);
        if ($delete > 0) {
            $status  = [
                'message' => 'Data berhasil terhapus!!'
            ];
            echo json_encode($status);
        } else {
            $status  = [
                'message' => 'Data gagal terhapus!!'
            ];
            echo json_encode($status);
        }
    }
}
