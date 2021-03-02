<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kelas extends CI_Model
{
    private $tb_kelas = 'tb_kelas';

    public function get_kelas($id_kelas = null)
    {
        if ($id_kelas == null) {
            return $this->db->get($this->tb_kelas)->result();
        } else {
            return $this->db->get_where($this->tb_kelas, ['id_kelas' => $id_kelas])->row();
        }
    }
    public function get_all()
    {
        $this->datatables->select('id_kelas,nm_kelas');
        $this->datatables->from($this->tb_kelas);
        $this->datatables->add_column('option', '<button class="btn btn-flat btn-edit btn-warning btn-sm" data-id_kelas="$1" data-nama_kelas="$2"><i class="fa fa-edit"></i> Edit</button> <button class="btn btn-flat btn-danger btn-hapus btn-sm" data-id="$1"><i class="fa fa-trash"></i> Hapus</button>', 'id_kelas,nm_kelas');
        return $this->datatables->generate();
    }
    public function kelas_insert($data)
    {
        $this->db->insert($this->tb_kelas, $data);
        return $this->db->affected_rows();
    }
    public function kelas_update($id, $data)
    {
        $this->db->where('id_kelas', $id);
        $this->db->update($this->tb_kelas, $data);
        return $this->db->affected_rows();
    }
    public function kelas_delete($id)
    {
        $this->db->where('id_kelas', $id);
        $this->db->delete($this->tb_kelas);
        return $this->db->affected_rows();
    }
}
