        <div class="page-heading">
          <h3>Dashboard</h3>
        </div>
        <div class="page-content">
          <section class="row">
            <div class="col-12 col-lg-9">
            <?php
            // Include file koneksi.php
            include 'koneksi.php';

            // Fungsi untuk menghitung jumlah data dalam tabel
            function hitungJumlahData($conn, $tabel) {
                $query = "SELECT COUNT(*) as jumlah FROM $tabel";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
                return $row['jumlah'];
            }

            // Hitung jumlah data dalam masing-masing tabel
            $jumlahSuratBebas = hitungJumlahData($conn, 'surat_bebas');
            $jumlahSuratPeminjaman = hitungJumlahData($conn, 'surat_peminjaman');
            $jumlahSuratPenelitian = hitungJumlahData($conn, 'surat_penelitian');
            $jumlahInventaris = hitungJumlahData($conn, 'inventaris');

            ?>

              <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                  <div class="card">
                    <div class="card-body px-4 py-4-5">
                      <div class="row">
                        <div
                          class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
                        >
                          <div class="stats-icon purple mb-2">
                            <a href="index.php?r=surat_bebas">
                              <i class="bi-file-earmark-spreadsheet-fill"></i>
                            </a>
                          </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                          <h6 class="text-muted font-semibold">
                            Surat Bebas Laboratorium
                          </h6>
                          <h6 class="font-extrabold mb-0"><?php echo "$jumlahSuratBebas"; ?></h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                  <div class="card">
                    <div class="card-body px-4 py-4-5">
                      <div class="row">
                        <div
                          class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
                        >
                          <div class="stats-icon blue mb-2">
                          <a href="index.php?r=surat_peminjaman">
                              <i class="bi-file-earmark-spreadsheet-fill"></i>
                            </a>
                          </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                          <h6 class="text-muted font-semibold">Surat Peminjaman</h6>
                          <h6 class="font-extrabold mb-0"><?php echo "$jumlahSuratPeminjaman"; ?></h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                  <div class="card">
                    <div class="card-body px-4 py-4-5">
                      <div class="row">
                        <div
                          class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
                        >
                          <div class="stats-icon green mb-2">
                          <a href="index.php?r=surat_penelitian">
                              <i class="bi-file-earmark-spreadsheet-fill"></i>
                            </a>
                          </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                          <h6 class="text-muted font-semibold">Surat Selesai Penelitian</h6>
                          <h6 class="font-extrabold mb-0"><?php echo "$jumlahSuratPenelitian"; ?></h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                  <div class="card">
                    <div class="card-body px-4 py-4-5">
                      <div class="row">
                        <div
                          class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
                        >
                          <div class="stats-icon red mb-2">
                            <a href="index.php?r=inventaris">
                              <i class="bi-grid-fill"></i>
                            </a>
                          </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                          <h6 class="text-muted font-semibold">Inventaris Laboratorium</h6>
                          <h6 class="font-extrabold mb-0"><?php echo "$jumlahInventaris"; ?></h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-xl-6">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Surat Bebas Laboratorium</h4>
                    </div>
                    <div class="card-body">
                      <p class="card-text">
                        Daftar surat bebas terbaru
                      </p>
                      <div class="table-responsive">
                          <table class="table table-lg">
                            <thead>
                              <tr>
                                <th>No Surat</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                $sqlkelas = "select no_surat, nama, tanggal from surat_bebas order by tanggal desc limit 5";
                                $resultkelas = $conn->query($sqlkelas);
                                if ($resultkelas->num_rows>0) {
                                    while ($row = $resultkelas->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td>
                                              <?php echo $row['no_surat'];?>
                                            </td>
                                            <td>
                                              <?php echo $row['nama'];?>
                                            </td>
                                            <td>
                                              <?php echo $row['tanggal'];?>
                                            </td>
                                        </tr><?php
                                    }
                                  }
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="col-12 col-xl-6">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Surat Selesai Penelitian</h4>
                    </div>
                    <div class="card-body">
                      <p class="card-text">
                        Daftar surat selesai penelitian terbaru
                      </p>
                      <div class="table-responsive">
                          <table class="table table-lg">
                            <thead>
                              <tr>
                                <th>No Surat</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                $sqlkelas = "select no_surat, nama, tanggal from surat_penelitian order by tanggal desc limit 5";
                                $resultkelas = $conn->query($sqlkelas);
                                if ($resultkelas->num_rows>0) {
                                    while ($row = $resultkelas->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td>
                                              <?php echo $row['no_surat'];?>
                                            </td>
                                            <td>
                                              <?php echo $row['nama'];?>
                                            </td>
                                            <td>
                                              <?php echo $row['tanggal'];?>
                                            </td>
                                        </tr><?php
                                    }
                                  }
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-xl-6">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Surat Peminjaman</h4>
                    </div>
                    <div class="card-body">
                      <p class="card-text">
                        Daftar surat peminjaman alat dan barang laboratorium terbaru
                      </p>
                      <div class="table-responsive">
                          <table class="table table-lg">
                            <thead>
                              <tr>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Durasi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                $sqlkelas = "select nama, tanggal, durasi from surat_peminjaman order by tanggal desc limit 5";
                                $resultkelas = $conn->query($sqlkelas);
                                if ($resultkelas->num_rows>0) {
                                    while ($row = $resultkelas->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td>
                                              <?php echo $row['nama'];?>
                                            </td>
                                            <td>
                                              <?php echo $row['tanggal'];?>
                                            </td>
                                            <td>
                                              <?php echo $row['durasi'];?>
                                            </td>
                                        </tr><?php
                                    }
                                  }
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="col-12 col-xl-6">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Inventaris Laboratorium</h4>
                    </div>
                    <div class="card-body">
                      <p class="card-text">
                        Daftar inventaris laboratorium terbaru
                      </p>
                      <div class="table-responsive">
                          <table class="table table-lg">
                            <thead>
                              <tr>
                                <th>Nama</th>
                                <th>Merk</th>
                                <th>Jumlah</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                $sqlkelas = "select nama, merk, jumlah from inventaris limit 5";
                                $resultkelas = $conn->query($sqlkelas);
                                if ($resultkelas->num_rows>0) {
                                    while ($row = $resultkelas->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td>
                                              <?php echo $row['nama'];?>
                                            </td>
                                            <td>
                                              <?php echo $row['merk'];?>
                                            </td>
                                            <td>
                                              <?php echo $row['jumlah'];?>
                                            </td>
                                        </tr><?php
                                    }
                                  }
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-3">
                <?php
                    $query = "SELECT nama FROM petugas WHERE jabatan = 'Teknisi Laboratorium'"; // Ganti dengan query yang sesuai
                    $result = $conn->query($query);
                    if ($result) {
                        $row = $result->fetch_assoc();
                        $teknisi = $row['nama'];
                    } else {
                        echo "Kesalahan dalam menjalankan query: " . $conn->error;
                    }
                ?>
              <div class="card">
                <div class="card-body py-4 px-4">
                  <div class="d-flex align-items-center">
                    <div class="ms-3 name">
                      <h5 class="font-bold"><?php echo "$teknisi"; ?></h5>
                      <h6 class="text-muted mb-0">Teknisi Laboratorium</h6>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header">
                  <h4>Kepala Laboratorium</h4>
                </div>
                <div class="card-content pb-4">
                    <?php
                        $query = "SELECT nama, jabatan FROM petugas WHERE jabatan <> 'Teknisi Laboratorium'";
                        $result = $conn->query($query);
                        
                        if ($result) {
                        
                            while ($row = $result->fetch_assoc()) {
                                $nama = $row['nama'];
                                $jabatan = $row['jabatan'];
                                ?>
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="name ms-4">
                                    <h5 class="mb-1"><?php echo "$nama"; ?></h5>
                                    <h6 class="text-muted mb-0"><?php echo "$jabatan"; ?></h6>
                                    </div>
                                </div>
                                <?php
                            }
                        
                            // Proses data lebih lanjut jika diperlukan
                        } else {
                            echo "Kesalahan dalam menjalankan query: " . $conn->error;
                        }
                    ?>
                </div>
              </div>
            </div>
          </section>
        </div>
