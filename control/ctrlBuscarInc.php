<?php
    $nombre="";
    $pago=0;
    $op=0;
    $pagina=0;
    $max=5;
    $inc= new CIncapacidad();
    if(isset($_POST["nombre"])&&!empty($_POST["nombre"])){
        $nombre=$_POST["nombre"];
    }
    else if(isset($_GET["nomb"])&&!empty($_GET["nomb"])){
        $nombre=$_GET["nomb"];
    }
    if(isset($_POST["descuento"])&&!empty($_POST["descuento"])){
        $pago=$_POST["descuento"];
    }
    else if(isset($_GET["desc"])&&!empty($_GET["desc"])){
        $pago=$_GET["desc"];
    }
    if(isset($_POST["ordenar"])&&!empty($_POST["ordenar"])){
        $op=$_POST["ordenar"];
    }
    else if(isset($_GET["ord"])&&!empty($_GET["ord"])){
        $op=$_GET["ord"];
    }
    $total=$inc->totalInc($nombre,$pago,$op);
    $maximoPag=ceil($total/$max);
    if(isset($_GET["pg"])&&!empty($_GET["pg"])){
        if(($_GET["pg"]>=0)){
            $pagina=$_GET["pg"];
        }
        if(($_GET["pg"])>=$maximoPag){
            $pagina=$maximoPag-1;
        }
    }
    $incapacidades=$inc->mostrarInc($nombre,$pago,$op,$pagina,$max);
?>