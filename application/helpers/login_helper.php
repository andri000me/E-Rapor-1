<?php

function cek_login()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('/Login');
    } else {
        $user_id = $ci->session->userdata('id_role');
        // ambil nama controller
        $menu = $ci->uri->segment(1);
        // validasi dengan tb di database
        $role = $ci->db->get_where('tb_menu', ['title' => $menu])->row();
        // ambil id menu
        $user_role = $role->menu_id;
        // bandingkan dengan role dalam tb role
        $user_akses = $ci->db->get_where('tb_role', ['role_id' => $user_id, 'menu_id' => $user_role])->num_rows();

        if ($user_akses < 1) {
            redirect('/Login/blocked');
        }
    }
}
function sudah_login()
{
    $ci = get_instance();
    if ($ci->session->userdata('email')) {
        if ($ci->session->userdata('id_role') == 1) {
            redirect('/Dashboard');
        } else if ($ci->session->userdata('id_role') == 2) {
            redirect('/Siswa');
        } else if ($ci->session->userdata('id_role') == 3) {
            redirect('/Mapel');
        } else {
            redirect('/Login');
        }
    }
}
