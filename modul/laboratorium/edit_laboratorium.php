<div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Laboratorium</h3>
                <p class="text-subtitle text-muted">
                Data laboratorium jurusan Informatika Universitas Jenderal Soedirman.
                </p>
                <div class="buttons">
                      <a href="index.php?r=info_laboratorium" class="btn btn-success">Kembali</a>
                </div>
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav
                  aria-label="breadcrumb"
                  class="breadcrumb-header float-start float-lg-end"
                >
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      Laboratorium
                    </li>
                    <li class="breadcrumb-item active">
                      Info Laboratorium
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
                    <h4 class="card-title">Edit Data Laboratorium</h4>
                  </div>
                  <?php
                    $id=$_GET['id'];
                    $sqledit = "select * from laboratorium where id = '".$id."'";
                    $hasiledit = $conn->query($sqledit);
                    $show = $hasiledit->fetch_assoc();
                  ?>
                  <div class="card-content">
                    <div class="card-body">
                      <form class="form form-horizontal" action="modul/laboratorium/proses_laboratorium.php" method="POST">
                        <div class="form-body">
                          <div class="row">
                            <div class="col-md-3">
                              <label>Kode</label>
                            </div>
                            <div class="col-md-9 form-group">
                              <input
                                type="text"
                                id="id"
                                class="form-control"
                                name="id"
                                placeholder="Kode Laboratorium"
                                value="<?php echo $show['id'];?>"
                                readonly
                              />
                            </div>
                            <div class="col-md-3">
                              <label>Nama Laboratorium</label>
                            </div>
                            <div class="col-md-9 form-group">
                              <input
                                type="text"
                                id="nama"
                                class="form-control"
                                name="nama"
                                placeholder="Nama Laboratorium"
                                onkeyup="this.value = this.value.toUpperCase()" value="<?php echo $show['nama'];?>"
                                required
                              />
                            </div>
                            <div class="col-md-3">
                              <label>Kapasitas</label>
                            </div>
                            <div class="col-md-9 form-group">
                              <input
                                type="number"
                                id="kapasitas"
                                class="form-control"
                                name="kapasitas"
                                placeholder="Kapasitas Laboratorium"
                                onkeyup="this.value = this.value.toUpperCase()" value="<?php echo $show['kapasitas'];?>"
                                required
                              />
                            </div>
                            <div class="col-md-3">
                              <label>Penanggung Jawab</label>
                            </div>
                            <div class="col-md-9 form-group">
                              <select id="penanggung_jawab" name="penanggung_jawab" class="form-control" required>
                                  <?php
                                    $sql = "select nama from petugas";
                                    $hasil = $conn->query($sql);
                                    ?>
                                    <?php
                                    if ($hasil->num_rows>0) {
                                      while ($row = $hasil->fetch_assoc()) {
                                        if ($row['nama']==$show['penanggung_jawab']) {
                                        ?>
                                          <option value="<?php echo $show['penanggung_jawab'];?>" selected><?php echo $show['penanggung_jawab'];?></option>
                                        <?php
                                        }
                                        else{
                                          ?>
                                          <option value="<?php echo $row['nama'];?>"><?php echo $row['nama'];?></option>
                                          <?php
                                        }
                                      }
                                    }
                                  ?>
                              </select>
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
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- // Basic Horizontal form layout section end -->
        </div>