<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Manajemen Alat dan Barang Laboratorium</h3>
                <p class="text-subtitle text-muted">
                    Data alat dan barang laboratorium jurusan Informatika Universitas Jenderal Soedirman.
                </p>
                <div class="buttons">
                    <a href="index.php?r=inventaris" class="btn btn-success">Kembali</a>
                </div>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            Inventarisasi
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Alat dan Barang
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Tambah
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
                        <h4 class="card-title">Tambah Inventaris</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="modul\inventarisasi\proses_inventaris.php" method="POST">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="id">Laboratorium</label>
                                            <select id="filter-laboratorium" class="form-control"
                                                name="id_laboratorium" required>
                                                <option value="" disabled selected hidden>---</option>
                                                <?php
                                                $sqllab = 'SELECT id, nama FROM laboratorium';
                                                $resultlab = $conn->query($sqllab);
                                                if ($resultlab->num_rows > 0) {
                                                    while ($rowlab = $resultlab->fetch_assoc()) {
                                                        echo '<option value="' . $rowlab['id'] . '">' . explode(' ', ucwords(strtolower($rowlab['nama'])))[1] . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama">Nama Alat/Barang</label>
                                            <input type="text" id="nama" class="form-control"
                                                placeholder="Nama Alat/Barang" name="nama" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="merk">Merk</label>
                                            <input type="text" id="merk" class="form-control"
                                                placeholder="Merk Alat/Barang" name="merk" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="spesifikasi">Spesifikasi</label>
                                            <input type="text" id="spesifikasi" class="form-control"
                                                name="spesifikasi" placeholder="Spesifikasi Alat/Barang" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="jumlah">Unit/Jumlah</label>
                                            <input type="number" id="jumlah" class="form-control" name="jumlah"
                                                placeholder="Unit/Jumlah dari Alat/Barang" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="fungsi">Fungsi Alat</label>
                                            <input type="text" id="fungsi" class="form-control" name="fungsi"
                                                placeholder="Fungsi Alat/Bahan" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="sumber">Sumber Dana</label>
                                            <input type="text" id="sumber" class="form-control" name="sumber"
                                                placeholder="Sumber Dana" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="tahun">Tahun Perolehan</label>
                                            <input type="text" id="tahun" class="form-control" name="tahun"
                                                placeholder="Tahun perolehan" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="kondisi">Kondisi</label>
                                            <select id="kondisi" name="kondisi" class="form-control" name="kondisi" required>
                                                <option value="" disabled selected hidden>---</option>
                                                <option value=0>Rusak</option>
                                                <option value=1>Berfungsi</option>
                                                <option value=2>Belum Berfungsi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="penggunaan">Penggunaan</label>
                                            <select id="penggunaan" name="penggunaan" class="form-control"
                                                name="penggunaan" required>
                                                <option value="" disabled selected hidden>---</option>
                                                <option value=1>Belum Digunakan</option>
                                                <option value=2>Sudah Digunakan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="keterangan">Keterangan</label>
                                            <input type="text" id="keterangan" class="form-control"
                                                name="keterangan" placeholder="Keterangan lain" value="-" />
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1" name="simpan">
                                            Simpan
                                        </button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                            Reset
                                        </button>
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
