<?php

session_start();


date_default_timezone_set("America/Mexico_City");


include('libs/libConexion.php');

include('libs/libBusqueda.php');

$tipoUsu="";
$puest="";
if(isset($_SESSION["user"])&&!empty($_SESSION["user"])){
    $tipoUsu=buscarElementoClave("nombre","tbusuarios","usuario",$_SESSION["user"]);
    $puest=buscarElementoClave("puesto","tbempleados","nombre",$tipoUsu);
}

require_once "word/vendor/autoload.php";
use PhpOffice\PhpWord\Style\Language;
use PhpOffice\PhpWord\SimpleType\Jc;

$documento = new \PhpOffice\PhpWord\PhpWord();
$propiedades = $documento->getDocInfo();
$propiedades->setCreator("Chucho Lara");
$propiedades->setCompany("CETIS 15");
$propiedades->setTitle("Renuncia y Liquidación");
$propiedades->setDescription("Documento para redactar carta de renuncia y/o liquidaciones de empleados");
$propiedades->setCategory("Renuncias y Liquidaciones");
$propiedades->setLastModifiedBy("Chucho Lara");
$propiedades->setCreated(mktime(2));
$propiedades->setModified(mktime(3));
$propiedades->setSubject("Carta");
$propiedades->setKeywords("Renuncia Liquidacion r n");
# Para que no diga que se abre en modo de compatibilidad
$documento->getSettings()->setThemeFontLang(new Language("ES-MX"));
$seccion = $documento->addSection();
# Simple texto
# Con fuentes personalizadas
$textRun = $seccion->addTextRun([
    "alignment" => Jc::END,
    "lineHeight" => 1, # Quedará muy pegado
]);

$dia=date('d');
$mes="";
$mesNum=date('n');
$year=date('Y');
switch($mesNum)
{
    case 1:
        $mes="Enero";
    break;  
    
    case 2:
        $mes="Febrero";
    break;
        
    case 3:
        $mes="Marzo";
    break;
        
    case 4:
        $mes="Abril";
    break;
        
    case 5:
        $mes="Mayo";
    break;
        
    case 6:
        $mes="Junio";
    break;
        
    case 7:
        $mes="Julio";
    break;
        
    case 8:
        $mes="Agosto";
    break;
        
    case 9:
        $mes="Septiembre";
    break;
        
    case 10:
        $mes="Octubre";
    break; 
        
    case 11:
        $mes="Noviembre";
    break; 
        
    case 12:
        $mes="Diciembre";
    break;    
}
$fuente = [
    "name" => "Arial",
    "size" => 12,
    "color" => "000000",
    "italic" => false,
    "bold" => false,
];
$textRun->addText("H. Veracruz, Ver a ".$dia." de ".$mes." de ".$year,$fuente);
$textRun->addTextBreak(2);
$fuente1 = [
    "name" => "Arial",
    "size" => 12,
    "color" => "000000",
    "italic" => false,
    "bold" => true,
];
$fuente2 = [
    "name" => "Arial",
    "size" => 12,
    "color" => "000000",
    "italic" => true,
    "bold" => true,
];
$textRun1 = $seccion->addTextRun([
    "alignment" => Jc::START,
    "lineHeight" => 1, # Quedará muy pegado
]);
$textRun2 = $seccion->addTextRun([
    "alignment" => Jc::START,
    "lineHeight" => 1, # Quedará muy pegado
]);
$textRun3 = $seccion->addTextRun([
    "alignment" => Jc::START,
    "lineHeight" => 1, # Quedará muy pegado
]);
$textRun4 = $seccion->addTextRun([
    "alignment" => Jc::START,
    "lineHeight" => 1, # Quedará muy pegado
]);
$textRun5 = $seccion->addTextRun([
    "alignment" => Jc::START,
    "lineHeight" => 1, # Quedará muy pegado
]);
$textRun6 = $seccion->addTextRun([
    "alignment" => Jc::START,
    "lineHeight" => 1, # Quedará muy pegado
]);
$textRun7 = $seccion->addTextRun([
    "alignment" => Jc::CENTER,
    "lineHeight" => 1, # Quedará muy pegado
]);
$textRun8 = $seccion->addTextRun([
    "alignment" => Jc::CENTER,
    "lineHeight" => 1, # Quedará muy pegado
]);
$textRun9 = $seccion->addTextRun([
    "alignment" => Jc::CENTER,
    "lineHeight" => 1, # Quedará muy pegado
]);
$textRun1->addText("Sr.(a): ".$tipoUsu,$fuente1);
$textRun2->addText($puest,$fuente2);
$textRun2->addTextBreak(1);
$textRun3->addText("Presente:",$fuente);
$textRun3->addTextBreak(1);
$textRun4->addText("Por medio de la presente le comunico que, por convenir así a mis intereses particulares, con esta fecha he resuelto dar por terminada voluntariamente la relación laboral y/o contrato individual de trabajo que me unía con usted(es) en términos de la fracción I del artículo 53 de la Ley Federal de Trabajo.",$fuente);
$textRun4->addTextBreak(1);
$textRun5->addText("Le manifiesto expresamente que durante el tiempo que presté mis servicios, nunca sufrí riesgo de trabajo alguno, de igual modo a la fecha no se me adeuda prestación alguna de ningún tipo, y por último y en virtud de esta renuncia voluntaria no me reservo acción o derecho que ejercitar de ninguna naturaleza en el futuro, ni en contra suya ni de su negocio, ni de su representante legal, ni de ninguna otra persona que hubiere sido mi patrón.",$fuente);
$textRun5->addTextBreak(1);
$textRun6->addText("Ratificada que fue la presente en todas sus partes la firmo cruzando el texto y al calce para constancia.",$fuente);
$textRun6->addTextBreak(2);
$textRun7->addText("Atentamente",$fuente);
$textRun7->addTextBreak(2);
$textRun8->addText("____________________________",$fuente);
$textRun9->addText("Nombre ApellidoPaterno ApellidoMaterno",$fuente);
$documento->getCompatibility()->setOoxmlVersion(15);
# Idioma español de México

# Enviar encabezados para indicar que vamos a enviar un documento de Word
$nombre = "Carta de Renuncia.docx";
header("Content-Description: File Transfer");
header('Content-Disposition: attachment; filename="' . $nombre . '"');
header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('Content-Transfer-Encoding: binary');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Expires: 0');
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($documento, "Word2007");
# Y lo enviamos a php://output
$objWriter->save("php://output");

?>