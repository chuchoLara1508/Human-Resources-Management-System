<?php

    $error=0;
    if(isset($_REQUEST["registroDepa"])){

        if(isset($_POST["nombreDepa"])&&!empty($_POST["nombreDepa"])
        &&
        isset($_POST["descDepa"])){
            if(noRepetirValor($_POST["nombreDepa"],"tbdepartamentos","nombre")){
                $depto= new CDepartamento();
                $depto->clave=palealea(5);
                $depto->nombre=$_POST["nombreDepa"];
                $depto->descripcion=$_POST["descDepa"];
                if($depto->creaDepartamento()){
                    $error=0;
                }
                else{
                    $error=2;
                }
            }
            else{
                $error=3;
            }   
        }
        else{
            $error=1;
        }
    }
    else{
        
    }
    
?>