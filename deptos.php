<?php

include('libs/libConexion.php');

require('excel/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;

$spreadsheet = new Spreadsheet();

$spreadsheet
    ->getProperties()
    ->setCreator("Chucho Lara")
    ->setLastModifiedBy('Chucho') // última vez modificado por
    ->setTitle('Departamentos dados de alta')
    ->setSubject('Departamentos')
    ->setDescription('Documento de reporte para departamentos registrados en la aplicación')
    ->setKeywords('depa departamentos de d e p a r t a ')
    ->setCategory('depa');

$spreadsheet->setActiveSheetIndex(0);
$spreadsheet->getActiveSheet()
    ->setTitle('Departamentos existentes')
    ->setCellValue('A1','No.')
    ->setCellValue('B1','Clave')
    ->setCellValue('C1','Nombre')
    ->setCellValue('F1','Descripción');
$spreadsheet->getActiveSheet()->mergeCells("C1:E1");
$spreadsheet->getActiveSheet()->mergeCells("F1:H1");

include('modelo/CDepartamento.php');
$usu= new CDepartamento();
$departamentos=$usu->excelDepto();
$i=0;
foreach($departamentos as $depto){
    $spreadsheet->setActiveSheetIndex(0);
    $spreadsheet->getActiveSheet()
    ->setCellValue('A'.($i+2),($i+1))
    ->setCellValue('B'.($i+2),$depto[0])
    ->setCellValue('C'.($i+2),$depto[1])
    ->setCellValue('F'.($i+2),$depto[2]);
    $spreadsheet->getActiveSheet()->mergeCells("C".($i+2).":E".($i+2));
    $spreadsheet->getActiveSheet()->mergeCells("F".($i+2).":H".($i+2));
    $sharedStyle2 = new Style();
$sharedStyle2->applyFromArray(
    ['fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['argb' => 'FFCCFFCC'],
            ],
            'borders' => [
                'bottom' => ['borderStyle' => Border::BORDER_THIN],
                'right' => ['borderStyle' => Border::BORDER_THIN],
            ],
        ]
);
$spreadsheet->getActiveSheet()->getStyle('A1:F'.($i+2))->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->duplicateStyle($sharedStyle2, 'A1:H'.($i+2));
    $i++;
}

header('Content-Disposition: attachment;filename="departamentos.xlsx"');

$writer=IOFactory::createWriter($spreadsheet,"Xlsx");
$writer->save('php://output');