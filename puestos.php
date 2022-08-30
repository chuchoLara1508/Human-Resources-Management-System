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
    ->setTitle('Puestos dados de alta')
    ->setSubject('Puestos')
    ->setDescription('Documento de reporte para puestos registrados en la aplicación')
    ->setKeywords('puestos puesto pue tos p u e s t o s ')
    ->setCategory('puesto');

$spreadsheet->setActiveSheetIndex(0);
$spreadsheet->getActiveSheet()
    ->setTitle('Puestos existentes')
    ->setCellValue('A1','No.')
    ->setCellValue('B1','Clave')
    ->setCellValue('C1','Nombre')
    ->setCellValue('F1','Descripción')
    ->setCellValue('H1','Departamento')
    ->setCellValue('J1','Pago por hora')
    ->setCellValue('L1','ClaveDepto');;
$spreadsheet->getActiveSheet()->mergeCells("C1:E1");
$spreadsheet->getActiveSheet()->mergeCells("F1:G1");
$spreadsheet->getActiveSheet()->mergeCells("H1:I1");
$spreadsheet->getActiveSheet()->mergeCells("J1:K1");

include('modelo/CPuesto.php');
$puesto= new CPuesto();
$puestitos=$puesto->excelPuesto();
$i=0;
foreach($puestitos as $puest){
    $spreadsheet->setActiveSheetIndex(0);
    $spreadsheet->getActiveSheet()
    ->setCellValue('A'.($i+2),($i+1))
    ->setCellValue('B'.($i+2),$puest[0])
    ->setCellValue('C'.($i+2),$puest[1])
    ->setCellValue('F'.($i+2),$puest[2])
    ->setCellValue('H'.($i+2),$puest[3])
    ->setCellValue('J'.($i+2),"$".$puest[4])
    ->setCellValue('L'.($i+2),$puest[5]);
    $spreadsheet->getActiveSheet()->mergeCells("C".($i+2).":E".($i+2));
    $spreadsheet->getActiveSheet()->mergeCells("F".($i+2).":G".($i+2));
    $spreadsheet->getActiveSheet()->mergeCells("H".($i+2).":I".($i+2));
    $spreadsheet->getActiveSheet()->mergeCells("J".($i+2).":K".($i+2));
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
$spreadsheet->getActiveSheet()->duplicateStyle($sharedStyle2, 'A1:L'.($i+2));
$i++;
}

header('Content-Disposition: attachment;filename="puestos.xlsx"');

$writer=IOFactory::createWriter($spreadsheet,"Xlsx");
$writer->save('php://output');