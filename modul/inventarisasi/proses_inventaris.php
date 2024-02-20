<?php
require('../../koneksi.php');
if (isset($_POST['simpan'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = NULL;
        $id_lab = $_POST["id_laboratorium"];
        $nama = $_POST["nama"];
        $merk = $_POST["merk"];
        $spesifikasi = $_POST["spesifikasi"];
        $jumlah = $_POST["jumlah"];
        $fungsi = $_POST["fungsi"];
        $sumber = $_POST["sumber"];
        $tahun = $_POST["tahun"];
        $kondisi = $_POST["kondisi"];
        $penggunaan = $_POST["penggunaan"];
        $keterangan = $_POST["keterangan"];

        $sql = "SELECT id FROM inventaris where id='".$id."'";
        $cekId = $conn->query($sql);
        if($cekId->num_rows > 0) {
            echo "<script>window.alert('Maaf Data Kode Sudah Ada');
            window.location=('../../index.php?r=tambah_inventaris')</script>";
        } else{
            // Siapkan pernyataan SQL INSERT
            $sql = "INSERT INTO inventaris (id, id_laboratorium, nama, merk, spesifikasi, jumlah, fungsi, sumber, tahun, kondisi, penggunaan, keterangan) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            // Buat pernyataan persiapan
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                // Bind parameter dan jalankan pernyataan SQL
                $stmt->bind_param("ssssssssssss", $id, $id_lab, $nama, $merk, $spesifikasi, $jumlah, $fungsi, $sumber, $tahun, $kondisi, $penggunaan, $keterangan);

                if ($stmt->execute()) {
                    echo "<script>window.alert('Data telah disimpan ke database.');
                    window.location=('../../index.php?r=inventaris')</script>";
                } else {
                    echo "<script>window.alert('Terjadi kesalahan saat menyimpan data: ');
                    window.location=('../../index.php?r=tambah_inventaris')</script>". $stmt->error;
                }

                // Tutup pernyataan
                $stmt->close();
            } else {
                echo "<script>window.alert('Terjadi kesalahan saat menyiapkan pernyataan: ');
                    window.location=('../../index.php?r=tambah_inventaris')</script>". $conn->error;
            }
        }      
    }
    
}
if (isset($_POST['edit'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $id_lab = $_POST["id_laboratorium"];
        $nama = $_POST["nama"];
        $merk = $_POST["merk"];
        $spesifikasi = $_POST["spesifikasi"];
        $jumlah = $_POST["jumlah"];
        $fungsi = $_POST["fungsi"];
        $sumber = $_POST["sumber"];
        $tahun = $_POST["tahun"];
        $kondisi = $_POST["kondisi"];
        $penggunaan = $_POST["penggunaan"];
        $keterangan = $_POST["keterangan"];

            // Persiapkan pernyataan SQL UPDATE dengan variabel langsung
            $sql = "UPDATE inventaris SET id_laboratorium='$id_lab', nama='$nama', merk='$merk', spesifikasi='$spesifikasi', jumlah='$jumlah', fungsi='$fungsi', sumber='$sumber', tahun='$tahun', kondisi='$kondisi', penggunaan='$penggunaan', keterangan='$keterangan' WHERE id='$id'";


            // Buat pernyataan persiapan
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                if ($stmt->execute()) {
                    echo "<script>window.alert('Pembaruan data telah disimpan ke database.');
                    window.location=('../../index.php?r=inventaris')</script>";
                } else {
                    echo "<script>window.alert('Terjadi kesalahan saat menyimpan data: ');
                    window.location=('../../index.php?r=tambah_inventaris')</script>". $stmt->error;
                }

                // Tutup pernyataan
                $stmt->close();
            } else {
                echo "<script>window.alert('Terjadi kesalahan saat menyiapkan pernyataan: ');
                    window.location=('../../index.php?r=tambah_inventaris')</script>". $conn->error;
            }
              
    }
    
}
?>
