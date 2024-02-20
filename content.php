<?php
if (isset($_GET['r'])) {
	$key = $_GET['r'];
	
	if ($key == 'info_laboratorium') {
		include 'modul/laboratorium/laboratorium.php';
	}
	if ($key == 'tambah_laboratorium') {
		include 'modul/laboratorium/tambah_laboratorium.php';
	}
	if ($key == 'edit_laboratorium') {
		include 'modul/laboratorium/edit_laboratorium.php';
	}
    if ($key == 'organisasi') {
		include 'modul/laboratorium/petugas.php';
	}
	if ($key == 'tambah_petugas') {
		include 'modul/laboratorium/tambah_petugas.php';
	}
	if ($key == 'edit_petugas') {
		include 'modul/laboratorium/edit_petugas.php';
	}
	if ($key == 'buat_surat_bebas') {
		include 'modul/surat_bebas/buat_surat_bebas.php';
	}
    if ($key == 'surat_bebas') {
		include 'modul/surat_bebas/surat_bebas.php';
	}
	if ($key == 'edit_surat_bebas') {
		include 'modul/surat_bebas/edit_surat_bebas.php';
	}
	if ($key == 'lihat_surat_bebas') {
		include 'modul/surat_bebas/lihat_surat_bebas.php';
	}
	if ($key == 'buat_surat_penelitian') {
		include 'modul/surat_penelitian/buat_surat_penelitian.php';
	}
    if ($key == 'surat_penelitian') {
		include 'modul/surat_penelitian/surat_penelitian.php';
	}
	if ($key == 'edit_surat_penelitian') {
		include 'modul/surat_penelitian/edit_surat_penelitian.php';
	}
	if ($key == 'lihat_surat_penelitian') {
		include 'modul/surat_penelitian/lihat_surat_penelitian.php';
	}
	if ($key == 'buat_surat_peminjaman') {
		include 'modul/surat_peminjaman/buat_surat_peminjaman.php';
	}
    if ($key == 'surat_peminjaman') {
		include 'modul/surat_peminjaman/surat_peminjaman.php';
	}
	if ($key == 'edit_surat_peminjaman') {
		include 'modul/surat_peminjaman/edit_surat_peminjaman.php';
	}
	if ($key == 'lihat_surat_peminjaman') {
		include 'modul/surat_peminjaman/lihat_surat_peminjaman.php';
	}
	if ($key == 'tambah_inventaris') {
		include 'modul\inventarisasi\tambah_inventaris.php';
	}
	if ($key == 'inventaris') {
		include 'modul\inventarisasi\inventaris.php';
	}
	if ($key == 'edit_inventaris') {
		include 'modul\inventarisasi\edit_inventaris.php';
	}
	if ($key == 'tambah_inventarisLab') {
		include 'modul\inventarisasi\tambah_inventaris_lab.php';
	}
	if ($key == 'inventarisLab') {
		include 'modul\inventarisasi\inventaris_lab.php';
	}
	if ($key == 'edit_inventarisLab') {
		include 'modul\inventarisasi\edit_inventaris_lab.php';
	}
	if ($key == 'lihat_inventarisLab') {
		include 'modul\inventarisasi\lihat_inventaris_lab.php';
	}
} else {
	// Tambahkan nilai default di sini, misalnya:
	include 'dashboard.php';
}
?>
