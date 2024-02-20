<style>
    .table-container {
        overflow-x: auto;
    }
</style>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Manajemen Alat dan Barang Laboratorium</h3>
                <p class="text-subtitle text-muted">
                    Data alat dan barang laboratorium jurusan Informatika Universitas Jenderal Soedirman.
                </p>
                <div class="buttons">
                    <a href="index.php" class="btn btn-success">Kembali</a>
                    <a href="index.php?r=tambah_inventaris" class="btn btn-success">Tambah Data</a>
                    <a href="modul/inventarisasi/excel_inventarisasi.php" class="btn btn-success">Unduh Excel</a>
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
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">Data Informasi Inventaris Laboratorium </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="filter-laboratorium" class="col-sm-2 col-form-label">Laboratorium:</label>
                    <div class="col-sm-3">
                        <select id="filter-laboratorium" class="form-control">
                            <option value="">Semua</option>
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
                <div class="table-container">
                    <table class="table" id="table-inventaris">
                        <thead>
                            <tr>
                                <th>Lab</th>
                                <th>Alat/Barang</th>
                                <th>Merk</th>
                                <th>Spesifikasi</th>
                                <th>Unit</th>
                                <th>Sumber Dana</th>
                                <th>Tahun</th>
                                <th>Kondisi</th>
                                <th>Penggunaan</th>
                                <th>Keterangan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                    $sqlkelas = "select *, inventaris.id as id_alat, laboratorium.id as id_lab, laboratorium.nama as nama_lab, inventaris.nama as nama_alat from inventaris join laboratorium on inventaris.id_laboratorium=laboratorium.id";
                    $resultkelas = $conn->query($sqlkelas);
                    if ($resultkelas->num_rows>0) {
                        while ($row = $resultkelas->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo explode(' ', ucwords(strtolower($row['nama_lab'])))[1]; ?></td>
                                <td><?php echo $row['nama_alat']; ?></td>
                                <td><?php echo $row['merk']; ?></td>
                                <td><?php echo $row['spesifikasi']; ?></td>
                                <td><?php echo $row['jumlah']; ?></td>
                                <td><?php echo $row['sumber']; ?></td>
                                <td><?php echo $row['tahun']; ?></td>
                                <td>
                                    <?php
                                    $kondisi = $row['kondisi'];
                                    $kondisiText = '';
                                    
                                    switch ($kondisi) {
                                        case 0:
                                            $kondisiText = 'Rusak';
                                            break;
                                        case 1:
                                            $kondisiText = 'Berfungsi';
                                            break;
                                        case 2:
                                            $kondisiText = 'Belum Berfungsi';
                                            break;
                                        default:
                                            $kondisiText = '-';
                                            break;
                                    }
                                    
                                    echo $kondisiText;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $penggunaan = $row['penggunaan'];
                                    
                                    switch ($penggunaan) {
                                        case 1:
                                            echo 'Belum Digunakan';
                                            break;
                                        case 2:
                                            echo 'Sudah Digunakan';
                                            break;
                                        default:
                                            echo '-';
                                            break;
                                    }
                                    ?>
                                </td>
                                <td><?php echo $row['keterangan']; ?></td>
                                <td>
                                    <a href="index.php?r=edit_inventaris&id=<?php echo $row['id_alat']; ?>"
                                        class="badge bg-warning">Detail</a>
                                    <a href="././hapus.php?k=hapus_inventaris&id=<?php echo $row['id_alat']; ?>"
                                        onclick="return confirm('Yakin Hapus \'<?php echo $row['nama_alat']; ?>\' ?')"
                                        class="badge bg-danger">Hapus</a>
                                </td>
                            </tr><?php
                        }
                      }
                  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- Basic Tables end -->
</div>
<script>
    // table serverside
    $('document').ready(function() {
        $('#table-inventaris').DataTable({
            dom: '<"container-fluid mt-3"<"row mb-1"<"col"l><"col"f>><"row"<"col"B>>>r<"mx-3"t><"container-fluid mb-5"<"row"<"col"i><"col"p>>>',
            orderCellsTop: true,
            buttons: [{
                    extend: 'excel',
                    title: 'Data alat dan barang laboratorium jurusan Informatika Universitas Jenderal Soedirman.',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: 'pdf',
                    title: 'Data alat dan barang laboratorium jurusan Informatika Universitas Jenderal Soedirman.',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: 'print',
                    title: 'Data alat dan barang laboratorium jurusan Informatika Universitas Jenderal Soedirman.',
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
            order: [
                [0, 'asc']
            ]
        });

        $('#filter-laboratorium').change(function() {
            var selectedLaboratoriumText = $(this).find('option:selected').text();
            var table = $('#table-inventaris').DataTable();

            if (selectedLaboratoriumText !== 'Semua') {
                table.column(0).search(selectedLaboratoriumText).draw();
            } else {
                table.column(0).search('').draw();
            }
        });
    })
</script>
