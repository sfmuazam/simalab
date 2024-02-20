<?php
require('../../koneksi.php');
if (isset($_POST['simpan'])) {
    $nip = $_POST["nip"];
    $nama = $_POST["nama"];
    $jabatan = $_POST["jabatan"];

    // Cek apakah data NIP sudah ada
    $sql = "SELECT nip FROM petugas WHERE nip = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nip);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>window.alert('Maaf, NIP sudah ada.');
              window.location=('../../index.php?r=tambah_petugas')</script>";
    } else {
        // File upload
        $ttd = $_FILES['ttd'];

        // Lokasi penyimpanan file
        $upload_dir = 'uploads/';

        // Nama file
        $ttd_name = $ttd['name'];
        $ttd_tmp_name = $ttd['tmp_name'];
        $ttd_path = $upload_dir . $ttd_name;

        // Pindahkan file ke direktori yang diinginkan
        if (move_uploaded_file($ttd_tmp_name, $ttd_path)) {
            // Simpan data ke database (gantilah dengan nama tabel dan kolom yang sesuai)
            $sql = "INSERT INTO petugas (nip, nama, jabatan, ttd) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                $stmt->bind_param("ssss", $nip, $nama, $jabatan, $ttd_name);
                
                if ($stmt->execute()) {
                    echo "<script>window.alert('Data telah disimpan ke database.');
                    window.location=('../../index.php?r=organisasi')</script>";
                } else {
                    echo "<script>window.alert('Terjadi kesalahan saat menyimpan data: " . $stmt->error . "');
                    window.location=('../../index.php?r=tambah_petugas')</script>";
                }

                $stmt->close();
            } else {
                echo "Terjadi kesalahan saat menyiapkan pernyataan: " . $conn->error;
            }
        } else {
            echo "<script>window.alert('Terjadi kesalahan saat menyiapkan pernyataan: " . $conn->error . "');
            </script>";
        }
    }
}
if (isset($_POST['submit'])) {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];

    // Cek apakah data NIP sudah ada
    $sql = "SELECT nip FROM petugas WHERE nip = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nip);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>window.alert('Maaf, NIP sudah ada.');
                window.location=('../../index.php?r=tambah_petugas')</script>";
    } else {

        // File upload
        $ttd = $_FILES['ttd'];

        // Lokasi penyimpanan file
        $upload_dir = '../../uploads/';

        // Nama file
        $ttd_name = $ttd['name'];
        $ttd_tmp_name = $ttd['tmp_name'];
        $ttd_path = $upload_dir . $ttd_name;

        // Pindahkan file ke direktori yang diinginkan
        if (move_uploaded_file($ttd_tmp_name, $ttd_path)) {
            // Simpan data ke database (gantilah dengan nama tabel dan kolom yang sesuai)
            $sql = "INSERT INTO petugas (nip, nama, jabatan, ttd) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                $stmt->bind_param("ssss", $nip, $nama, $jabatan, $ttd_name);
                
                if ($stmt->execute()) {
                    echo "<script>window.alert('Data telah disimpan ke database.');
                    window.location=('../../index.php?r=organisasi')</script>";
                } else {
                    echo "<script>window.alert('Terjadi kesalahan saat menyimpan data: " . $stmt->error . "');
                    window.location=('../../index.php?r=tambah_petugas')</script>";
                }

                $stmt->close();
            } else {
                echo "<script>window.alert('Terjadi kesalahan saat menyiapkan pernyataan: " . $conn->error . "');
            </script>";
            }
        } else {
            echo "<script>window.alert('Gagal mengunggah file tanda tangan." . $conn->error . "');
            </script>";
        }
    }
}
// if (isset($_POST['edit'])) {
//     if ($_SERVER["REQUEST_METHOD"] == "POST") {
//         $nip = $_POST["nip"];
//         $nama = $_POST["nama"];
//         $jabatan = $_POST["jabatan"];

