<?php
require('../../koneksi.php');
if (isset($_POST['simpan']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $idLab = $_POST["idLab"];
    $idAlat = $_POST["idAlat"];
    $jumlah = $_POST["jumlah"];
    $keterangan = $_POST["keterangan"];

    // Siapkan pernyataan SQL INSERT
    $sql = "INSERT INTO inventaris_lab (id_laboratorium, id_alat, jumlah, keterangan) VALUES (?, ?, ?, ?)";

    // Buat pernyataan persiapan
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameter dan jalankan pernyataan SQL
        $stmt->bind_param("ssss", $idLab, $idAlat, $jumlah, $keterangan);

        if ($stmt->execute()) {
            echo "<script>window.alert('Data telah disimpan ke database.');
            window.location=('../../index.php?r=inventarisLab')</script>";
        } else {
            echo "<script>window.alert('Terjadi kesalahan saat menyimpan data: ".$stmt->error."');
            window.location=('../../index.php?r=tambah_inventaris_lab')</script>";
        }

        // Tutup pernyataan
        $stmt->close();
    } else {
        echo "<script>window.alert('Terjadi kesalahan saat menyiapkan pernyataan: ".$conn->error."');
            window.location=('../../index.php?r=tambah_inventaris')</script>";
    }
}

if (isset($_POST['edit'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $idLab = $_POST["idLab"];
        $idAlat = $_POST["idAlat"];
        $jumlah = $_POST["jumlah"];
        $keterangan = $_POST["keterangan"];

            // Persiapkan pernyataan SQL UPDATE dengan variabel langsung
            $sql = "UPDATE inventaris_lab SET id_laboratorium='$idLab', id_alat='$idAlat', jumlah='$jumlah', keterangan='$keterangan' WHERE id='$id'";


            // Buat pernyataan persiapan
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                if ($stmt->execute()) {
                    echo "<script>window.alert('Pembaruan data telah disimpan ke database.');
                    window.location=('../../index.php?r=inventarisLab')</script>";
                } else {
                    echo "<script>window.alert('Terjadi kesalahan saat menyimpan data: ');
                    window.location=('../../index.php?r=edit_inventarisLab')</script>". $stmt->error;
                }

                // Tutup pernyataan
                $stmt->close();
            } else {
                echo "<script>window.alert('Terjadi kesalahan saat menyiapkan pernyataan: ');
                    window.location=('../../index.php?r=edit_inventarisLab')</script>". $conn->error;
            }
              
    }
    
}
?>
