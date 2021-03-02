<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    private $tb_admin = 'tb_admin';
    private $tb_role = 'tb_role';
    private $tb_menu = 'tb_menu';

    public function valid_email($email)
    {
        return $this->db->get_where($this->tb_admin, ['email' => $email]);
    }
    public function get_role($role_id)
    {
        $this->db->select('tb_menu.menu_id,tb_menu.title,tb_menu.icon,tb_menu.url,tb_menu.is_active');
        $this->db->from($this->tb_menu);
        $this->db->join($this->tb_role, $this->tb_role . '.menu_id = ' . $this->tb_menu . '.menu_id');
        $this->db->where('tb_role.role_id', $role_id);
        $this->db->order_by('tb_menu.menu_id', 'ASC');
        return $this->db->get();
    }
    public function get_menu()
    {
        return $this->db->get($this->tb_menu);
    }
    public function insert_menu($data)
    {
        $this->db->insert($this->tb_menu, $data);
        return $this->db->affected_rows();
    }
}