//             // Siapkan pernyataan SQL UPDATE
//             $sql = "UPDATE petugas SET nama = ?, jabatan = ? WHERE nip = ?";


//             // Buat pernyataan persiapan
//             $stmt = $conn->prepare($sql);

//             if ($stmt) {
//                 // Bind parameter dan jalankan pernyataan SQL
//                 $stmt->bind_param("ssi", $nama, $jabatan, $nip);


//                 if ($stmt->execute()) {
//                     echo "<script>window.alert('Data telah disimpan ke database.');
//                     window.location=('../../index.php?r=organisasi')</script>";
//                 } else {
//                     echo "<script>window.alert('Terjadi kesalahan saat menyimpan data: ');
//                     window.location=('../../index.php?r=edit_petugas')</script>". $stmt->error;
//                 }

//                 // Tutup pernyataan
//                 $stmt->close();
//             } else {
//                 echo "<script>window.alert('Terjadi kesalahan saat menyiapkan pernyataan: ');
//                     window.location=('../../index.php?r=edit_petugas')</script>". $conn->error;
//             }
              
//     }
    
// }
// if (isset($_POST['edit'])) {
//     $nip = $_POST["nip"];
//     $nama = $_POST["nama"];
//     $jabatan = $_POST["jabatan"];

//     // File upload
//     $ttd = $_FILES['ttd'];

//     // Lokasi penyimpanan file
//     $upload_dir = '../../uploads/';

//     // Jika ada file yang diunggah, proses pembaruan gambar
//     if (!empty($ttd['name'])) {
//         $ttd_name = $ttd['name'];
//         $ttd_tmp_name = $ttd['tmp_name'];
//         $ttd_path = $upload_dir . $ttd_name;

//         // Pindahkan file ke direktori yang diinginkan
//         if (move_uploaded_file($ttd_tmp_name, $ttd_path)) {
//             // Siapkan pernyataan SQL UPDATE termasuk kolom gambar
//             $sql = "UPDATE petugas SET nama = ?, jabatan = ?, ttd = ? WHERE nip = ?";
//             $stmt = $conn->prepare($sql);

//             if ($stmt) {
//                 // Bind parameter dan jalankan pernyataan SQL
//                 $stmt->bind_param("ssss", $nama, $jabatan, $ttd_name, $nip);

//                 if ($stmt->execute()) {
//                     echo "<script>window.alert('Data telah disimpan ke database.');
//                     window.location=('../../index.php?r=organisasi')</script>";
//                 } else {
//                     echo "<script>window.alert('Terjadi kesalahan saat menyimpan data: " . $stmt->error . "');
//                     window.location=('../../index.php?r=edit_petugas')</script>";
//                 }

//                 // Tutup pernyataan
//                 $stmt->close();
//             } else {
//                 echo "<script>window.alert('Terjadi kesalahan saat menyiapkan pernyataan: " . $conn->error . "');
//                     window.location=('../../index.php?r=edit_petugas')</script>";
//             }
//         } else {
//             echo "<script>window.alert('Terjadi kesalahan saat mengunggah gambar.');
//                 </script>";
//         }
//     } else {
//         // Jika tidak ada gambar yang diunggah, proses pembaruan data tanpa mengubah gambar
//         $sql = "UPDATE petugas SET nama = ?, jabatan = ? WHERE nip = ?";
//         $stmt = $conn->prepare($sql);

//         if ($stmt) {
//             // Bind parameter dan jalankan pernyataan SQL
//             $stmt->bind_param("ssi", $nama, $jabatan, $nip);

//             if ($stmt->execute()) {
//                 echo "<script>window.alert('Data telah disimpan ke database.');
//                 window.location=('../../index.php?r=organisasi')</script>";
//             } else {
//                 echo "<script>window.alert('Terjadi kesalahan saat menyimpan data: " . $stmt->error . "');
//                 window.location=('../../index.php?r=edit_petugas')</script>";
//             }

