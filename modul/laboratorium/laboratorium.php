        <div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Laboratorium</h3>
                <p class="text-subtitle text-muted">
                  Data laboratorium jurusan Informatika Universitas Jenderal Soedirman.
                </p>
                <div class="buttons">
                      <a href="index.php" class="btn btn-success">Kembali</a>
                      <a href="index.php?r=tambah_laboratorium" class="btn btn-success">Tambah Data</a>
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
                  </ol>
                </nav>
              </div>
            </div>
          </div>

          <!-- Basic Tables start -->
          <section class="section">
            <div class="card">
              <div class="card-header">Data Informasi Laboratorium </div>
              <div class="card-body">
                <table class="table" id="table-lab">
                  <thead>
                    <tr>
                      <th>Kode</th>
                      <th>Nama Laboratorium</th>
                      <th>Kapasitas</th>
                      <th>Penanggung Jawab</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $sqlkelas = "select id, nama, kapasitas, penanggung_jawab from laboratorium";
                    $resultkelas = $conn->query($sqlkelas);
                    if ($resultkelas->num_rows>0) {
                        while ($row = $resultkelas->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['nama'];?></td>
                                <td><?php echo $row['kapasitas'];?></td>
                                <td><?php echo $row['penanggung_jawab'];?></td>
                                <td>
                                  <a href="index.php?r=edit_laboratorium&id=<?php echo $row['id']?>"  class="badge bg-warning">Edit</a>
                                </td>
                                <td>
                                  <a href="././hapus.php?k=hapus_laboratorium&id=<?php echo $row['id']?>" onclick="return confirm('Yakin Hapus Kategori \'<?php echo $row['nama'];?>\' ?')" class="badge bg-danger">Hapus</a>
                                </td>
                            </tr><?php
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
            $('#table-lab').DataTable({
            dom: '<"container-fluid mt-3"<"row mb-1"<"col"l><"col"f>><"row"<"col"B>>>r<"mx-3"t><"container-fluid mb-5"<"row"<"col"i><"col"p>>>',
            orderCellsTop: true,
            buttons: [
            {
                extend: 'excel',
                title: 'Data laboratorium jurusan Informatika Universitas Jenderal Soedirman.',
                exportOptions: {
                    columns: [0, 1, 2, 3]
                }
            },
            {
                extend: 'pdf',
                title: 'Data laboratorium jurusan Informatika Universitas Jenderal Soedirman.',
                exportOptions: {
                    columns: [0, 1, 2, 3]
                }
            },
            {
                extend: 'print',
                title: 'Data laboratorium jurusan Informatika Universitas Jenderal Soedirman.',
                exportOptions: {
                    columns: [0, 1, 2, 3]
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