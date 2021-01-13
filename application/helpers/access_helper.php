<?php


function is_logged()
{

    //$CI = get_instance();

    $CI = &get_instance();

    if (!isset($CI->session->userdata['username'])) {
        $CI->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Anda Belum Login
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        redirect('auth');
    } else {
    }
}
