<?php

function is_logged()
{

    $CI = &get_instance();

    if (!isset($CI->session->userdata['username'])) {
        $CI->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Anda Belum Login
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('auth');
    }

    //     $role_id = $CI->session->userdata('role_id');

    //     $menu = $CI->uri->segment(1);

    //     $queryMenu = $CI->db->get_where('user_menu', ['menu' => $menu])->row_array();

    //     $menu_id = $queryMenu['id'];

    //     $userAccess = $CI->db->get_where('user_access_menu', [
    //         'role_id' => $role_id,
    //         'menu_id' => $menu_id
    //     ]);

    //     if ($userAccess->num_rows() < 1) {
    //         redirect('auth/blocked');
    //     }
    // }
}
