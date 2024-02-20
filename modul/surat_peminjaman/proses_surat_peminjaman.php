<?php
    require('../../vendor/autoload.php'); // Mengimpor autoloader TCPDF
    require('../../koneksi.php');
if (isset($_POST['generate'])) {
        // Ambil data kepala laboratorium jaringan
        $queryJaringan = "SELECT nama, nip, ttd FROM petugas WHERE jabatan = 'Kepala Laboratorium Jaringan'";
        $resultJaringan = $conn->query($queryJaringan);
    
        if ($resultJaringan) {
            $rowJaringan = $resultJaringan->fetch_assoc();
            $kepalaLabJaringan = $rowJaringan['nama'];
            $nipKepalaLabJaringan = $rowJaringan['nip'];
            $ttdKepalaLabJaringan = $rowJaringan['ttd']; // Nama kolom yang menyimpan nama file gambar
        } else {
            echo "Kesalahan dalam menjalankan query: " . $conn->error;
        }
    
        // Ambil data kepala laboratorium pemrograman
        $queryPemrograman = "SELECT nama, nip, ttd FROM petugas WHERE jabatan = 'Kepala Laboratorium Pemrograman'";
        $resultPemrograman = $conn->query($queryPemrograman);
    
        if ($resultPemrograman) {
            $rowPemrograman = $resultPemrograman->fetch_assoc();
            $kepalaLabPemrograman = $rowPemrograman['nama'];
            $nipKepalaLabPemrograman = $rowPemrograman['nip'];
            $ttdKepalaLabPemrograman = $rowPemrograman['ttd']; // Nama kolom yang menyimpan nama file gambar
        } else {
            echo "Kesalahan dalam menjalankan query: " . $conn->error;
        }
        // Gunakan data yang diambil untuk menentukan nama file gambar
        $imagePathJaringan = '../../uploads/' . $ttdKepalaLabJaringan;
        $imagePathPemrograman = '../../uploads/' . $ttdKepalaLabPemrograman;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST["nama"];
        $NIM = $_POST["NIM"];
        $noHp = $_POST["noHp"];
        $tanggalInput = $_POST['tanggal'];
        $pinjam = $_POST['pinjam'];
        $kembali = $_POST['kembali'];
        $durasi = $_POST['durasi'];
        $keperluan = $_POST['keperluan'];

        // Mendapatkan nilai alat dan jumlah dari formulir
        $alatValues = $_POST['alat'];
        $jumlahValues = $_POST['jumlah'];



        $namaBulan = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        $timestamp = strtotime($tanggalInput);
        $bulanTerformat = $namaBulan[date('n', $timestamp) - 1];
        $tahunTerformat = date('Y', $timestamp);
        $tanggalTerformat = date('j F Y', strtotime($tanggalInput));

        if (!empty($nama) && !empty($NIM) && !empty($noHp)) {
            $pdf = new TCPDF();
            $pdf->SetMargins(5, 0, 0);
            $pdf->SetAutoPageBreak(false);
            $pdf->AddPage();
            $pdf->SetFont('times', '', 12);
            $pdf->SetXY(5, 10);
            $pdf->SetFillColor(255, 255, 255);
            $pdf->Cell(210, 20, '', 0, 0, 'C', 1);

            $pdf->Image('../../logo.jpg', 20, 20, 25, 0, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);

            $kopSurat = "KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI\nUNIVERSITAS JENDERAL SOEDIRMAN\nFAKULTAS TEKNIK\nLABORATORIUM JURUSAN TEKNIK INFORMATIKA";

            $pageWidth = $pdf->GetPageWidth();
            $kopWidth = $pdf->GetStringWidth($kopSurat);
            $kopX = ($pageWidth) / 22;

            $pdf->SetFont('times', 'B', 10);
            $pdf->SetXY($kopX, $pdf->GetY());
            $pdf->MultiCell(0, 10, $kopSurat, 0, 'C');
            $pdf->SetFont('times', '', 10);
            $pdf->SetXY($kopX, $pdf->GetY());
            $pdf->MultiCell(0, 10, "Jl. Mayjen Sungkono KM 5 Blater Purbalingga 53371 Telp/Fax. (0281) 6596700", 0, 'C');
            $pdf->SetFont('times', '', 11);
            $pdf->SetXY($kopX, $pdf->GetY()-5);
            $pdf->MultiCell(0, 10, "Psw. 144 E-mail : teknik@unsoed.ac.id", 0, 'C');

            $lineY = $pdf->GetY()-3;
            $pdf->SetLineWidth(1);
            $pdf->Line(20, $lineY, 190, $lineY);
            $pdf->SetLineWidth(0.2);

            $pdf->Ln(10);

            $pdf->SetY(60);
            $pdf->SetFont('times', 'BU', 14);
            $pdf->Cell(0, 10, "SURAT KETERANGAN PEMINJAMAN PERALATAN", 0, 0, 'C');
            $pdf->SetFont('times', '', 12);
            $pdf->Cell(0, 0, '', 0, 1);
            $pdf->Cell(0, 10, '', 0, 1, 'C');

            $content = "Yang bertanda tangan di bawah ini:
            ";
            $pdf->SetXY(25, $pdf->GetY());
            $pdf->MultiCell(160, 10, $content);

            $cellWidth = 50;
            $cellHeight = 10;
            $cellBorder = 0;
            $pageWidth = $pdf->GetPageWidth();
            $tableWidth = $cellWidth * 3;
            $tableX = ($pageWidth - $tableWidth) / 2;
            $pdf->SetX($tableX);

            $pdf->Cell(35, $cellHeight, 'Nama', $cellBorder);
            $pdf->Cell(5, $cellHeight, ':', $cellBorder);
            $pdf->Cell(110, $cellHeight, $nama, $cellBorder);
            $pdf->Ln();

            $pdf->SetX($tableX);
            $pdf->Cell(35, $cellHeight, 'NIM/NIP', $cellBorder);
            $pdf->Cell(5, $cellHeight, ':', $cellBorder);
            $pdf->Cell(110, $cellHeight, $NIM, $cellBorder);
            $pdf->Ln();

            $pdf->SetX($tableX);
            $pdf->Cell(35, $cellHeight, 'No Telp/HP', $cellBorder);
            $pdf->Cell(5, $cellHeight, ':', $cellBorder);
            $pdf->Cell(110, $cellHeight, $noHp, $cellBorder);
            $pdf->Ln();

            $content = "Akan melakukan peminjaman peralatan Laboratorium Jurusan Teknik Informatika sebagai berikut:
                ";
            $pdf->SetXY(25, $pdf->GetY()+5);
            $pdf->MultiCell(160, 10, $content);

            $cellHeight = 5;
            $cellBorder = 1;
            $pageWidth = $pdf->GetPageWidth();
            $tableWidth = $cellWidth * 3;
            $tableX = ($pageWidth - $tableWidth) / 2;
            $pdf->SetX(25);
            
            $pdf->SetFont('times', 'B', 12);
            $pdf->Cell(10, $cellHeight, 'No', $cellBorder, 0, 'C');
            $pdf->Cell(105, $cellHeight, 'Nama Peralatan', $cellBorder, 0, 'C');
            $pdf->Cell(45, $cellHeight, 'Jumlah', $cellBorder, 0, 'C');
            $pdf->Ln();
            $pdf->SetFont('times', '', 12);
            
            // Loop melalui setiap nilai alat dan jumlah
            foreach ($alatValues as $index => $alatValue) {
                $jumlahValue = $jumlahValues[$index];
                // echo 'Nilai Alat ' . ($index + 1) . ': ' . $alatValue . ', Jumlah ' . ($index + 1) . ': ' . $jumlahValue . '<br>';
                $pdf->SetX(25);
                $pdf->Cell(10, $cellHeight, $index + 1, $cellBorder, 0, 'C');
                $pdf->Cell(105, $cellHeight, $alatValue, $cellBorder);
                $pdf->Cell(45, $cellHeight, $jumlahValue, $cellBorder, 0, 'C');
                $pdf->Ln();
            }

            $content = "Peminjaman peralatan selama ".$durasi." Hari, terhitung mulai dari:
            ";
            $pdf->SetXY(25, $pdf->GetY()+5);
            $pdf->MultiCell(160, 10, $content);

            $cellWidth = 40;
            $cellHeight = 5;
            $cellBorder = 1;
            $pageWidth = $pdf->GetPageWidth();
            $tableWidth = $cellWidth * 4;
            $tableX = ($pageWidth - $tableWidth) / 2;

            $pdf->SetX($tableX);
            $pdf->SetFont('times', 'B', 12);
            $pdf->Cell(45, $cellHeight, 'Tanggal Peminjaman', $cellBorder, 0, 'C');
            $pdf->Cell(35, $cellHeight, 'Tanda Tangan', $cellBorder, 0, 'C');
            $pdf->Cell(45, $cellHeight, 'Tanggal Pengembalian', $cellBorder, 0, 'C');
            $pdf->Cell(35, $cellHeight, 'Tanda Tangan', $cellBorder, 1, 'C'); // Setelah cell terakhir, pindah ke baris baru
            $pdf->SetFont('times', '', 12);
            
            $pdf->SetX($tableX);
            $pdf->Cell(45, 25, $pinjam, $cellBorder, 0, 'C');
            $pdf->Cell(35, 25, '', $cellBorder, 0, 'C');
            $pdf->Cell(45, 25, $kembali, $cellBorder, 0, 'C');
            $pdf->Cell(35, 25, '', $cellBorder, 1, 'C'); // Setelah cell terakhir, pindah ke baris baru
                       
            $content = "Untuk keperluan ".$keperluan.", Segala bentuk kerusakan yang timbul saya siap untuk menggantinya.
            ";
            $pdf->SetXY(25, $pdf->GetY()+5);
            $pdf->MultiCell(160, 10, $content);

            $pdf->SetXY(125, $pdf->GetY());
            $tanggalSurat = "Purbalingga, ". date('j', $timestamp) . " " . $bulanTerformat . " " . $tahunTerformat;
            $pdf->Cell(60, 10, $tanggalSurat, 0, 1, 'C');

            $pdf->Cell(0, 10, 'Mengetahui,', 0, 1, 'C');
            $pdf->SetFont('times', '', 11);
            
            $ttdKiriNama = $kepalaLabPemrograman;
            $ttdTengahNama = $kepalaLabJaringan;
            $ttdKananNama = $nama;


            $ttdKiri = 'Kepala Lab Pemrograman';
            $ttdTengah = 'Kepala Lab Jaringan';
            $ttdKanan = 'Peminjam';

            $cellWidth = 55;
            $cellHeight = 5;
            $cellBorder = 1;
            $pageWidth = $pdf->GetPageWidth();
            $tableWidth = $cellWidth * 3;
            $tableX = ($pageWidth - $tableWidth) / 2;

            $pdf->SetX($tableX);

            $pdf->Cell($cellWidth, $cellHeight, $ttdKiri, $cellBorder);
            $pdf->Cell($cellWidth, $cellHeight, $ttdTengah, $cellBorder);
            $pdf->Cell($cellWidth, $cellHeight, $ttdKanan, $cellBorder);
            $pdf->Ln();
            $pdf->Image($imagePathPemrograman, 15, $pdf->GetY(), 0, 20, 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
            $pdf->Image($imagePathJaringan, 80, $pdf->GetY(), 0, 20, 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

            $pdf->SetX($tableX);

            $pdf->Cell($cellWidth, 20, '', $cellBorder);
            $pdf->Cell($cellWidth, 20, '', $cellBorder);
            $pdf->Cell($cellWidth, 20, '', $cellBorder);
            $pdf->Ln();

            $pdf->SetX($tableX);

            $pdf->Cell($cellWidth, $cellHeight, $ttdKiriNama, $cellBorder);
            $pdf->Cell($cellWidth, $cellHeight, $ttdTengahNama, $cellBorder);
            $pdf->Cell($cellWidth, $cellHeight, $ttdKananNama, $cellBorder);
            $pdf->Ln();

            $pdf->Output('surat.pdf', 'I');
        }
    }
}


if (isset($_POST['simpan'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
// ... (kode sebelumnya)

// Ambil nilai dari formulir
$nama = $_POST["nama"];
$NIM = $_POST["NIM"];
$noHp = $_POST["noHp"];
$tanggalInput = $_POST['tanggal'];
$pinjam = $_POST['pinjam'];
$kembali = $_POST['kembali'];
$durasi = $_POST['durasi'];
$keperluan = $_POST['keperluan'];

// Ambil nilai dari formulir Alat dan Jumlah
$alatArray = $_POST['alat'];
$jumlahArray = $_POST['jumlah'];
$alatJSON = json_encode($alatArray);
$jumlahJSON = json_encode($jumlahArray);
    // SQL untuk menyimpan data
    $sql = "INSERT INTO surat_peminjaman (nama, nim, noHp, tanggal, pinjam, kembali, durasi, keperluan, alat, jumlah)
            VALUES ('$nama', '$NIM', '$noHp', '$tanggalInput', '$pinjam', '$kembali', '$durasi', '$keperluan', '$alatJSON', '$jumlahJSON')";

    // Eksekusi SQL
    if ($conn->query($sql) === TRUE) {
        echo "<script>window.alert('Data telah disimpan ke database.');
                    window.location=('../../index.php?r=surat_peminjaman')</script>";
    } else {
        echo "<script>window.alert('Terjadi kesalahan saat menyimpan data: ');
                    window.location=('../../index.php?r=buat_surat_peminjaman')</script>". $stmt->error;
    }

// Tutup koneksi
$conn->close();

        
    }
}

if (isset($_POST['edit'])) {
    require('../../vendor/autoload.php'); // Mengimpor autoloader TCPDF
    require('../../koneksi.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $nama = $_POST["nama"];
        $NIM = $_POST["NIM"];
        $noHp = $_POST["noHp"];
        $tanggalInput = $_POST['tanggal'];
        $pinjam = $_POST['pinjam'];
        $kembali = $_POST['kembali'];
        $durasi = $_POST['durasi'];
        $keperluan = $_POST['keperluan'];
        
        // Cek apakah ada tambahan alat dan jumlah
        $alatArray = array_filter($_POST['alat']);
        $jumlahArray = array_filter($_POST['jumlah']);
        $alatJSON = json_encode($alatArray);
        $jumlahJSON = json_encode($jumlahArray);

        $sql = "UPDATE surat_peminjaman SET nama = '$nama', nim = '$NIM', noHp = '$noHp', tanggal = '$tanggalInput', pinjam = '$pinjam', kembali = '$kembali', durasi = '$durasi', keperluan = '$keperluan', alat = '$alatJSON', jumlah = '$jumlahJSON' WHERE id = '$id'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>window.alert('Data telah diperbarui di database.');
            window.location=('../../index.php?r=surat_peminjaman')</script>";
        } else {
            echo "<script>window.alert('Terjadi kesalahan saat memperbarui data: ');
            window.location=('../../index.php?r=edit_surat_peminjaman')</script>". $stmt->error;
        }

        $conn->close();
    }
}
?>
