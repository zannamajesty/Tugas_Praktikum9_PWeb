<?php //perintah php
include('koneksi.php'); //mengkoneksikan dengan file koneksi.php
require 'vendor/autoload.php'; //merequire file
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet(); //membuat objek dengan menggunakan class spreadsheet
$sheet = $spreadsheet->getActiveSheet();

//membuat isi pada cell excel
$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Nama');
$sheet->setCellValue('C1', 'Kelas');
$sheet->setCellValue('D1', 'Alamat');

//membuat variabel pada script
$query = mysqli_query($koneksi,"select * from tb_siswa");
$i = 2;
$no = 1;
while($row = mysqli_fetch_array($query))
{
	//membuat isi pada cell excel
	$sheet->setCellValue('A'.$i, $no++);
	$sheet->setCellValue('B'.$i, $row['nama']);
	$sheet->setCellValue('C'.$i, $row['kelas']);
	$sheet->setCellValue('D'.$i, $row['alamat']);
	$i++;
}

//membuat tampilan untuk mengatur border
$styleArray = [
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
			],
		];
$i = $i - 1;
$sheet->getStyle('A1:D'.$i)->applyFromArray($styleArray);

$writer = new Xlsx($spreadsheet);
$writer->save('Report Data Siswa.xlsx'); //menyimpan file report excel dengan nama Report Data Siswa.xlsx
?>