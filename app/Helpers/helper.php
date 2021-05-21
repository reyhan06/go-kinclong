<?php

function toRupiah($angka){
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
}

function dateTimeFormat(string $date_time, $with_time = true){
    $format = $with_time
        ? 'j F, Y - H:i:s'
        : 'j F, Y';
	return date($format, strtotime($date_time));
}

function timeFormat(string $date_time){
	return date('H:i', strtotime($date_time));
}

// function limitText($value, $max = 32)
// {
//     return strlen($value) < $max
//         ? $value
//         : substr($value, 0, $max - 3).'...';
// }
//
// function clearRupiah($amount)
// {
//     $amount = preg_replace('/[Rp. ]/', '', $amount); // menghilangkan simbol Rp dan '.'
//     $amount = preg_replace('/,/', '.', $amount); // mengganti ',' dengan '.'
//
//     return $amount;
// }
//
// function successMessage($message)
// {
//     session()->flash('success', $message);
// }
