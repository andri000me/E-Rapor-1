<?php
header('Access-Control-Allow-Origin: *');

defined('BASEPATH') or exit('No direct script access allowed');

class Mapel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('datatables');
        $this->load->model(['M_admin', 'M_guru']);
        cek_login();
    }
    public function index()
    {
        $data = [
            'title' => 'Mapel',
            'role' => $this->M_admin->get_role($this->session->userdata('id_role'))
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('mapel/index');
        $this->load->view('layout/footer');
        $this->load->view('mapel/js');
    }
    public function get_mapel_json()
    {
        header('Content-Type:application/json');
        echo $this->M_guru->get_all_mapel();
    }
    public function simpan()
    {
        $post = $this->input->post(null, true);

        if ($post['id_mapel'] !== "") {
            $id = htmlspecialchars($post['id_mapel']);
            $data = [
                'nama_mapel' => htmlspecialchars($post['nama']),
                'kkm_mapel' => htmlspecialchars($post['kkm'])
            ];

            $update = $this->M_guru->mapel_update($id, $data);
            if ($update > 0) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-info"><small>Data Berhasil di Perbarui</small></div>');
                redirect('/Mapel');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-info"><small>Data Gagal di Perbarui</small></div>');
                redirect('/Mapel');
            }
        } else {
            $data = [
                'nama_mapel' => htmlspecialchars($post['nama']),
                'kkm_mapel' => htmlspecialchars($post['kkm'])
            ];

            $insert = $this->M_guru->mapel_insert($data);
            if ($insert > 0) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-info"><small>Data Berhasil diSimpan</small></div>');
                redirect('/Mapel');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-info"><small>Data Gagal diSimpan</small></div>');
                redirect('/Mapel');
            }
        }
    }
    public function hapus()
    {
        $post = $this->input->post(null, true);
        $delete = $this->M_guru->mapel_delete($post['id_mapel']);
        if ($delete > 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-info"><small>Data Berhasil diHapus</small></div>');
            redirect('/Mapel');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-info"><small>Data Gagal di Hapus</small></div>');
            redirect('/Mapel');
        }
    }
}
