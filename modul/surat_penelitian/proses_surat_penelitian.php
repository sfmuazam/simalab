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
        $noSurat = $_POST["noSurat"];
        $nama = $_POST["nama"];
        $NIM = $_POST["NIM"];
        $judul = $_POST["judul"];
        $tanggalInput = $_POST['tanggal'];
        $namaDospem = $_POST['namaDospem'];
        $nipDospem = $_POST['nipDospem'];
        $namaBulan = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        // Mengonversi tanggal ke format "tanggal bulan tahun" dalam bahasa Indonesia
        $timestamp = strtotime($tanggalInput);
        $bulanTerformat = $namaBulan[date('n', $timestamp) - 1];
        $tahunTerformat = date('Y', $timestamp);

        // Konversi tanggal ke format "tanggal bulan tahun"
        $tanggalTerformat = date('j F Y', strtotime($tanggalInput));

        if (!empty($nama) && !empty($NIM) && !empty($judul)) {
            $pdf = new TCPDF();

            // Set margin kiri, kanan, dan atas menjadi 0
            $pdf->SetMargins(5, 0, 0);

            // Matikan fungsi auto page break
            $pdf->SetAutoPageBreak(false);

            $pdf->AddPage();
            $pdf->SetFont('times', '', 12);

            $pdf->SetXY(5, 10); // Atur posisi X dan Y header
            $pdf->SetFillColor(255, 255, 255); // Isi header dengan warna putih (255, 255, 255)
            $pdf->Cell(210, 20, '', 0, 0, 'C', 1); // Buat sel header dengan latar belakang putih
            

            // Tambahkan gambar logo
            $pdf->Image('../../logo.jpg', 20, 20, 25, 0, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);

            $kopSurat = "KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI\nUNIVERSITAS JENDERAL SOEDIRMAN\nFAKULTAS TEKNIK\nLABORATORIUM JURUSAN TEKNIK INFORMATIKA";

            // Mengukur lebar halaman
            $pageWidth = $pdf->GetPageWidth();

            // Mengukur lebar teks $kopSurat
            $kopWidth = $pdf->GetStringWidth($kopSurat);

            // Menghitung posisi X agar teks berada di tengah
            $kopX = ($pageWidth) / 22 ;

            $pdf->SetFont('times', 'B', 10); // Atur ukuran huruf yang sesuai
            $pdf->SetXY($kopX, $pdf->GetY());; // Atur posisi X agar teks berada di tengah
            $pdf->MultiCell(0, 10, $kopSurat, 0, 'C');
            $pdf->SetFont('times', '', 10); // Atur ukuran huruf yang sesuai
            $pdf->SetXY($kopX, $pdf->GetY());; // Atur posisi X agar teks berada di tengah
            $pdf->MultiCell(0, 10, "Jl. Mayjen Sungkono KM 5 Blater Purbalingga 53371 Telp/Fax. (0281) 6596700", 0, 'C');
            $pdf->SetFont('times', '', 11);
            $pdf->SetXY($kopX, $pdf->GetY()-5);; // Atur posisi X agar teks berada di tengah
            $pdf->MultiCell(0, 10, "Psw. 144 E-mail : teknik@unsoed.ac.id", 0, 'C');

            // Membuat garis bawah kop surat dengan ketebalan ganda
            $lineY = $pdf->GetY()-3; // Tentukan posisi Y untuk garis (sesuaikan dengan posisi teks)
            $pdf->SetLineWidth(1); // Set ketebalan garis (0.5 adalah ketebalan ganda)
            $pdf->Line(20, $lineY, 190, $lineY);
            $pdf->SetLineWidth(0.2); // Kembalikan ketebalan garis ke nilai default (0.2)




            $pdf->Ln(10); // Pindah ke baris berikutnya setelah kop surat


            $pdf->SetY(60);

            // Tambahkan teks center di bagian atas kertas
            $pdf->SetFont('times', 'BU', 14); // Mengatur teks menjadi tebal (B) dan bergaris bawah (U)
            $pdf->Cell(0, 10, "SURAT KETERANGAN SELESAI PENELITIAN", 0, 0, 'C'); // 'Surat' adalah teks yang akan ditampilkan di tengah atas
            $pdf->SetFont('times', '', 12); // Kembali ke jenis huruf biasa
            
            // Tambahkan kalimat di bawah 'Surat'
            $pdf->Cell(0, 0, '', 0, 1); // Tambahkan beberapa spasi kosong untuk menggeser teks ke atas
            $pdf->Cell(0, 10, $noSurat, 0, 1, 'C'); // Ganti teks kalimat sesuai kebutuhan

            $content = "Yang bertanda tangan dibawah ini Kepala Laboratorium Jurusan Teknik Informatika Fakultas Teknik Universitas Jenderal Soedirman menyatakan bahwa mahasiswa di bawah ini:
            ";

            $pdf->SetXY(20, $pdf->GetY());
            $pdf->MultiCell(170, 10, $content);

            // Definisikan lebar sel dalam tabel
            $cellWidth = 50; // Ganti dengan lebar yang sesuai dengan preferensi Anda
            $cellHeight = 10; // Lebar sel dalam tabel
            $cellBorder = 0; // Jenis garis sel dalam tabel
                    // Mengukur lebar halaman
            $pageWidth = $pdf->GetPageWidth();

            // Menghitung lebar tabel dan posisinya agar terletak di tengah halaman
            $tableWidth = $cellWidth * 3; // Lebar tabel sesuai dengan jumlah kolom
            $tableX = ($pageWidth - $tableWidth) / 2; // Posisi X agar berada di tengah

            // Memulai tabel di posisi X yang baru dihitung
            $pdf->SetX($tableX);

            // Baris 1
            $pdf->Cell(35, $cellHeight, 'Nama', $cellBorder);
            $pdf->Cell(5, $cellHeight, ':', $cellBorder);
            $pdf->Cell(110, $cellHeight, $nama, $cellBorder);
            $pdf->Ln(); // Pindah ke baris berikutnya

            // Memulai tabel di posisi X yang baru dihitung
            $pdf->SetX($tableX);

            // Baris 2
            $pdf->Cell(35, $cellHeight, 'NIM', $cellBorder);
            $pdf->Cell(5, $cellHeight, ':', $cellBorder);
            $pdf->Cell(110, $cellHeight, $NIM, $cellBorder);
            $pdf->Ln(); // Pindah ke baris berikutnya

            // Memulai tabel di posisi X yang baru dihitung
            $pdf->SetX($tableX);

            // Baris 3
            $pdf->Cell(35, $cellHeight, 'Judul Tugas Akhir', $cellBorder);
            $pdf->Cell(5, $cellHeight, ':', $cellBorder);
            $pdf->MultiCell(110, $cellHeight, $judul, $cellBorder, 1, 'L');
            $pdf->Ln(); // Pindah ke baris berikutnya


            $content = "Adalah mahasiswa Jurusan Teknik Informatika, Fakultas Teknik, Universitas Jenderal Soedirman dan dinyatakan
            ";

            $pdf->SetXY(20, $pdf->GetY()-10);
            $pdf->MultiCell(170, 10, $content);
            
            // Cetak kata "BEBAS" dalam format tebal
            $pdf->SetFont('times', 'B', 12);
            $yBebas = $pdf->GetY() - 10.5;
            $pdf->SetXY(50, $yBebas);
            $pdf->MultiCell(140, 10, 'telah selesai melaksanakan penelitian tugas akhir di Laboratorium');
            $pdf->SetXY(20, $yBebas+5);
            $pdf->MultiCell(60, 10, 'Jurusan Teknik Informatika ');
            
            // Kembalikan font ke ukuran normal
            $pdf->SetFont('times', '', 12);
            
            $content = "Fakultas Teknik Universitas Jenderal Soedirman.";
            $pdf->SetXY(80, $yBebas+5);
            $pdf->MultiCell(110, 10, $content);
            $content = "Demikian surat ini dibuat untuk dapat digunakan sebagaimana mestinya.";
            $pdf->SetXY(20, $pdf->GetY() - 4);
            $pdf->MultiCell(160, 10, $content);

            // Tambahkan tanggal di pojok kanan bawah
            $pdf->SetXY(125, $pdf->GetY()); // Atur posisi teks tanggal di pojok kanan bawah
            $tanggalSurat = "Purbalingga, ". date('j', $timestamp) . " " . $bulanTerformat . " " . $tahunTerformat; // Ganti dengan tanggal yang sesuai
            $pdf->Cell(60, 10, $tanggalSurat, 0, 1, 'C'); // Atur alignment menjadi 'C' untuk mencetak di tengah

            // Tambahkan kata 'Mengetahui,'
            $pdf->Cell(0, 10, 'Mengetahui,', 0, 1, 'C'); // Ganti teks sesuai kebutuhan
            $pdf->SetFont('times', '', 11);
            // Tambahkan tanda tangan di kanan dan kiri bawah
            $ttdKiri = "Pembimbing Tugas Akhir";
            $ttdKiriNama = $namaDospem ;
            $ttdKiriNip = "NIP ".$nipDospem ;
            $ttdTengah = "Kepala Lab Pemrograman";
            $ttdTengahNama = $kepalaLabPemrograman ;
            $ttdTengahNip = "NIP ".$nipKepalaLabPemrograman ;
            $ttdKanan = "Kepala Lab Jaringan";
            $ttdKananNama = $kepalaLabJaringan;
            $ttdKananNip = "NIP ".$nipKepalaLabJaringan;

            
            //tabel TTD
            $pdf->SetXY(25, $pdf->GetY());
    
            // Definisikan lebar sel dalam tabel
            $cellWidth = 55; // Ganti dengan lebar yang sesuai dengan preferensi Anda
            $cellHeight = 5; // Lebar sel dalam tabel
            $cellBorder = 0; // Jenis garis sel dalam tabel
                    // Mengukur lebar halaman
            $pageWidth = $pdf->GetPageWidth();
    
            // Menghitung lebar tabel dan posisinya agar terletak di tengah halaman
            $tableWidth = $cellWidth * 3; // Lebar tabel sesuai dengan jumlah kolom
            $tableX = ($pageWidth - $tableWidth) / 2; // Posisi X agar berada di tengah
            // $tableX = 5; // Posisi X agar berada di tengah
    
            // Memulai tabel di posisi X yang baru dihitung
            $pdf->SetX($tableX);
    
            // Baris 1
            $pdf->Cell($cellWidth, $cellHeight, $ttdKiri, $cellBorder);
            $pdf->Cell($cellWidth, $cellHeight, $ttdTengah, $cellBorder);
            $pdf->Cell($cellWidth, $cellHeight, $ttdKanan, $cellBorder);
            $pdf->Ln(); // Pindah ke baris berikutnya
            $pdf->Image($imagePathJaringan, 140, $pdf->GetY(), 0, 20, 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
            $pdf->Image($imagePathPemrograman, 70, $pdf->GetY(), 0, 20, 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
            
            // Memulai tabel di posisi X yang baru dihitung
            $pdf->SetX($tableX);

            // Baris 2
            $pdf->Cell($cellWidth, 20, '', $cellBorder);
            $pdf->Cell($cellWidth, 20, '', $cellBorder);
            $pdf->Cell($cellWidth, 20, '', $cellBorder);
            $pdf->Ln(); // Pindah ke baris berikutnya
            

            // Memulai tabel di posisi X yang baru dihitung
            $pdf->SetX($tableX);

            // Baris 2
            $pdf->SetFont('times', 'U', 11);
            $pdf->Cell($cellWidth, $cellHeight, $ttdKiriNama, $cellBorder);
            $pdf->Cell($cellWidth, $cellHeight, $ttdTengahNama, $cellBorder);
            $pdf->Cell($cellWidth, $cellHeight, $ttdKananNama, $cellBorder);
            $pdf->Ln(); // Pindah ke baris berikutnya

            // Memulai tabel di posisi X yang baru dihitung
            $pdf->SetX($tableX);
    
            // Baris 2
            $pdf->SetFont('times', '', 11);
            $pdf->Cell($cellWidth, $cellHeight, $ttdKiriNip, $cellBorder);
            $pdf->Cell($cellWidth, $cellHeight, $ttdTengahNip, $cellBorder);
            $pdf->Cell($cellWidth, $cellHeight, $ttdKananNip, $cellBorder);
            $pdf->Ln(); // Pindah ke baris berikutnya


            $pdf->Output('surat.pdf', 'I');

        }
    }
    
}

