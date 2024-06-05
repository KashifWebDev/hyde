<?php

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\IReadFilter;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

require 'vendor/phpoffice/phpspreadsheet/samples/Header.php';

$inputFileType = 'Xls';
$inputFileName = __DIR__ . '/file.xlsx';
echo $inputFileName;

class MyReadFilter implements IReadFilter
{
    public function readCell(string $columnAddress, int $row, string $worksheetName = ''): bool
    {
        // Read rows 9 to 15 and columns A to E only
        if ($row >= 23 && $row <= 70) {
            if (in_array($columnAddress, range('B', 'L'))) {
                return true;
            }
        }

        return false;
    }
}
$filterSubset = new MyReadFilter();

$helper->log('Loading file ' . pathinfo($inputFileName, PATHINFO_BASENAME) . ' using IOFactory with a defined reader type of ' . $inputFileType);
//$reader = IOFactory::createReader($inputFileType);
$reader = new Xlsx();
$helper->log('Loading all WorkSheets');
$reader->setLoadAllSheets();
$reader->setReadFilter($filterSubset);
$spreadsheet = $reader->load($inputFileName);

$helper->log($spreadsheet->getSheetCount() . ' worksheet' . (($spreadsheet->getSheetCount() == 1) ? '' : 's') . ' loaded');
$loadedSheetNames = $spreadsheet->getSheetNames();
foreach ($loadedSheetNames as $sheetIndex => $loadedSheetName) {
    $helper->log($sheetIndex . ' -> ' . $loadedSheetName);

    $spreadsheet->getSheetByName($loadedSheetName)->removeRow(1 , 22);
    $activeRange = $spreadsheet->getSheetByName($loadedSheetName)->calculateWorksheetDataDimension();
    $sheetData = $spreadsheet->getActiveSheet()->rangeToArray($activeRange, null, true, true, true);
    $helper->displayGrid($sheetData);
}

