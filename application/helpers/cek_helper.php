<?php

function is_login()
{
    $ci = get_instance();

    if (!$ci->session->userdata('username')) {
        redirect('auth/index');
    }
}

function stay()
{
    $ci = get_instance();

    if ($ci->session->userdata('username')) {
        if ($ci->session->userdata('role_id') == 1) {
            redirect('admin/index');
        } else {
            redirect('user/index');
        }
    }
}