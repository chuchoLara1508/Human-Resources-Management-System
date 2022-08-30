<?php
/********************************************************************************************************
**** LA SIGUIENTE FUNCI�N GENERA UNA CADENA ALEATORIA. RECIBE TRES ARGUMENTOS OBLIGATORIOS.			 ****
**** EL PRIMERO ES EL N�MERO M�NIMO DE CARACTERES QUE TENDR� LA CADENA. EL SEGUNDO ES EL			 ****
**** N�MERO M�XIMO DE CARACTERES QUE TENDR� LA CADENA Y EL TERCERO DETERMINA SI LAS LETRAS EMPLEADAS ****
**** SER�N SOLO MAY�SCULAS (X) O TAMBI�N MIN�SCULAS (x).											 ****
********************************************************************************************************/
	function getRandomString(){
/* Se requieren tres argumentos. Se determina el n�mero de estos y, si no es el adecuado,
se dispara un error fatal de usuario. */
		$numeroDeArgumentos = func_num_args();
		if ($numeroDeArgumentos != 2){
			echo "Esta funci�n requiere dos argumentos.<br />";
			trigger_error("Se necesitan dos argumentos.", E_USER_ERROR);
		} else {
/* Se cargan los argumentos en una matriz para trabajar con ellos como los elementos de la misma. */
			$argumentos = func_get_args();
/* Se convierten los dos primeros argumentos a enteros. Estos deben determinar el n�mero m�nimo
y m�ximo de caracteres que contendr� la cadena aleatoria. Deben ser valores enteros positivos. */
			settype($argumentos[0],"integer");
			settype($argumentos[1],"integer");
			$argumentos[0] = abs($argumentos[0]);
			$argumentos[1] = abs($argumentos[1]);
			$minimo = min($argumentos[0], $argumentos[1]);
			$maximo = max($argumentos[0], $argumentos[1]);
/* El n�mero m�nimo de caracteres debe ser menor o igual que el m�ximo. Si no, se dispara un error fatal. */
			if($minimo > $maximo){
				echo "El valor \'m&iacute;nimo\' tiene que ser menor o igual que el \'m&aacute;ximo\'.<br />";
				trigger_error("El valor \'m&iacute;nimo\' tiene que ser menor o igual que el \'m&aacute;ximo\'.", E_USER_ERROR);
			}
/* La longitud de la cadena quedar� comprendida entre los valores m�nimo y m�ximo. */
			$longitudDeCadena = rand($minimo, $maximo);
/* Se crea una matriz con todos los posibles caracteres a usar en la cadena aleatoria. */
			$matrizDeCaracteres = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9"); // 36 elementos.
			$elementos = 35;
/* Se inicializa la cadena y se crea mediante un bucle, que se repite tantos ciclos como caracteres
se ha determinado que tendr� la cadena. En cada ciclo se a�ade un nuevo caracter, extraido al azar 
de la matriz al efecto, a la cadena.*/
			$cadena = "";
			for ($contador = 0; $contador < $longitudDeCadena; $contador++){
				$elementoAleatorio = rand(0, $elementos);
				$cadena .= $matrizDeCaracteres[$elementoAleatorio];
			}
		}
/* Se devuelve la cadena como resultado de la funci�n. */
		return $cadena;
	}
/*************************************************************
**** AQU� ACABA LA FUNCI�N QUE GENERA CADENAS ALEATORIAS. ****
**************************************************************/
?>