        <div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Surat Bebas Laboratorium</h3>
                <p class="text-subtitle text-muted">
                Data surat bebas laboratorium jurusan Informatika Universitas Jenderal Soedirman.
                </p>
                <div class="buttons">
                      <a href="index.php?r=surat_bebas" class="btn btn-success">Kembali</a>
                </div>
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav
                  aria-label="breadcrumb"
                  class="breadcrumb-header float-start float-lg-end"
                >
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      Surat Bebas
                    </li>
                    <li class="breadcrumb-item active">
                      Lihat Surat
                    </li>
                    <li class="breadcrumb-item active">
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
                    <h4 class="card-title">Edit Surat Bebas</h4>
                  </div>
                  <?php
                    $id=$_GET['id'];
                    $sqledit = "select * from surat_bebas where no_surat = '".$id."'";
                    $hasiledit = $conn->query($sqledit);
                    $show = $hasiledit->fetch_assoc();
                  ?>
                  <div class="card-content">
                    <div class="card-body">
                      <form class="form form-horizontal" action="modul/surat_bebas/proses_surat_bebas.php" method="POST" target="_blank">
                        <div class="form-body">
                          <div class="row">
                            <div class="col-md-2">
                              <label>No Surat</label>
                            </div>
                            <div class="col-md-10 form-group">
                              <input
                                type="text"
                                id="noSurat"
                                class="form-control"
                                name="noSurat"
                                placeholder="No Surat"
                                value="<?php echo $show['no_surat'];?>"
                                readonly
                              />
                            </div>
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
                                value="<?php echo $show['nama'];?>"
                                required
                              />
                            </div>
                            <div class="col-md-2">
                              <label>NIM</label>
                            </div>
                            <div class="col-md-10 form-group">
                              <input
                                type="text"
                                id="NIM"
                                class="form-control"
                                name="NIM"
                                placeholder="NIM"
                                value="<?php echo $show['nim'];?>"
                                required
                              />
                            </div>
                            <div class="col-md-2">
                              <label>Judul Tugas Akhir</label>
                            </div>
                            <div class="col-md-10 form-group">
                              <input
                                type="text"
                                id="judul"
                                class="form-control"
                                name="judul"
                                placeholder="Judul Tugas Akhir"
                                value="<?php echo $show['judul'];?>"
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
                                value="<?php echo $show['tanggal'];?>"
                                required
                              />
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
                                name="edit" 
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