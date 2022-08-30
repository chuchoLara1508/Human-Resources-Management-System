<?php
$error=0;
    if(isset($_REQUEST['editarDepa'])){
        if(isset($_POST["clave"])&&!empty($_POST["clave"])
        &&
        (isset($_POST["nombreDepa"])&&!empty($_POST["nombreDepa"]))
        &&
        (isset($_POST["descDepa"]))
        ){
                $depto= new CDepartamento();
                $depto->clave=$_POST["clave"];
                $depto->nombre=$_POST["nombreDepa"];
                $depto->descripcion=$_POST["descDepa"];
                if($depto->editaDepartamento()){
                    $error=0;
                }
                else{
                    $error=2;
                }
        }
        else{
            $error=1;
        }
        
    }
    
?>