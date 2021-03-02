<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_admin', 'M_kelas', 'M_siswa']);
    }
    public function index()
    {
        cek_login();
        $data = [
            'title' => 'Siswa',
            'role' => $this->M_admin->get_role($this->session->userdata('id_role')),
            'kelas' => $this->M_kelas->get_kelas()
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('siswa/index');
        $this->load->view('layout/footer');
        $this->load->view('siswa/js');
    }
    public function tambah()
    {
        cek_login();
        $data = [
            'title' => 'Siswa',
            'role' => $this->M_admin->get_role($this->session->userdata('id_role')),
            'kelas' => $this->M_kelas->get_kelas()
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('siswa/form');
        $this->load->view('layout/footer');
        $this->load->view('siswa/js');
    }
    public function edit()
    {
        cek_login();
        $id = $this->uri->segment(3);
        $data = [
            'title' => 'Siswa',
            'role' => $this->M_admin->get_role($this->session->userdata('id_role')),
            'sw' => $this->M_siswa->get_siswa($id)->row(),
            'kelas' => $this->M_kelas->get_kelas()
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('siswa/update');
        $this->load->view('layout/footer');
        $this->load->view('siswa/js');
    }
    public function get_dtkelas()
    {
        $kelas = $this->input->post('kelas');
        $data = $this->M_siswa->get_data_kelas($kelas)->result();
        echo json_encode($data);
    }
    public function simpan()
    {
        cek_login();
        $id = htmlspecialchars($this->input->post('id_siswa', true));
        if ($id !== "") {
            $post = $this->input->post(null, true);
            $data = [
                'nis' => htmlspecialchars($post['nis']),
                'nama' => htmlspecialchars($post['nama']),
                'jk' => htmlspecialchars($post['jenkel']),
                'kelas' => htmlspecialchars($post['kelas']),
                'id_role' => 2
            ];
            $update = $this->M_siswa->update_data($id, $data);
            if ($update > 0) {
                $this->session->set_flashdata('pesan', 'Berhasil memperbarui data');
            } else {
                $this->session->set_flashdata('pesan', 'Gagal memperbarui data');
            }
            redirect('/Siswa');
        } else {
            $post = $this->input->post(null, true);
            $data = [
                'id_siswa' => uniqid(),
                'nis' => htmlspecialchars($post['nis']),
                'nama' => htmlspecialchars($post['nama']),
                'jk' => htmlspecialchars($post['jenkel']),
                'kelas' => htmlspecialchars($post['kelas']),
                'id_role' => 2
            ];
            $insert = $this->M_siswa->insert_data($data);
            if ($insert > 0) {
                $this->session->set_flashdata('pesan', 'Berhasil menyimpan data');
            } else {
                $this->session->set_flashdata('pesan', 'Gagal menyimpan data');
            }
            redirect('/Siswa');
        }
    }
    public function hapus()
    {
        cek_login();
        $id = htmlspecialchars($this->input->post('id'));
        $delete = $this->M_siswa->delete_data($id);
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
