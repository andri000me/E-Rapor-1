<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_siswa extends CI_Model
{
    private $tb_siswa = 'tb_siswa';
    // baca siswa berdasarkan id
    public function get_siswa($id_siswa)
    {
        return $this->db->get_where($this->tb_siswa, ['id_siswa' => $id_siswa]);
    }
    // simpan data
    public function insert_data($data)
    {
        $this->db->insert($this->tb_siswa, $data);
        return $this->db->affected_rows();
    }
    // update data
    public function update_data($id, $data)
    {
        $this->db->where('id_siswa', $id);
        $this->db->update($this->tb_siswa, $data);
        return $this->db->affected_rows();
    }
    // hapus data
    public function delete_data($id)
    {
        $this->db->where('id_siswa', $id);
        $this->db->delete($this->tb_siswa);
        return $this->db->affected_rows();
    }
    // baca data siswa berdasarkan kelas
    public function get_data_kelas($kelas)
    {
        $this->db->select('tb_siswa.id_siswa,tb_siswa.nis,tb_siswa.nama,tb_siswa.jk,tb_kelas.nm_kelas');
        $this->db->from($this->tb_siswa);
        $this->db->where('kelas', $kelas);
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_siswa.kelas');
        $this->db->order_by('nama', 'asc');
        return $this->db->get();
    }
    public function get_rapot_siswa($id)
    {
        $this->db->select('tb_rekap.id_rekap,count(nilai) as nilai,semester,sum(nilai) as jumlah,tb_mapel.nama_mapel,tb_mapel.kkm_mapel');
        $this->db->from('tb_rekap');
        $this->db->where('id_siswa', $id);
        $this->db->join('tb_mapel', 'tb_mapel.id_mapel = tb_rekap.id_mapel');
        return $this->db->get();
    }
    public function get_data_siswa($email)
    {
        return $this->db->get_where('tb_siswa', ['email' => $email])->row();
    }
}
