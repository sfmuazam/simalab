        <div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
              <h3>Surat Peminjaman</h3>
                <p class="text-subtitle text-muted">
                Data surat peminjaman laboratorium jurusan Informatika Universitas Jenderal Soedirman.
                </p>
                <div class="buttons">
                      <a href="index.php" class="btn btn-success">Kembali</a>
                </div>
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav
                  aria-label="breadcrumb"
                  class="breadcrumb-header float-start float-lg-end"
                >
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      Surat Peminjaman
                    </li>
                    <li class="breadcrumb-item active">
                      Tambah
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>

          <!-- Basic Horizontal form layout section start -->
          <section id="basic-horizontal-layouts">
            <div class="row match-height">
              <div>
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Formulir Surat Peminjaman</h4>
                  </div>
                  <div class="card-content">
                    <div class="card-body">
                      <form class="form form-horizontal" action="modul\surat_peminjaman\proses_surat_peminjaman.php" method="POST">
                        <div class="form-body">
                          <div class="row">
                            <div class="col-md-2">
                              <label>Nama</label>
                            </div>
                            <div class="col-md-10 form-group">
                              <input
                                type="text"
                                id="nama"
                                class="form-control"
                                name="nama"
                                placeholder="Nama"
                                required
                              />
                            </div>
                            <div class="col-md-2">
                              <label>NIM/NIP</label>
                            </div>
                            <div class="col-md-10 form-group">
                              <input
                                type="text"
                                id="NIM"
                                class="form-control"
                                name="NIM"
                                placeholder="NIM"
                                required
                              />
                            </div>
                            <div class="col-md-2">
                              <label>No Telp/HP</label>
                            </div>
                            <div class="col-md-10 form-group">
                              <input
                                type="text"
                                id="noHp"
                                class="form-control"
                                name="noHp"
                                placeholder="No Telp/HP yang bisa dihubungi"
                                required
                              />
                            </div>
                            <div class="col-md-2">
                              <label>Tanggal</label>
                            </div>
                            <div class="col-md-10 form-group">
                              <input
                                type="date"
                                id="tanggal"
                                class="form-control"
                                name="tanggal"
                                value="<?php echo date('Y-m-d'); ?>"
                                required
                              />
                            </div>
                            <div class="text-center m-2">
                              <label>Informasi Peminjaman</label>
                            </div>
                            <div class="col-md-2">
                              <label>Peminjaman</label>
                            </div>
                            <div class="col-md-10 form-group">
                              <input
                                type="date"
                                id="pinjam"
                                class="form-control"
                                name="pinjam"
                                value="<?php echo date('Y-m-d'); ?>"
                                required
                              />
                            </div>
                            <div class="col-md-2">
                              <label>Pengembalian</label>
                            </div>
                            <div class="col-md-10 form-group">
                              <input
                                type="date"
                                id="kembali"
                                class="form-control"
                                name="kembali"
                                value="<?php echo date('Y-m-d'); ?>"
                                required
                              />
                            </div>
                            <div class="col-md-2">
                              <label>Durasi Hari</label>
                            </div>
                            <div class="col-md-10 form-group">
                              <input
                                type="number"
                                id="durasi"
                                class="form-control"
                                name="durasi"
                                required
                              />
                            </div>
                            <div class="col-md-2">
                              <label>Keperluan</label>
                            </div>
                            <div class="col-md-10 form-group">
                              <input
                                type="text"
                                id="keperluan"
                                class="form-control"
                                name="keperluan"
                                required
                              />
                            </div>
                            <div class="col-md-2">
                              <label>Alat dan Jumlah</label>
                            </div>
                            <div class="col-md-10 form-group" id="alatContainer">
                              <div class="input-group mb-3">
                                <!-- <input
                                  type="text"
                                  class="form-control"
                                  name="alat[]"
                                  placeholder="Nama Alat"
                                  required
                                /> -->
                                <input id="idAlat" name="alat[]" class="PosisiAlat form-control" required>
                                
                                
                                <input
                                  type="number"
                                  class="form-control"
                                  name="jumlah[]"
                                  placeholder="Jumlah Alat"
                                  required
                                />
                                <button class="btn btn-outline-secondary" type="button" onclick="addFields()">Tambah</button>
                              </div>
                            </div>
                            <script>
                              function addFields() {
                                var alatContainer = document.getElementById('alatContainer');
                                var newAlatInput = document.createElement('div');
                                newAlatInput.className = 'input-group mb-3';
                                newAlatInput.innerHTML = `
                                <select id="idAlat" name="alat[]" class="PosisiAlat form-control" required>
                                  <?php
                                  $sql = "select id, nama, merk, spesifikasi, tahun from inventaris";
                                  $hasil = $conn->query($sql);
                                  if ($hasil->num_rows>0) {
                                    while ($row = $hasil->fetch_assoc()) {
                                      ?>
                                      <option value="<?php echo $row['nama'];?>">
                                        <?php echo $row['nama'];?> -
                                        <?php echo $row['merk'];?> -
                                        <?php echo $row['spesifikasi'];?> -
                                        <?php echo $row['tahun'];?>
                                      </option>
                                      <?php
                                    }
                                  }
                                  ?>
                              </select>
                                  <input type="number" class="form-control" name="jumlah[]" required />
                                  <button class="btn btn-outline-secondary" type="button" onclick="removeField(this)">Hapus</button>
                                `;
                                alatContainer.appendChild(newAlatInput);
                              }

                              function removeField(button) {
                                // Remove the parent div when "Hapus" button is clicked
                                button.parentNode.remove();
                              }
                            </script>
                            <script>
                                function hitungDurasi() {
                                    // Ambil nilai tanggal peminjaman dan pengembalian
                                    var tanggalPinjam = new Date(document.getElementById('pinjam').value);
                                    var tanggalKembali = new Date(document.getElementById('kembali').value);

                                    // Hitung selisih hari
                                    var selisihHari = (tanggalKembali - tanggalPinjam) / (1000 * 3600 * 24);

                                    // Update nilai durasi
                                    document.getElementById('durasi').value = selisihHari.toFixed(); // Menyederhanakan durasi menjadi bilangan bulat
                                }

                                // Pemanggilan fungsi saat ada perubahan pada input tanggal peminjaman dan pengembalian
                                document.getElementById('pinjam').addEventListener('input', hitungDurasi);
                                document.getElementById('kembali').addEventListener('input', hitungDurasi);
                            </script>
                            </div>
                            <div class="col-sm-12 d-flex justify-content-end">
                              <button
                                type="submit"
                                class="btn btn-primary me-1 mb-1"
                                name="generate" 
                              >
                              Lihat Surat
                              </button>
                              <button
                                type="submit"
                                class="btn btn-primary me-1 mb-1"
                                name="simpan" 
                              >
                              Simpan Surat
                              </button>
                              <button
                                type="reset"
                                class="btn btn-light-secondary me-1 mb-1"
                              >
                                Reset
                              </button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- // Basic Horizontal form layout section end -->
        </div>