if (isset($_POST['simpan'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $noSurat = $_POST["noSurat"];
        $nama = $_POST["nama"];
        $NIM = $_POST["NIM"];
        $judul = $_POST["judul"];
        $tanggal = $_POST['tanggal'];
        $namaDospem = $_POST['namaDospem'];
        $nipDospem = $_POST['nipDospem'];

        $sql = "SELECT no_surat FROM surat_penelitian where no_surat='".$noSurat."'";
        $ceknoSurat = $conn->query($sql);
        if($ceknoSurat->num_rows > 0) {
            echo "<script>window.alert('Maaf Data Kode Sudah Ada');
            window.location=('../../index.php?r=buat_surat_penelitian')</script>";
        } else{
            // Siapkan pernyataan SQL INSERT
            $sql = "INSERT INTO surat_penelitian (no_surat, nama, nim, judul, tanggal, namaDospem, nipDospem) VALUES (?, ?, ?, ?, ?, ?, ?)";

            // Buat pernyataan persiapan
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                // Bind parameter dan jalankan pernyataan SQL
                $stmt->bind_param("sssssss", $noSurat, $nama, $NIM, $judul, $tanggal, $namaDospem, $nipDospem);

                if ($stmt->execute()) {
                    echo "<script>window.alert('Data telah disimpan ke database.');
                    window.location=('../../index.php?r=surat_penelitian')</script>";
                } else {
                    echo "<script>window.alert('Terjadi kesalahan saat menyimpan data: ');
                    window.location=('../../index.php?r=buat_surat_penelitian')</script>". $stmt->error;
                }
                
                // Tutup pernyataan
                $stmt->close();
            } else {
                echo "<script>window.alert('Terjadi kesalahan saat menyiapkan pernyataan: ');
                    window.location=('../../index.php?r=buat_surat_penelitian')</script>". $stmt->error;
            }
        }
    }
}

if (isset($_POST['edit'])) {
    require('../../vendor/autoload.php'); // Mengimpor autoloader TCPDF
    require('../../koneksi.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $noSurat = $_POST["noSurat"];
        $nama = $_POST["nama"];
        $NIM = $_POST["NIM"];
        $judul = $_POST["judul"];
        $tanggal = $_POST['tanggal'];
        $namaDospem = $_POST['namaDospem'];
        $nipDospem = $_POST['nipDospem'];

        // Siapkan pernyataan SQL UPDATE
        $sql = "UPDATE surat_penelitian SET nama = '$nama', nim = '$NIM', judul = '$judul', tanggal = '$tanggal', namaDospem = '$namaDospem', nipDospem = '$nipDospem' WHERE no_surat = '$noSurat'";

        // Jalankan pernyataan SQL UPDATE
        if (mysqli_query($conn, $sql)) {
            echo "<script>window.alert('Data telah disimpan ke database.');
            window.location=('../../index.php?r=surat_penelitian')</script>";
        } else {
            echo "<script>window.alert('Terjadi kesalahan saat memperbarui data: ');
            window.location=('../../index.php?r=edit_surat_penelitian')</script>" . mysqli_error($conn);
        }
    }
}
?>
