<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('datatables');
        $this->load->model(['M_admin', 'M_kelas', 'M_guru']);
        cek_login();
    }
    public function index()
    {
        $data = [
            'title' => 'Guru',
            'role' => $this->M_admin->get_role($this->session->userdata('id_role')),
            'kelas' => $this->M_kelas->get_kelas()
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('guru/index');
        $this->load->view('layout/footer');
        $this->load->view('guru/js');
    }
    public function tambah()
    {
        $data = [
            'title' => 'Guru',
            'role' => $this->M_admin->get_role($this->session->userdata('id_role')),
            'kelas' => $this->M_kelas->get_kelas()
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('guru/form');
        $this->load->view('layout/footer');
        $this->load->view('guru/js');
    }
    public function edit()
    {
        $id = $this->uri->segment(3);
        $data = [
            'title' => 'Guru',
            'role' => $this->M_admin->get_role($this->session->userdata('id_role')),
            'mapel' => $this->M_guru->get_mapel(),
            'sw' => $this->M_guru->get_data($id),
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('guru/update');
        $this->load->view('layout/footer');
        $this->load->view('guru/js');
    }
    public function get_data()
    {
        header('Content-Type:application/json');
        echo $this->M_guru->get_all();
    }
    public function simpan()
    {
        $id = htmlspecialchars($this->input->post('id_guru', true));
        if ($id !== "") {
            $post = $this->input->post(null, true);
            $data = [
                'nip' => htmlspecialchars($post['nis']),
                'nama' => htmlspecialchars($post['nama']),
                'jk' => htmlspecialchars($post['jenkel']),
                'id_jadwal' => 0,
                'mapel' => htmlspecialchars($post['mapel']),
                'id_role' => 3
            ];
            $update = $this->M_guru->update_data($id, $data);
            if ($update > 0) {
                $this->session->set_flashdata('pesan', 'Berhasil memperbarui data');
            } else {
                $this->session->set_flashdata('pesan', 'Gagal memperbarui data');
            }
            redirect('/Guru');
        } else {
            $post = $this->input->post(null, true);
            $data = [
                'id_guru' => uniqid(),
                'nip' => htmlspecialchars($post['nis']),
                'nama' => htmlspecialchars($post['nama']),
                'jk' => htmlspecialchars($post['jenkel']),
                'id_jadwal' => 0,
                'mapel' => 0,
                'id_role' => 3
            ];
            $insert = $this->M_guru->insert_data($data);
            if ($insert > 0) {
                $this->session->set_flashdata('pesan', 'Berhasil menyimpan data');
            } else {
                $this->session->set_flashdata('pesan', 'Gagal menyimpan data');
            }
            redirect('/Guru');
        }
    }
    public function hapus()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $delete = $this->M_guru->delete_data($id);
        if ($delete > 0) {
            $message = [
                'status' => true,
                'message' => 'Data berhasil di hapus'
            ];
        } else {
            $message = [
                'status' => true,
                'message' => 'Data gagal di hapus'
            ];
        }
        echo json_encode($message);
    }
}
