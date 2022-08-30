<?php
/* Se establece la cabecera para env�o de im�genes al navegador.*/
	header("Content-type: image/jpeg");
/* Se inicia la sesi�n. */
	session_start ();
	include_once("cadenas_aleatorias.php");
	$_SESSION["cadena"] = getRandomString(5, 10);
/* Se asigna la variable de sesion a una variable de trabajo. */
	$cadena = $_SESSION["cadena"];
/* Se genera un n�mero aleatorio para elegir un fondo para la imagen. */
	$numeroDeFondo = rand (1,3);
/* Se crea una matriz con tres colores definidos para el texto. En cada fondo seemplear� un color diferente. */
	$coloresDeTexto = array(1 => array("r" => 0, "g" => 0, "b" => 128), array("r" => 255, "g" => 204, "b" => 255), array("r" => 0, "g" => 0, "b" => 0));
/* Se calcula la longitud de la cadena menos cinco caracteres. Como la cadena podr� tener entre cinco
y diez caracteres, la siguiente variable adoptar� un valor entre cero y cinco. Esta variable se usar�
para calcular el posicionamiento horizontal de la cadena en la imagen.*/
	$longitudCadena = strlen($cadena) - 5;
/* Se abre una imagen con el fondo elegido aleatoriamente. */
	$imagenFondo = "../imagenes/fondos/fondo_".$numeroDeFondo.".jpg";
// Se crea un manejador para una imagen.
	$imagenJPG = imagecreatefromjpeg ($imagenFondo);
/* Como ya se sabe el fondo que se pondr�, se elige el color adecuado para el texto y se incorpora a la paleta. */
	$colorDeCadena = imagecolorallocate ($imagenJPG, $coloresDeTexto[$numeroDeFondo]["r"], $coloresDeTexto[$numeroDeFondo]["g"], $coloresDeTexto[$numeroDeFondo]["b"]);
/* Se determinan las propiedades de texto para incorporar la cadena a la imagen.*/
	$talla = 30;
	$angulo = rand(-18,18);
	$x = 65 - ($longitudCadena*12);
	$y = 60 + ($angulo*2);
	$fuente = "../fuentes/courier.ttf"; // Letra de ancho fijo.
/* Se monta la cadena sobre la imagen. */
	imagettftext($imagenJPG, $talla, $angulo, $x, $y, $colorDeCadena, $fuente, $cadena);
/* Se trazan 20 l�neas aleatorias para "ensuciar" la imagen. */
	for ($contador = 1; $contador <= 20; $contador ++){
		$xOrigen = rand(0,249);
		$yOrigen = rand(0,99);
		$xFinal = rand(0,249);
		$yFinal = rand(0,99);
		imageline ($imagenJPG, $xOrigen, $yOrigen, $xFinal, $yFinal, $colorDeCadena);
	}
// Se env�a la imagen al navegador.
	imagejpeg($imagenJPG);
// Se liberan recursos.
	imagedestroy($imagenJPG);
?>
