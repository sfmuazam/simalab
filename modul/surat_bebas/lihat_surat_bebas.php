<div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Surat Bebas</h3>
                <p class="text-subtitle text-muted">
                  Data surat bebas laboratorium jurusan Informatika Universitas Jenderal Soedirman.
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
                      Surat Bebas
                    </li>
                    <li class="breadcrumb-item active">
                      Lihat Surat
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>

          <!-- Basic Tables start -->
          <section class="section">
            <div class="card">
              <div class="card-header">Data surat bebas yang sudah dibuat</div>
              <div class="card-body">
              <form class="form form-horizontal" action="index.php?r=surat_bebas" method="POST">
                        <div class="form-body">
                          <div class="row">
                            <div class="col-md-2">
                              <label>Dari</label>
                            </div>
                            <div class="col-md-10 form-group">
                              <input
                                type="date"
                                id="tgl1"
                                class="form-control"
                                name="tgl1"
                                value="<?php echo date('Y-m-d'); ?>"
                                required
                              />
                            </div>
                            <div class="col-md-2">
                              <label>Hingga</label>
                            </div>
                            <div class="col-md-10 form-group">
                              <input
                                type="date"
                                id="tgl2"
                                class="form-control"
                                name="tgl2"
                                value="<?php echo date('Y-m-d'); ?>"
                                required
                              />
                            </div>
                            <div class="col-sm-12 d-flex justify-content-end">
                              <button
                                type="submit"
                                class="btn btn-primary me-1 mb-1"
                                name="lihat" 
                              >
                              Lihat Surat
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
          </section>
          <!-- Basic Tables end -->
        </div>