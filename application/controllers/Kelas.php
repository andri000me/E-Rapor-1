<?php
header('Access-Control-Allow-Origin: *');

defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('datatables');
        $this->load->model(['M_admin', 'M_kelas']);
        cek_login();
    }
    public function index()
    {
        $data = [
            'title' => 'Kelas',
            'role' => $this->M_admin->get_role($this->session->userdata('id_role'))
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('kelas/index');
        $this->load->view('layout/footer');
        $this->load->view('kelas/js');
    }
    public function get_kelas_json()
    {
        header('Content-Type:application/json');
        echo $this->M_kelas->get_all();
    }
    public function simpan()
    {
        $post = $this->input->post(null, true);

        if ($post['id_kelas'] !== "") {
            $id = htmlspecialchars($post['id_kelas']);
            $data = [
                'nm_kelas' => htmlspecialchars($post['nama_kelas'])
            ];

            $update = $this->M_kelas->kelas_update($id, $data);
            if ($update > 0) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-info"><small>Data Berhasil di Perbarui</small></div>');
                redirect('/kelas');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-info"><small>Data Gagal di Perbarui</small></div>');
                redirect('/kelas');
            }
        } else {
            $data = [
                'nm_kelas' => htmlspecialchars($post['nm_kelas'])
            ];

            $insert = $this->M_kelas->kelas_insert($data);
            if ($insert > 0) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-info"><small>Data Berhasil diSimpan</small></div>');
                redirect('/kelas');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-info"><small>Data Gagal diSimpan</small></div>');
                redirect('/kelas');
            }
        }
    }
    public function hapus()
    {
        $post = $this->input->post(null, true);
        $delete = $this->M_kelas->kelas_delete($post['id_kelas']);
        if ($delete > 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-info"><small>Data Berhasil diHapus</small></div>');
            redirect('/kelas');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-info"><small>Data Gagal di Hapus</small></div>');
            redirect('/kelas');
        }
    }
}