//             // Tutup pernyataan
//             $stmt->close();
//         } else {
//             echo "<script>window.alert('Terjadi kesalahan saat menyiapkan pernyataan: " . $conn->error . "');
//                 window.location=('../../index.php?r=edit_petugas')</script>";
//         }
//     }
// }
if (isset($_POST['edit'])) {
    $nip = $_POST["nip"];
    $nama = $_POST["nama"];
    $jabatan = $_POST["jabatan"];

    // File upload
    $ttd = $_FILES['ttd'];

    // Lokasi penyimpanan file
    $upload_dir = '../../uploads/';

    // Jika ada file yang diunggah, proses pembaruan gambar
    if (!empty($ttd['name'])) {
        $ttd_name = $ttd['name'];
        $ttd_tmp_name = $ttd['tmp_name'];
        $ttd_path = $upload_dir . $ttd_name;

        // Ambil nama file lama
        $sql_get_old_filename = "SELECT ttd FROM petugas WHERE nip = ?";
        $stmt_get_old_filename = $conn->prepare($sql_get_old_filename);
        $stmt_get_old_filename->bind_param("s", $nip);
        $stmt_get_old_filename->execute();
        $stmt_get_old_filename->store_result();

        // Jika ada data, ambil nama file lama dan hapus file tersebut
        if ($stmt_get_old_filename->num_rows > 0) {
            $stmt_get_old_filename->bind_result($old_ttd);
            $stmt_get_old_filename->fetch();

            // Hapus gambar lama jika file tersebut ada
            if (!empty($old_ttd) && file_exists($upload_dir . $old_ttd)) {
                unlink($upload_dir . $old_ttd);
            }
        }

        // Pindahkan file ke direktori yang diinginkan
        if (move_uploaded_file($ttd_tmp_name, $ttd_path)) {
            // Siapkan pernyataan SQL UPDATE termasuk kolom gambar
            $sql = "UPDATE petugas SET nama = ?, jabatan = ?, ttd = ? WHERE nip = ?";
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                // Bind parameter dan jalankan pernyataan SQL
                $stmt->bind_param("ssss", $nama, $jabatan, $ttd_name, $nip);

                if ($stmt->execute()) {
                    echo "<script>window.alert('Data telah disimpan ke database.');
                    window.location=('../../index.php?r=organisasi')</script>";
                } else {
                    echo "<script>window.alert('Terjadi kesalahan saat menyimpan data: " . $stmt->error . "');
                    window.location=('../../index.php?r=edit_petugas')</script>";
                }

                // Tutup pernyataan
                $stmt->close();
            } else {
                echo "<script>window.alert('Terjadi kesalahan saat menyiapkan pernyataan: " . $conn->error . "');
                    window.location=('../../index.php?r=edit_petugas')</script>";
            }

            // Setelah proses update, Anda dapat menutup pernyataan yang digunakan untuk mendapatkan nama file lama
            $stmt_get_old_filename->close();
        } else {
            echo "<script>window.alert('Terjadi kesalahan saat mengunggah gambar.');
                window.location=('../../index.php?r=edit_petugas')</script>";
        }
    } else {
        // Jika tidak ada gambar yang diunggah, proses pembaruan data tanpa mengubah gambar
        $sql = "UPDATE petugas SET nama = ?, jabatan = ? WHERE nip = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Bind parameter dan jalankan pernyataan SQL
            $stmt->bind_param("ssi", $nama, $jabatan, $nip);

            if ($stmt->execute()) {
                echo "<script>window.alert('Data telah disimpan ke database.');
                window.location=('../../index.php?r=organisasi')</script>";
            } else {
                echo "<script>window.alert('Terjadi kesalahan saat menyimpan data: " . $stmt->error . "');
                window.location=('../../index.php?r=edit_petugas')</script>";
            }

            // Tutup pernyataan
            $stmt->close();
        } else {
            echo "<script>window.alert('Terjadi kesalahan saat menyiapkan pernyataan: " . $conn->error . "');
                window.location=('../../index.php?r=edit_petugas')</script>";
        }
    }
}

?>
