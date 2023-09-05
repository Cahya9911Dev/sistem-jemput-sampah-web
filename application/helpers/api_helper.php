<?php
function tgl_indo($tgl, $replace_with = '-')
{
	if (date_is_empty($tgl)) {
		return $replace_with;
	}
	$tanggal = substr($tgl, 8, 2);
	$bulan = getBulan(substr($tgl, 5, 2));
	$tahun = substr($tgl, 0, 4);
	return $tanggal . ' ' . $bulan . ' ' . $tahun;
}
function tgl_indo2($tgl, $replace_with = '-')
{
	if (date_is_empty($tgl)) {
		return $replace_with;
	}
	$tanggal = substr($tgl, 8, 2);
	$jam = substr($tgl, 11, 8);
	$bulan = getBulan(substr($tgl, 5, 2));
	$tahun = substr($tgl, 0, 4);
	return $tanggal . ' ' . $bulan . ' ' . $tahun . ' ' . $jam;
}
function tgl_indo_in($tgl, $replace_with = '-')
{
	if (date_is_empty($tgl)) {
		return $replace_with;
	}
	$tanggal = substr($tgl, 0, 2);
	$bulan = substr($tgl, 3, 2);
	$tahun = substr($tgl, 6, 4);
	$jam = substr($tgl, 11);
	$jam = empty($jam) ? '' : ' ' . $jam;
	return $tahun . '-' . $bulan . '-' . $tanggal . $jam;
}

function date_is_empty($tgl)
{
	return (is_null($tgl) || substr($tgl, 0, 10) == '0000-00-00');
}

function getBulan($bln)
{
	switch ($bln) {
		case 1:
			return "Januari";
			break;
		case 2:
			return "Februari";
			break;
		case 3:
			return "Maret";
			break;
		case 4:
			return "April";
			break;
		case 5:
			return "Mei";
			break;
		case 6:
			return "Juni";
			break;
		case 7:
			return "Juli";
			break;
		case 8:
			return "Agustus";
			break;
		case 9:
			return "September";
			break;
		case 10:
			return "Oktober";
			break;
		case 11:
			return "November";
			break;
		case 12:
			return "Desember";
			break;
	}
}

function getHari($tgl)
{
	$daftar_hari = array(
		'Sunday' => 'Minggu',
		'Monday' => 'Senin',
		'Tuesday' => 'Selasa',
		'Wednesday' => 'Rabu',
		'Thursday' => 'Kamis',
		'Friday' => 'Jumat',
		'Saturday' => 'Sabtu'
	);
	$namahari = date('l', strtotime($tgl));
	return $daftar_hari[$namahari];
}

function getStatus($status)
{
	if ($status == "0") {
		$st = "Belum Dikonfirmasi";
	} else if ($status == "1") {
		$st = "Dikonfirmasi";
	} else if ($status == "2") {
		$st = "Proses Pencucican";
	} else if ($status == "3") {
		$st = "Proses Pengeringan";
	} else if ($status == "4") {
		$st = "Proses Pelabelan";
	} else if ($status == "5") {
		$st = "Proses Setrika";
	} else if ($status == "6") {
		$st = "Selesai";
	}

	return $st;
}

function getRupiah($harga = 0)
{
	if ($harga != null) {
		return "Rp " . number_format($harga, 0, ",", ".");
	} else {
		return "Rp 0";
	}
}
