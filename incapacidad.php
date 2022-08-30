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
    ->setTitle('Incapacidades dadas de alta')
    ->setSubject('Incapacidades')
    ->setDescription('Documento de reporte para incapacidades registradas en la aplicación')
    ->setKeywords('incapacidades incapacidad inc incapaci dad i ')
    ->setCategory('incapacidad');

$spreadsheet->setActiveSheetIndex(0);
$spreadsheet->getActiveSheet()
    ->setTitle('Incapacidades existentes')
    ->setCellValue('A1','No.')
    ->setCellValue('B1','Clave')
    ->setCellValue('C1','Nombre')
    ->setCellValue('D1','Descuento');
 $spreadsheet->getActiveSheet()->mergeCells("D1:E1");

 include('modelo/CIncapacidad.php');
 $incapacidad = new CIncapacidad();
 $inca=$incapacidad->excelInc();
 $i=0;
 foreach($inca as $inc){
    $spreadsheet->setActiveSheetIndex(0);
    $spreadsheet->getActiveSheet()
    ->setCellValue('A'.($i+2),($i+1))
    ->setCellValue('B'.($i+2),$inc[0])
    ->setCellValue('C'.($i+2),$inc[1])
    ->setCellValue('D'.($i+2),$inc[2]."%");
    $spreadsheet->getActiveSheet()->mergeCells("D".($i+2).":E".($i+2));
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
$spreadsheet->getActiveSheet()->duplicateStyle($sharedStyle2, 'A1:E'.($i+2));
$i++;
 }


header('Content-Disposition: attachment;filename="incapacidades.xlsx"');

$writer=IOFactory::createWriter($spreadsheet,"Xlsx");
$writer->save('php://output');