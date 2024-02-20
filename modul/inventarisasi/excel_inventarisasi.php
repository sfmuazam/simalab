<?php

require '../../koneksi.php';
require '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();

$sql = 'SELECT * FROM laboratorium';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data dari setiap baris
    while ($row = $result->fetch_assoc()) {
        $id_lab = $row['id'];
        $namaLaboratorium = $row['nama']; // Anggap 'nama_laboratorium' adalah kolom yang berisi nama laboratorium
        $myWorkSheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, explode(' ', ucwords(strtolower($namaLaboratorium)))[1]);
        $spreadsheet->addSheet($myWorkSheet);

        $activeWorksheet = $spreadsheet->getSheetByName(explode(' ', ucwords(strtolower($namaLaboratorium)))[1]);

        $activeWorksheet->setCellValue('A2', 'FAKULTAS');
        $activeWorksheet->setCellValue('D2', ': TEKNIK');
        $activeWorksheet->setCellValue('A3', 'NAMA LABORATORIUM');
        $activeWorksheet->setCellValue('D3', ': ' . $namaLaboratorium);
        $activeWorksheet->setCellValue('A4', 'KAPASITAS LABORATORIUM');
        $activeWorksheet->setCellValue('D4', ': ' . $row['kapasitas']);
        $activeWorksheet->setCellValue('A5', 'PENANGGUNG JAWAB');
        $activeWorksheet->setCellValue('D5', ': ' . $row['penanggung_jawab']);

        $activeWorksheet->getStyle('A2')->getFont()->setBold(true);
        $activeWorksheet->getStyle('D2')->getFont()->setBold(true);
        $activeWorksheet->getStyle('A3')->getFont()->setBold(true);
        $activeWorksheet->getStyle('D3')->getFont()->setBold(true);
        $activeWorksheet->getStyle('A4')->getFont()->setBold(true);
        $activeWorksheet->getStyle('D4')->getFont()->setBold(true);
        $activeWorksheet->getStyle('A5')->getFont()->setBold(true);
        $activeWorksheet->getStyle('D5')->getFont()->setBold(true);

        // Menetapkan nilai untuk header tabel dari A7 sampai L7
        $headers = ['NO', 'Kode', 'Nama Alat', 'Merek', 'Spesifikasi', 'Unit/' . PHP_EOL . 'Jumlah', 'Fungsi Alat', 'Sumber ' . PHP_EOL .'Dana', 'Tahun' . PHP_EOL . 'Perolehan', 'Kon disi' . PHP_EOL . '*)', 'Penggunaan' . PHP_EOL . '**)', 'Keterangan' . PHP_EOL . '***)'];
        $column = 'A';
        foreach ($headers as $header) {
            $activeWorksheet->setCellValue($column . '7', $header);
            $column++;
        }

        // Membuat border untuk setiap cell dari A7 sampai L7
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];

        $activeWorksheet->getStyle('A7:L7')->applyFromArray($styleArray);

        // Membuat teks header bold dan word wrap
        $activeWorksheet->getStyle('A7:L7')->getFont()->setBold(true);
        $activeWorksheet->getStyle('A7:L7')->getAlignment()->setWrapText(true);

        // Menetapkan alignment tengah secara vertikal dan horizontal untuk header
        $activeWorksheet
            ->getStyle('A7:L7')
            ->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $activeWorksheet
            ->getStyle('A7:L7')
            ->getAlignment()
            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        // Query SQL untuk mengambil data dari tabel inventaris
        $sql2 = "SELECT * FROM inventaris WHERE id_laboratorium='$id_lab'";
        $result2 = $conn->query($sql2);

        $no = 0;
        $data = [];
        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) {
                $rowData = [$no, $row2['id'], $row2['nama'], $row2['merk'], $row2['spesifikasi'], $row2['jumlah'], $row2['fungsi'], $row2['sumber'], $row2['tahun'], $row2['kondisi'], $row2['penggunaan'], $row2['keterangan']];
                $data[] = $rowData;
                $no++;
            }
        } else {
            echo 'Tidak ada data inventaris.';
        }

        // Mulai dari baris ke-8
        $num_row = 8;
        foreach ($data as $rowData) {
            $column = 'A';
            foreach ($rowData as $cellValue) {
                $activeWorksheet->setCellValue($column . $num_row, $cellValue);
                $column++;
            }
            $num_row++;
        }

        // Menerapkan border di semua sisi untuk seluruh bagian tabel
        $highestRow = $activeWorksheet->getHighestRow();
        $activeWorksheet->getStyle('A7:L' . $highestRow)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ]);

        // Menetapkan alignment tengah secara vertikal dan horizontal pada kolom tertentu
        $columnsToCenter = ['A', 'B', 'F', 'I', 'J', 'K','L']; // Kolom No, Kode, Unit/Jumlah, Tahun Perolehan, Kondisi, Penggunaan
        foreach ($columnsToCenter as $columnID) {
            $activeWorksheet
                ->getStyle($columnID . '8:' . $columnID . $highestRow)
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $activeWorksheet
                ->getStyle($columnID . '8:' . $columnID . $highestRow)
                ->getAlignment()
                ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        }

        // Sekarang $row adalah baris setelah data terakhir
        // Tambahkan keterangan pada dua baris berikutnya
        $keteranganRow = $num_row + 1; // Tambah 1 untuk mendapatkan baris kosong setelah data
        $activeWorksheet->setCellValue('A' . $keteranganRow, '*)');
        $activeWorksheet->setCellValue('B' . $keteranganRow, 'rusak = O,  berfungsi = 1, belum berfungsi = 2');
        $activeWorksheet
            ->getStyle('A' . $keteranganRow . ':B' . $keteranganRow)
            ->getFont()
            ->setSize(10);
        $activeWorksheet
            ->getStyle('A' . $keteranganRow)
            ->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);

        $keteranganRow++; // Pindah ke baris berikutnya untuk detail keterangan
        $activeWorksheet->setCellValue('A' . $keteranganRow, '**)');
        $activeWorksheet->setCellValue('B' . $keteranganRow, 'belum digunakan = 1,  sudah digunakan = 2');
        $activeWorksheet
            ->getStyle('A' . $keteranganRow . ':B' . $keteranganRow)
            ->getFont()
            ->setSize(10);
        $activeWorksheet
            ->getStyle('A' . $keteranganRow)
            ->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);

        $keteranganRow++; // Pindah ke baris berikutnya untuk detail keterangan
        $activeWorksheet->setCellValue('A' . $keteranganRow, '***)');
        $activeWorksheet->setCellValue('B' . $keteranganRow, 'rincian kerusakan dan atau permasalahan');
        $activeWorksheet
            ->getStyle('A' . $keteranganRow . ':B' . $keteranganRow)
            ->getFont()
            ->setSize(10);
        $activeWorksheet
            ->getStyle('A' . $keteranganRow)
            ->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);

        // Menyesuaikan ukuran kolom agar sesuai dengan konten
        $activeWorksheet->getColumnDimension('C')->setAutoSize(true);

        foreach (range('E', 'H') as $columnID) {
            $activeWorksheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        foreach (range('J', 'L') as $columnID) {
            $activeWorksheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        // Setelah menambahkan keterangan sebelumnya
        $keteranganRow++; // Pindah ke baris berikutnya setelah keterangan sebelumnya

        // Menambahkan keterangan tambahan 5 baris di bawah tabel pada kolom I
        $keteranganTexts = ['Purbalingga, ' . date('F Y'), '', 'Mengetahui,', 'Kepala ' . ucwords(strtolower($namaLaboratorium)), '', '', '', $row['penanggung_jawab'], 'NIP.'];

        foreach ($keteranganTexts as $keteranganText) {
            $activeWorksheet->setCellValue('I' . $keteranganRow, $keteranganText);
            $activeWorksheet
                ->getStyle('I' . $keteranganRow)
                ->getFont()
                ->setSize(11);
            $activeWorksheet
                ->getStyle('I' . $keteranganRow)
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $keteranganRow++;
        }
    }
} else {
    echo 'Tidak ada data laboratorium.';
}

$sheetIndex = $spreadsheet->getIndex($spreadsheet->getSheetByName('Worksheet'));
$spreadsheet->removeSheetByIndex($sheetIndex);

$writer = new Xlsx($spreadsheet);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Inventarisasi Lab FT Unsoed.xlsx"');
header('Cache-Control: max-age=0');

$writer->save('php://output');

?>
