<?php

$dep= new CDepartamento();
    $nombre="";
    $op=0;
    $pagina=0;
    $max=5;
    if(isset($_POST["nombre"])&&!empty($_POST["nombre"])){
        $nombre=$_POST["nombre"];
    }
    else if(isset($_GET["nomb"])&&!empty($_GET["nomb"])){
        $nombre=$_GET["nomb"];
    }
    if(isset($_POST["ordenar"])&&!empty($_POST["ordenar"])){
        $op=$_POST["ordenar"];
    }
    else if(isset($_GET["ord"])&&!empty($_GET["ord"])){
        $op=$_GET["ord"];
    }
    
    $total=$dep->totalDeptos($nombre,$op);
    $maximoPag=ceil($total/$max);

   if(isset($_GET["pg"])&&!empty($_GET["pg"])){
       if(($_GET["pg"]>=0)){
           $pagina=$_GET["pg"];
       }
       if(($_GET["pg"])>=$maximoPag){
           $pagina=$maximoPag-1;
       }
       
   }
   $departamentos=$dep->mostrarDeptos($nombre,$op,$pagina,$max);
?>