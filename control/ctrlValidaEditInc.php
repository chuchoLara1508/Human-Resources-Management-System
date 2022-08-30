<?php
$er=0; 
//$inc->editaInc()
$inc=new CIncapacidad();
    if(isset($_REQUEST["editarInc"])){
        if(isset($_POST["nombreInc"])&&!empty($_POST["nombreInc"])
        &&
        (isset($_POST["descInc"]))
        &&
        (isset($_POST["clave"])&&!empty($_POST["clave"]))
        ){ 
            $inc->clave=$_POST["clave"];
            $inc->nombre=$_POST["nombreInc"];
            $inc->desc=$_POST["descInc"];
            if($inc->editaInc()){
                $er=0;
            }
            else{
                $er=2;
            }
        }
        else{
           $er=1;
        }
    }
    
?>