<div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
              <h3>Surat Selesai Penelitian</h3>
                <p class="text-subtitle text-muted">
                  Data surat selesai penelitian laboratorium jurusan Informatika Universitas Jenderal Soedirman.
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
                      Surat Selesai Penelitian
                    </li>
                    <li class="breadcrumb-item active">
                      Buat 
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
                    <h4 class="card-title">Formulir Surat Selesai Penelitian</h4>
                  </div>
                  <div class="card-content">
                    <div class="card-body">
                      <form class="form form-horizontal" action="modul/surat_penelitian/proses_surat_penelitian.php" method="POST" target="_blank">
                        <div class="form-body">
                          <div class="row">
                            <div class="col-md-2">
                              <label>No Surat</label>
                              <div class="small text-muted">
                                <em>No : 001/LAB-TIF/PEN/06/2016</em>
                              </div>
                            </div>
                            <div class="col-md-10 form-group">
                              <input
                                type="text"
                                id="noSurat"
                                class="form-control"
                                name="noSurat"
                                placeholder="No Surat"
                                required
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
                              <label>Pembimbing Tugas Akhir</label>
                            </div>
                            <div class="col-md-2">
                              <label>Nama</label>
                            </div>
                            <div class="col-md-10 form-group">
                              <input
                                type="text"
                                id="namaDospem"
                                class="form-control"
                                name="namaDospem"
                                placeholder="Nama Lengkap Dosen Pembimbing Tugas Akhir"
                                required
                              />
                            </div>
                            <div class="col-md-2">
                              <label>NIP</label>
                            </div>
                            <div class="col-md-10 form-group">
                              <input
                                type="text"
                                id="nipDospem"
                                class="form-control"
                                name="nipDospem"
                                placeholder="NIP Dosen Pembimbing Tugas Akhir"
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