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
    ->setTitle('Empleados dados de alta')
    ->setSubject('Empleados')
    ->setDescription('Documento de reporte para empleados registrados en la aplicación')
    ->setKeywords('empleados empleado emple ado ados e m p l e a d o s')
    ->setCategory('empleado');

$spreadsheet->setActiveSheetIndex(0);
$spreadsheet->getActiveSheet()
    ->setTitle('Empleados existentes')
    ->setCellValue('A1','No.')
    ->setCellValue('B1','Clave')
    ->setCellValue('C1','Nombre Completo')//CD
    ->setCellValue('D1','Tel')//GH
    ->setCellValue('E1','CURP')//IJk
    ->setCellValue('F1','RFC')//LMN
    ->setCellValue('G1','Dirección')//OPQRS
    ->setCellValue('H1','Puesto')//WXY
    ->setCellValue('I1','Fecha de nacimiento')//AC1-AD1
    ->setCellValue('J1','Grado de estudios')//AE-AF
    ->setCellValue('K1','Género')//AG-AH
    ->setCellValue('L1','País de origen');//AI-AJ

    include('modelo/CEmpleado.php');
    $emple= new CEmpleado();
    $empleado=$emple->excelEmp();
    $i=0;
    foreach($empleado as $emp){
        $spreadsheet->setActiveSheetIndex(0);
        $spreadsheet->getActiveSheet()
        ->setCellValue('A'.($i+2),($i+1))
        ->setCellValue('B'.($i+2),$emp[0])
        ->setCellValue('C'.($i+2),$emp[1])
        ->setCellValue('D'.($i+2),$emp[2])
        ->setCellValue('E'.($i+2),$emp[3])
        ->setCellValue('F'.($i+2),$emp[4])
        ->setCellValue('G'.($i+2),$emp[5])
        ->setCellValue('H'.($i+2),$emp[7])
        ->setCellValue('I'.($i+2),$emp[8])
        ->setCellValue('J'.($i+2),$emp[9])
        ->setCellValue('K'.($i+2),$emp[10])
        ->setCellValue('L'.($i+2),$emp[11]);
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

header('Content-Disposition: attachment;filename="empleados.xlsx"');

$writer=IOFactory::createWriter($spreadsheet,"Xlsx");
$writer->save('php://output');