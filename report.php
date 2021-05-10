<?php //perintah php
require 'vendor/autoload.php'; //merequire file
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet(); //membuat objek dengan menggunakan class spreadsheet
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Hello World !'); //membuat isi pada cell excel

$writer = new Xlsx($spreadsheet);
$writer->save('hello world.xlsx'); //menyimpan file report excel dengan nama hello world.xlsx
?>