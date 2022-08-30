<?php 

    $pal="";
    $pago=0;
    $ordena=0;
    $pagina=0;
    $max=5;
    $puesto= new CPuesto();
    if(isset($_POST["nombre"])&&!empty($_POST["nombre"])){
        $pal=$_POST["nombre"];
    }
    else if(isset($_GET["nomb"])&&!empty($_GET["nomb"])){
        $pal=$_GET["nomb"];
    }
    if(isset($_POST["pago"])&&!empty($_POST["pago"])){
        $pago=$_POST["pago"];
    }
    else if(isset($_GET["pgo"])&&!empty($_GET["pgo"])){
        $pago=$_GET["pgo"];
    }
    if(isset($_POST["ordenar"])&&!empty($_POST["ordenar"])){
        $ordena=$_POST["ordenar"];
    }
    else if(isset($_GET["ord"])&&!empty($_GET["ord"])){
        $ordena=$_GET["ord"];
    }
    $total=$puesto->totalPuestos($pal,$pago,$ordena);
    $maximoPag=ceil($total/$max);
    if(isset($_GET["pg"])&&!empty($_GET["pg"])){
        if(($_GET["pg"]>=0)){
            $pagina=$_GET["pg"];
        }
        if(($_GET["pg"])>=$maximoPag){
            $pagina=$maximoPag-1;
        }
    }

    $puestos=$puesto->mostrarPuesto($pal,$pago,$ordena,$pagina,$max);
?>