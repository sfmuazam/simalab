<?php
include 'koneksi.php';
$key = $_GET['k'];

if ($key=='hapus_laboratorium') {
	$idLab = $_GET['id'];
    $idLab = $conn->real_escape_string($idLab);
    $sqlHapusLaboratorium = "";
    $sqlHapusLaboratorium = "delete from laboratorium where id ='".$idLab."'";
    if ($conn->query($sqlHapusLaboratorium)===TRUE) {
		echo "<script>window.alert('Data Laboratorium Terhapus');
        window.location=('index.php?r=info_laboratorium')</script>";
	}
	else{
		echo "error".$conn->error;
	}
}
// if ($key=='hapus_petugas') {
// 	$nipPetugas = $_GET['id'];
//     $nipPetugas = $conn->real_escape_string($nipPetugas);
//     $sqlHapusPetugas= "";
//     $sqlHapusPetugas= "delete from petugas where nip ='".$nipPetugas."'";
//     if ($conn->query($sqlHapusPetugas)===TRUE) {
// 		echo "<script>window.alert('Data Petugas Terhapus');
//         window.location=('index.php?r=organisasi')</script>";
// 	}
// 	else{
// 		echo "error".$conn->error;
// 	}
// }
if ($key == 'hapus_petugas') {
    $nipPetugas = $_GET['id'];
    $nipPetugas = $conn->real_escape_string($nipPetugas);

    // Ambil nama file gambar sebelum hapus
    $sqlGetGambar = "SELECT ttd FROM petugas WHERE nip = ?";
    $stmtGetGambar = $conn->prepare($sqlGetGambar);
    $stmtGetGambar->bind_param("s", $nipPetugas);
    $stmtGetGambar->execute();
    $stmtGetGambar->store_result();

    // Jika ada data, ambil nama file gambar dan hapus file tersebut
    if ($stmtGetGambar->num_rows > 0) {
        $stmtGetGambar->bind_result($gambarPetugas);
        $stmtGetGambar->fetch();

        // Hapus gambar lama jika file tersebut ada
        if (!empty($gambarPetugas) && file_exists('uploads/' . $gambarPetugas)) {
            unlink('uploads/' . $gambarPetugas);
        }
    }

    // Hapus data petugas dari database
    $sqlHapusPetugas = "DELETE FROM petugas WHERE nip = ?";
    $stmtHapusPetugas = $conn->prepare($sqlHapusPetugas);
    $stmtHapusPetugas->bind_param("s", $nipPetugas);

    if ($stmtHapusPetugas->execute()) {
        echo "<script>window.alert('Data Petugas Terhapus');
            window.location=('index.php?r=organisasi')</script>";
    } else {
        echo "error" . $conn->error;
    }

    // Tutup pernyataan
    $stmtHapusPetugas->close();
    $stmtGetGambar->close();
}

if ($key=='hapus_surat_bebas') {
	$noSuratBebas = $_GET['id'];
    $noSuratBebas = $conn->real_escape_string($noSuratBebas);
    $sqlHapusSuratBebas= "";
    $sqlHapusSuratBebas= "delete from surat_bebas where no_surat ='".$noSuratBebas."'";
    if ($conn->query($sqlHapusSuratBebas)===TRUE) {
		echo "<script>window.alert('Data Surat Bebas Terhapus');
        window.location=('index.php?r=surat_bebas')</script>";
	}
	else{
		echo "error".$conn->error;
	}
}
if ($key=='hapus_surat_penelitian') {
	$noSuratPenelitian = $_GET['id'];
    $noSuratPenelitian = $conn->real_escape_string($noSuratPenelitian);
    $sqlHapusSuratPenelitian= "";
    $sqlHapusSuratPenelitian= "delete from surat_penelitian where no_surat ='".$noSuratPenelitian."'";
    if ($conn->query($sqlHapusSuratPenelitian)===TRUE) {
		echo "<script>window.alert('Data Surat Penelitian Terhapus');
        window.location=('index.php?r=surat_penelitian')</script>";
	}
	else{
		echo "error".$conn->error;
	}
}
if ($key=='hapus_surat_peminjaman') {
	$noSuratPeminjaman = $_GET['id'];
    $noSuratPeminjaman = $conn->real_escape_string($noSuratPeminjaman);
    $sqlHapusSuratPeminjaman= "";
    $sqlHapusSuratPeminjaman= "delete from surat_peminjaman where id ='".$noSuratPeminjaman."'";
    if ($conn->query($sqlHapusSuratPeminjaman)===TRUE) {
		echo "<script>window.alert('Data Surat Peminjaman Terhapus');
        window.location=('index.php?r=surat_peminjaman')</script>";
	}
	else{
		echo "error".$conn->error;
	}
}
if ($key=='hapus_inventaris') {
	$idInventaris = $_GET['id'];
    $idInventaris = $conn->real_escape_string($idInventaris);
    $sqlHapusInventaris = "";
    $sqlHapusInventaris = "delete from inventaris where id ='".$idInventaris."'";
    if ($conn->query($sqlHapusInventaris)===TRUE) {
		echo "<script>window.alert('Data Inventaris Laboratorium Terhapus');
        window.location=('index.php?r=inventaris')</script>";
	}
	else{
		echo "error".$conn->error;
	}
}
if ($key=='hapus_inventaris_lab') {
	$idInventarisLab = $_GET['id'];
    $idInventarisLab = $conn->real_escape_string($idInventarisLab);
    $sqlHapusInventarisLab = "";
    $sqlHapusInventarisLab = "delete from inventaris_lab where id ='".$idInventarisLab."'";
    if ($conn->query($sqlHapusInventarisLab)===TRUE) {
		echo "<script>window.alert('Data Inventaris Laboratorium Terhapus');
        window.location=('index.php?r=inventarisLab')</script>";
	}
	else{
		echo "error".$conn->error;
	}
}
?>