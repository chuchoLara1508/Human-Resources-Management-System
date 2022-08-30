<?php

    $err=0;
    if(isset($_GET["clv"])&&!empty($_GET["clv"])){
        $emp=new CUsuario();
        $emp->clave=$_GET["clv"];
        if($emp->quitaUsuario()){
            $err=0;
           
        }
        else{
            $err=1;
         
        }
    }

?>