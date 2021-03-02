<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_guru extends CI_Model
{
    private $tb_guru = 'tb_guru';
    private $tb_mapel = 'tb_mapel';
    private $tb_jadwal = 'tb_jadwal';
    private $tb_kelas = 'tb_kelas';
    private $tb_rekap = 'tb_rekap';
    // ambil data json guru
    public function get_all()
    {
        $this->datatables->select('tb_guru.id_guru,nip,nama,jk,tb_mapel.nama_mapel');
        $this->datatables->from($this->tb_guru);
        $this->datatables->join('tb_mapel', 'tb_mapel.id_mapel = tb_guru.mapel', 'left');
        $this->datatables->add_column('option', '<a href="' . site_url('/Guru/edit/$1') . '" class="btn btn-warning btn-flat"><i class="fa fa-edit"></i> Edit</a>', 'id_guru');
        return $this->datatables->generate();
    }
    // baca data mapel
    public function get_all_mapel()
    {
        $this->datatables->select('id_mapel,nama_mapel,kkm_mapel');
        $this->datatables->from($this->tb_mapel);
        $this->datatables->add_column('option', '<button class="btn btn-flat btn-edit btn-warning btn-sm" data-id_mapel="$1" data-nama="$2" data-kkm="$3"><i class="fa fa-edit"></i> Edit</button> <button class="btn btn-flat btn-danger btn-hapus btn-sm" data-id="$1"><i class="fa fa-trash"></i> Hapus</button>', 'id_mapel,nama_mapel,kkm_mapel');
        return $this->datatables->generate();
    }
    // tambah data mapel
    public function mapel_insert($data)
    {
        $this->db->insert($this->tb_mapel, $data);
        return $this->db->affected_rows();
    }
    // perbarui data mapel
    public function mapel_update($id, $data)
    {
        $this->db->where('id_mapel', $id);
        $this->db->update($this->tb_mapel, $data);
        return $this->db->affected_rows();
    }
    // hapus data mapel
    public function mapel_delete($id)
    {
        $this->db->where('id_mapel', $id);
        $this->db->delete($this->tb_mapel);
        return $this->db->affected_rows();
    }

    // baca data
    public function get_data($id)
    {
        if ($id !== null) {
            return $this->db->get_where($this->tb_guru, ['id_guru' => $id])->row();
        }
        return $this->db->get($this->tb_guru)->result();
    }
    // simpan data
    public function insert_data($data)
    {
        $this->db->insert($this->tb_guru, $data);
        return $this->db->affected_rows();
    }
    // update data
    public function update_data($id, $data)
    {
        $this->db->where('id_guru', $id);
        $this->db->update($this->tb_guru, $data);
        return $this->db->affected_rows();
    }
    // hapus data
    public function delete_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->tb_guru);
        return $this->db->affected_rows();
    }
    // baca data mapel
    public function get_mapel($id = null)
    {
        if ($id !== null) {
            return $this->db->get_where($this->tb_mapel, ['id_mapel' => $id])->row();
        } else {
            return $this->db->get($this->tb_mapel)->result();
        }
    }
    // baca data mapel guru
    public function get_data_akun($email)
    {
        $this->db->select('tb_guru.*,tb_mapel.nama_mapel,tb_mapel.id_mapel,tb_jadwal.id_kelas,tb_kelas.nm_kelas');
        $this->db->from($this->tb_guru);
        $this->db->where('email', $email);
        $this->db->join($this->tb_mapel, $this->tb_mapel . '.id_mapel = ' . $this->tb_guru . '.mapel');
        $this->db->join($this->tb_jadwal, $this->tb_jadwal . '.id_guru = ' . $this->tb_guru . '.id_guru');
        $this->db->join($this->tb_kelas, $this->tb_kelas . '.id_kelas = ' . $this->tb_jadwal . '.id_kelas');
        return $this->db->get();
    }
    // baca data jadwal guru sesuai id_guru
    public function get_jadwal_guru($id_guru)
    {
        $this->db->select('id,tb_jadwal.id_kelas,id_guru,id_mapel,hari,jam,tb_kelas.nm_kelas');
        $this->db->from($this->tb_jadwal);
        $this->db->join($this->tb_kelas, 'tb_kelas.id_kelas = tb_jadwal.id_kelas');
        $this->db->where('id_guru', $id_guru);
        return $this->db->get();
    }
    public function insert_jadwal($data)
    {
        $this->db->insert($this->tb_jadwal, $data);
        return $this->db->affected_rows();
    }
    public function delete_jadwal($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->tb_jadwal);
        return $this->db->affected_rows();
    }
    public function get_nilai($kelas)
    {
        $this->db->select('id_rekap,jenis_nilai,semester,tb_mapel.id_mapel,tb_siswa.nama,nilai');
        $this->db->from('tb_rekap');
        $this->db->where('id_kelas', $kelas);
        $this->db->join('tb_mapel', 'tb_mapel.id_mapel = tb_rekap.id_mapel');
        $this->db->join('tb_siswa', 'tb_siswa.id_siswa = tb_rekap.id_siswa');
        $this->db->group_by('jenis_nilai');
        $this->db->order_by('tb_siswa.nama', 'ASC');
        return $this->db->get();
    }
    public function insert_nilai($data)
    {
        $this->db->insert($this->tb_rekap, $data);
        return $this->db->affected_rows();
    }
    // hapus data nilai
    public function nilai_delete($id)
    {
        $this->db->where('id_rekap', $id);
        $this->db->delete($this->tb_rekap);
        return $this->db->affected_rows();
    }
}
