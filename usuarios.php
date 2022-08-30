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
    ->setTitle('Usuarios dados de alta')
    ->setSubject('Usuarios')
    ->setDescription('Documento de reporte para usuarios registrados en la aplicación')
    ->setKeywords('usuarios usuario usu ario u s u a r i o ')
    ->setCategory('usuario');

$spreadsheet->setActiveSheetIndex(0);
$spreadsheet->getActiveSheet()
    ->setTitle('Puestos existentes')
    ->setCellValue('A1','No.')
    ->setCellValue('B1','Clave')
    ->setCellValue('C1','Correo electrónico')//C1-D1-E1
    ->setCellValue('D1','Usuario')//F1-G1
    ->setCellValue('E1','Nombre Empleado');//K1-L1-M1

    include('modelo/CUsuario.php');
    $usuarios= new CUsuario();
    $usuario=$usuarios->excelUsu();
    $i=0;
    foreach($usuario as $usu){
        $spreadsheet->setActiveSheetIndex(0);
        $spreadsheet->getActiveSheet()
        ->setCellValue('A'.($i+2),($i+1))
        ->setCellValue('B'.($i+2),$usu[0])
        ->setCellValue('C'.($i+2),$usu[5])
        ->setCellValue('D'.($i+2),$usu[3])
        ->setCellValue('E'.($i+2),$usu[2]);
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
        $spreadsheet->getActiveSheet()->duplicateStyle($sharedStyle2, 'A1:F'.($i+2));
        $i++;
    }
header('Content-Disposition: attachment;filename="usuarios.xlsx"');

$writer=IOFactory::createWriter($spreadsheet,"Xlsx");
$writer->save('php://output');