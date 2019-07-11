<?php

if (!function_exists('jatah_divisi')) {
    function jatah_divisi() {
        return [
            'Operation' => 20,
            'Reservation' => 20,
            'Manajemen' => 20,
            'IT' => 20,
            'Ticketing' => 20,
            'Accounting' => 20
        ];
    }
}

if (!function_exists('get_jatah_divisi')) {
    function get_jatah_divisi($name) {
        return jatah_divisi()[$name];
    }
}