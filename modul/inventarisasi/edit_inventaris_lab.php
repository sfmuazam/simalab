<div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Manajemen Alat dan Barang Laboratorium</h3>
                <p class="text-subtitle text-muted">
                Data alat dan barang per laboratorium jurusan Informatika Universitas Jenderal Soedirman.
                </p>
                <div class="buttons">
                      <a href="index.php?r=inventarisLab" class="btn btn-success">Kembali</a>
                </div>
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav
                  aria-label="breadcrumb"
                  class="breadcrumb-header float-start float-lg-end"
                >
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      Inventarisasi
                    </li>
                    <li class="breadcrumb-item active">
                      Alat dan Barang Laboratorium
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Edit
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>

        <!-- // Basic multiple Column Form section start -->
        <section id="multiple-column-form">
            <div class="row match-height">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Edit Inventaris Laboratorium</h4>
                  </div>
                  <?php
                    $id=$_GET['id'];
                    $sqledit = "select * from inventaris_lab where id = '".$id."'";
                    $hasiledit = $conn->query($sqledit);
                    $show = $hasiledit->fetch_assoc();
                  ?>
                  <div class="card-content">
                    <div class="card-body">
                      <form class="form form-horizontal" action="modul/inventarisasi/proses_inventaris_lab.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $show['id']; ?>">
                        <input type="hidden" name="idLab" value="<?php echo $show['id_laboratorium']; ?>">
                        <div class="form-body">
                          <div class="row">
                            <div class="col-md-3">
                              <label>Lokasi</label>
                            </div>
                            <div class="col-md-9 form-group">
                                <select id="idLab" name="idLab" class="choices form-select" required disabled>
                                    <option value=""></option>
                                    <?php
                                    $sql = "select id, nama from laboratorium";
                                    $hasil = $conn->query($sql);
                                    if ($hasil->num_rows > 0) {
                                        while ($row = $hasil->fetch_assoc()) {
                                            $selected = ($row['id'] == $show['id_laboratorium']) ? 'selected' : '';
                                            ?>
                                            <option value="<?php echo $row['id']; ?>" <?php echo $selected; ?>><?php echo $row['nama']; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                              <label>Alat/Bahan</label>
                            </div>
                            <div class="col-md-9 form-group">
                                <select id="idAlat" name="idAlat" class="choices form-select" required>
                                    <?php
                                    $sql = "select id, nama, merk, spesifikasi, tahun from inventaris";
                                    $hasil = $conn->query($sql);
                                    if ($hasil->num_rows > 0) {
                                        while ($row = $hasil->fetch_assoc()) {
                                            $selected = ($row['id'] == $show['id_alat']) ? 'selected' : '';
                                            ?>
                                            <option value="<?php echo $row['id']; ?>" <?php echo $selected; ?>>
                                                <?php echo $row['nama']; ?> -
                                                <?php echo $row['merk']; ?> -
                                                <?php echo $row['spesifikasi']; ?> -
                                                <?php echo $row['tahun']; ?>
                                            </option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                              <label>Jumlah</label>
                            </div>
                            <div class="col-md-9 form-group">
                              <input
                                type="number"
                                id="jumlah"
                                class="form-control"
                                name="jumlah"
                                placeholder="Jumlah"
                                value="<?php echo $show['jumlah'];?>"
                                required
                              />
                            </div>
                            <div class="col-md-3">
                              <label>Keterangan</label>
                            </div>
                            <div class="col-md-9 form-group">
                              <input
                                  type="text"
                                  id="keterangan"
                                  class="form-control"
                                  name="keterangan"
                                  placeholder="Keterangan lain"
                                  value="<?php echo $show['keterangan'];?>"
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
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>
        <!-- // Basic multiple Column Form section end -->
</div>