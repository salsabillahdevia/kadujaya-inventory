<?php

function is_logged_in()
{
    $ci = get_instance();

    if (!$ci->session->userdata('kode_petugas')) {
        redirect('auth');
    } else {
        $kode_petugas = $ci->session->userdata('kode_petugas');

        //query buat ngecek kode_petugas
        $userAccess = $ci->db->get_where('user', [
            'kode_petugas' => $kode_petugas
        ]);

        //kalo query diatas hasilnya 0 atau belom login, tendang ke halaman blocked
        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}
