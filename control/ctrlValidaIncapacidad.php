<?php
$error=""; $registro="";
    if(isset($_REQUEST["registroInc"])){
        if(isset($_POST["nombreInc"])&&!empty($_POST["nombreInc"])){ 
            if(isset($_POST["descInc"])){
                if(noRepetirValor($_POST["nombreInc"],"tbincapacidades","nombre")){
                    $inc=new CIncapacidad();
                    $inc->clave=palealea(5);
                    $inc->nombre=$_POST["nombreInc"];
                    if(empty($_POST["descInc"])){
                        $inc->desc=0;
                    }
                    else{
                        $inc->desc=$_POST["descInc"];
                    }
                    if($inc->creaInc()){
                        $registro="Incapacidad registrada con éxito!";
                    }
                    else{
                        $error.="Ocurrió un error al agregar";
                    }
                }
                else{
                    $error.="La incapacidad ya existe. No registrada";
                }       
            }
            else{
                $error.="Ingrese un porcentaje de descuento<br>";
            }
        }
        else{
            $error.="Ingrese un nombre de incapacidad<br>";
            if(isset($_POST["descInc"])&&empty($_POST["descInc"])){
                $error.="Ingrese un porcentaje de descuento<br>";
            }
        }
    }
    else{
        
    }
?>