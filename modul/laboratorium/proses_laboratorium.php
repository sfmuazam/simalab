<?php
require('../../koneksi.php');
if (isset($_POST['simpan'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $nama = $_POST["nama"];
        $kapasitas = $_POST["kapasitas"];
        $penanggung_jawab = $_POST["penanggung_jawab"];

        $sql = "SELECT id FROM laboratorium where id='".$id."'";
        $cekId = $conn->query($sql);
        if($cekId->num_rows > 0) {
            echo "<script>window.alert('Maaf Data Kode Sudah Ada');
            window.location=('../../index.php?r=tambah_laboratorium')</script>";
        } else{
            // Siapkan pernyataan SQL INSERT
            $sql = "INSERT INTO laboratorium (id, nama, kapasitas, penanggung_jawab) VALUES (?, ?, ?, ?)";

            // Buat pernyataan persiapan
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                // Bind parameter dan jalankan pernyataan SQL
                $stmt->bind_param("ssss", $id, $nama, $kapasitas, $penanggung_jawab);

                if ($stmt->execute()) {
                    echo "<script>window.alert('Data telah disimpan ke database.');
                    window.location=('../../index.php?r=info_laboratorium')</script>";
                } else {
                    echo "<script>window.alert('Terjadi kesalahan saat menyimpan data: ');
                    window.location=('../../index.php?r=tambah_laboratorium')</script>". $stmt->error;
                }

                // Tutup pernyataan
                $stmt->close();
            } else {
                echo "<script>window.alert('Terjadi kesalahan saat menyiapkan pernyataan: ');
                    window.location=('../../index.php?r=tambah_laboratorium')</script>". $conn->error;
            }
        }      
    }
    
}
if (isset($_POST['edit'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $nama = $_POST["nama"];
        $kapasitas = $_POST["kapasitas"];
        $penanggung_jawab = $_POST["penanggung_jawab"];

            // Siapkan pernyataan SQL UPDATE
            $sql = "UPDATE laboratorium SET nama = ?, kapasitas = ?, penanggung_jawab = ? WHERE id = ?";


            // Buat pernyataan persiapan
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                // Bind parameter dan jalankan pernyataan SQL
                $stmt->bind_param("sssi", $nama, $kapasitas, $penanggung_jawab, $id);


                if ($stmt->execute()) {
                    echo "<script>window.alert('Data telah disimpan ke database.');
                    window.location=('../../index.php?r=info_laboratorium')</script>";
                } else {
                    echo "<script>window.alert('Terjadi kesalahan saat menyimpan data: ');
                    window.location=('../../index.php?r=tambah_laboratorium')</script>". $stmt->error;
                }

                // Tutup pernyataan
                $stmt->close();
            } else {
                echo "<script>window.alert('Terjadi kesalahan saat menyiapkan pernyataan: ');
                    window.location=('../../index.php?r=tambah_laboratorium')</script>". $conn->error;
            }
              
    }
    
}
?>
