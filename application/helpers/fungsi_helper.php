<?php

function check_already_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('userid');
    if ($user_session) {
        redirect('dashboard');
    }
}

function check_not_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('userid');
    if (!$user_session) {
        redirect('auth/login');
    }
}

function check_admin()
{
    $ci = &get_instance();
    $ci->load->library('fungsi');
    if ($ci->fungsi->user_login()->level != 1) {
        redirect('dashboard');
    }
}

function indoCurrency($value)
{
    $result = 'Rp. ' . number_format($value, 0, ",", ".");
    return $result;
}

function indo_date($date)
{
    $d = substr($date, 8, 2);
    $m = substr($date, 5, 2);
    $y = substr($date, 0, 4);
    return $d . '/' . $m . '/' . $y;
}

function GetKodePenjualan($tgldoang = true)
{
    $ci = &get_instance();

    $AmbilTanggalSekarang = date('dmy');
    $CekKodePenjualan = $ci->db->get('t_penjualan')->num_rows();
    if ($CekKodePenjualan > 0) {
        $KodePenjualan = $ci->db->query("SELECT MAX(kode_penjualan) AS KD FROM t_penjualan WHERE date(tanggal) = CURDATE() ")->row();
        $NoUrut = substr($KodePenjualan->KD, 9, 4) + 1;
        $KodePenjualanBaru = sprintf('%04s', $NoUrut);
    } else {
        $KodePenjualanBaru = '0001';
    }

    if ($tgldoang)
        $return = "KDP" . $AmbilTanggalSekarang . $KodePenjualanBaru;
    else if ($tgldoang == false)
        $return = $AmbilTanggalSekarang;

    return $return;
}

function pre($value)
{
    return var_dump('<pre>', $value, '</pre>');
}


function pr($value)
{
    return "<pre>" . print_r($value) . "</pre>";
}
