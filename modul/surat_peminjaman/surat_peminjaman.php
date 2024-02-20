        <div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
              <h3>Surat Peminjaman</h3>
                <p class="text-subtitle text-muted">
                Data surat peminjaman laboratorium jurusan Informatika Universitas Jenderal Soedirman.
                </p>
                <div class="buttons">
                      <a href="index.php?r=lihat_surat_peminjaman" class="btn btn-success">Kembali</a>
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
                      Lihat Surat
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
          <?php
            if (isset($_POST['tgl1']) && isset($_POST['tgl2'])) {
              $var1 = $_POST['tgl1'];
              $var2 = $_POST['tgl2'];
              $tgl1 = str_replace('/', '-', $var1);
              $date1 = date('Y-m-d', strtotime($tgl1));
              $tgl2 = str_replace('/', '-', $var2);
              $date2 = date('Y-m-d', strtotime($tgl2));
              $rentang = $var1." Sampai ".$var2;
            
              $sqlkelas = "select * from surat_peminjaman where tanggal between '".$date1."' and '".$date2."' order by tanggal asc";
            } else {
              // Handle jika tgl1 atau tgl2 tidak diatur
              $sqlkelas = "select * from surat_peminjaman order by tanggal asc";
              $rentang = '';
            }
            
          ?>
          <!-- Basic Tables start -->
          <section class="section">
            <div class="card">
              <div class="card-header">Data surat peminjaman yang sudah dibuat <?php echo $rentang; ?></div>
              <div class="card-body">
                <table class="table" id="table-surat-peminjaman">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>No HP</th>
                            <th>Tanggal</th>
                            <th>Durasi Hari</th>
                            <th>Alat</th>
                            <th>Jumlah</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $resultkelas = $conn->query($sqlkelas);
                      if ($resultkelas->num_rows>0) {
                          while ($row = $resultkelas->fetch_assoc()) {
                              ?>
                                <tr>
                                    <td><?php echo $row['nama']; ?></td>
                                    <td><?php echo $row['nim']; ?></td>
                                    <td><?php echo $row['noHp']; ?></td>
                                    <td><?php echo $row['tanggal']; ?></td>
                                    <td><?php echo $row['durasi']; ?></td>
                                    <td><?php echo $row['alat']; ?></td>
                                    <td><?php echo $row['jumlah']; ?></td>
                                    <td class="text-center">
                                        <a href="index.php?r=edit_surat_peminjaman&id=<?php echo $row['id']; ?>" class="badge bg-warning m-2">Detail</a>
                                        <a href="././hapus.php?k=hapus_surat_peminjaman&id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin Hapus Surat <?php echo $row['nama']; ?>?')" class="badge bg-danger">Hapus</a>
                                    </td>
                                </tr>
                            <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
              </div>

            </div>
          </section>
          <!-- Basic Tables end -->
        </div>
        <script>
           // table serverside
           $('document').ready(function () {
            $('#table-surat-peminjaman').DataTable({
            dom: '<"container-fluid mt-3"<"row mb-1"<"col"l><"col"f>><"row"<"col"B>>>r<"mx-3"t><"container-fluid mb-5"<"row"<"col"i><"col"p>>>',
            orderCellsTop: true,
            buttons: [
            {
                extend: 'excel',
                title: 'Data surat peminjaman laboratorium jurusan Informatika Universitas Jenderal Soedirman.',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6]
                }
            },
            {
                extend: 'pdf',
                title: 'Data surat peminjaman laboratorium jurusan Informatika Universitas Jenderal Soedirman.',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6]
                }
            },
            {
                extend: 'print',
                title: 'Data surat peminjaman laboratorium jurusan Informatika Universitas Jenderal Soedirman.',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6]
                }
            }
          ],
            lengthMenu: [
                [10, 25, 50, -1],
                ['10', '25', '50', 'All']
            ],
            responsive: false,
            order: [[ 0, 'asc' ]]
          })
        })
        </script>