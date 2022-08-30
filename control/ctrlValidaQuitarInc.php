<?php

    $err=0;
    if(isset($_GET["clv"])&&!empty($_GET["clv"])){
        $inc=new CIncapacidad();
        $inc->clave=$_GET["clv"];
        if($inc->eliminaInc()){
            $err=0;
        }
        else{
            $err=1;
        }
    }

?>