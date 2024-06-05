<?php
// ==================================================
//
// phpspreadsheet-Reading-Images-from-an-Excel-File
//
// Developer: Raja Rama Mohan Thavalam <rajaram.tavalam@gmail.com>
//
// ==================================================

use PhpOffice\PhpSpreadsheet\Reader\IReadFilter;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

require 'vendor/autoload.php';
$inputFileName = __DIR__ . '/file.xlsx';;
//class MyReadFilter implements IReadFilter
//{
//    public function readCell(string $columnAddress, int $row, string $worksheetName = ''): bool
//    {
//        // Read rows 9 to 15 and columns A to E only
//        if ($row >= 23 && $row <= 70) {
//            if (in_array($columnAddress, range('B', 'L'))) {
//                return true;
//            }
//        }
//
//        return false;
//    }
//}
//$filterSubset = new MyReadFilter();
//$reader = IOFactory::createReader($inputFileType);
$reader = new Xlsx();
//$reader->setLoadAllSheets();
//$reader->setReadFilter($filterSubset);
$spreadsheet = $reader->load($inputFileName);

$drawings = $spreadsheet->getActiveSheet()->getDrawingCollection();

foreach ($drawings as $drawing) {
    $coordinates = $drawing->getCoordinates();
//    echo $coordinates; continue;
    $drawing_path = $drawing->getPath();
    $extension = path_info($drawing->getPath(), PATHINFO_EXTENSION);
    echo $coordinates. ' ';
    echo $drawing_path. ' ';
    echo '<br>';
    $img_url = 1;
}
exit();
$loadedSheetNames = $spreadsheet->getSheetNames();
foreach ($loadedSheetNames as $sheetIndex => $loadedSheetName) {

    $spreadsheet->getSheetByName($loadedSheetName)->removeRow(1 , 22);
    $activeRange = $spreadsheet->getSheetByName($loadedSheetName)->calculateWorksheetDataDimension();
    $sheetData = $spreadsheet->getSheetByName($loadedSheetName)->rangeToArray($activeRange, null, true, true, true);


    exit();
    $worksheetArray = $sheetData;
    echo '<table style="width:100%"  border="1">';
    echo '<tr align="center">';
    echo '<td>Sno</td>';
    echo '<td>Name</td>';
    echo '<td>Image</td>';
    echo '</tr>';
    foreach ($worksheetArray as $key => $value) {
        print_r($value); continue;
        $worksheet = $spreadsheet->getActiveSheet();

        $drawing = $worksheet->getDrawingCollection()[$key];
        $zipReader = fopen($drawing->getPath(), 'r');
        $imageContents = '';
        while (!feof($zipReader)) {
            $imageContents .= fread($zipReader, 1024);
        }
        fclose($zipReader);
        $extension = $drawing->getExtension();

        echo '<tr align="center">';
        echo '<td>' . $value["B"] . '</td>';
        echo '<td>' . $value["C"] . '</td>';
        echo '<td>' . $value["D"] . '</td>';
        echo '<td>' . $value["E"] . '</td>';
        echo '<td><img height="150px" width="150px"   src="data:image/jpeg;base64,' . base64_encode($imageContents) . '"/></td>';
        echo '</tr>';
    }







//    $helper->displayGrid($sheetData);
    continue;
}























//$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("./file.xlsx");
//$worksheet = $spreadsheet->getActiveSheet();
//$worksheetArray = $worksheet->toArray();
//array_shift($worksheetArray);
//echo '<table style="width:100%"  border="1">';
//echo '<tr align="center">';
//echo '<td>Sno</td>';
//echo '<td>Name</td>';
//echo '<td>Image</td>';
//echo '</tr>';
//$imgs = $spreadsheet->getActiveSheet()->getDrawingCollection();
//
//
//foreach ($worksheetArray as $key => $value) {
//
//    $worksheet = $spreadsheet->getActiveSheet();
//    $drawing = $worksheet->getDrawingCollection()[$key];
//
//    $zipReader = fopen($drawing->getPath(), 'r');
//    $imageContents = '';
//    while (!feof($zipReader)) {
//        $imageContents .= fread($zipReader, 1024);
//    }
//    fclose($zipReader);
//    $extension = $drawing->getExtension();
//
//    echo '<tr align="center">';
//    echo '<td>' . $value[0] . '</td>';
//    echo '<td>' . $value[1] . '</td>';
//    echo '<td><img  height="150px" width="150px"   src="data:image/jpeg;base64,' . base64_encode($imageContents) . '"/></td>';
//    echo '</tr>';
