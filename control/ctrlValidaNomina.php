<?php
    $error="";
    if(isset($_REQUEST['buscarClv'])){
        if(isset($_POST["clave"])&&!empty($_POST["clave"])){ 
            //buscar la informacion que se pueda colocar en formulario
            if(!noRepetirValor($_POST["clave"],"tbempleados","clave")){
                include('vistas/vistNominaE.php');
            }
            else{
                $error="La clave no está registrada";
                include('vistas/vistNomina.php');
            }
        }
        else{
            $error="Ingrese una clave";
            include('vistas/vistNomina.php');
        }
    }
    else{
        include('vistas/vistNomina.php');
    }

?>