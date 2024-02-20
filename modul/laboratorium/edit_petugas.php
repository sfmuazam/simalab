<div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
              <h3>Organisasi</h3>
                <p class="text-subtitle text-muted">
                  Data Organisasi laboratorium jurusan Informatika Universitas Jenderal Soedirman.
                </p>
                <div class="buttons">
                      <a href="index.php?r=organisasi" class="btn btn-success">Kembali</a>
                </div>
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav
                  aria-label="breadcrumb"
                  class="breadcrumb-header float-start float-lg-end"
                >
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="index.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">
                      Organisasi
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Edit
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
                    <h4 class="card-title">Edit Data Petugas</h4>
                  </div>
                  <?php
                    $nip=$_GET['id'];
                    $sqledit = "select * from petugas where nip = '".$nip."'";
                    $hasiledit = $conn->query($sqledit);
                    $show = $hasiledit->fetch_assoc();
                  ?>
                  <div class="card-content">
                    <div class="card-body">
                      <!-- <form class="form form-horizontal" action="modul/laboratorium/proses_petugas.php" method="POST">
                        <div class="form-body">
                          <div class="row">
                            <div class="col-md-2">
                              <label>NIP</label>
                            </div>
                            <div class="col-md-10 form-group">
                              <input
                                type="text"
                                id="nip"
                                class="form-control"
                                name="nip"
                                placeholder="NIP Petugas"
                                value="<?php echo $show['nip'];?>"
                                readonly
                              />
                            </div>
                            <div class="col-md-2">
                              <label>Nama Lengkap</label>
                            </div>
                            <div class="col-md-10 form-group">
                              <input
                                type="text"
                                id="nama"
                                class="form-control"
                                name="nama"
                                placeholder="Nama Lengkap Petugas"
                                value="<?php echo $show['nama'];?>"
                                required
                              />
                            </div>
                            <div class="col-md-2">
                              <label>Jabatan</label>
                            </div>
                            <div class="col-md-10 form-group">
                              <input
                                type="text"
                                id="jabatan"
                                class="form-control"
                                name="jabatan"
                                placeholder="Jabatan di Laboratorium"
                                value="<?php echo $show['jabatan'];?>"
                                required
                              />
                            </div>
                            <div class="col-sm-12 d-flex justify-content-end">
                              <button
                                type="submit"
                                class="btn btn-primary me-1 mb-1"
                                name="edit" 
                              >
                              Simpan
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
                      </form> -->
                      <form class="form form-horizontal" action="modul/laboratorium/proses_petugas.php" method="POST" enctype="multipart/form-data">
    <div class="form-body">
        <div class="row">
            <div class="col-md-2">
                <label>NIP</label>
            </div>
            <div class="col-md-10 form-group">
                <input type="text" id="nip" class="form-control" name="nip" placeholder="NIP Petugas" value="<?php echo $show['nip']; ?>" readonly />
            </div>

            <div class="col-md-2">
                <label>Nama Lengkap</label>
            </div>
            <div class="col-md-10 form-group">
                <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama Lengkap Petugas" value="<?php echo $show['nama']; ?>" required />
            </div>

            <div class="col-md-2">
                <label>Jabatan</label>
            </div>
            <div class="col-md-10 form-group">
                <input type="text" id="jabatan" class="form-control" name="jabatan" placeholder="Jabatan di Laboratorium" value="<?php echo $show['jabatan']; ?>" required />
            </div>

            <div class="col-md-2">
                <label>Gambar</label>
            </div>
            <div class="col-md-10 form-group">
                <input type="file" id="ttd" class="form-control" name="ttd" accept="image/*">
                <small class="form-text text-muted">Pilih file gambar jika ingin mengganti tanda tangan.</small>
            </div>

            <div class="col-sm-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-1 mb-1" name="edit">Simpan</button>
                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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