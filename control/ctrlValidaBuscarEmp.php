<?php

$nom="";
$puesto=0;
$nompues="";
$genero="";
$pais=0;
$country="";
$nivel=0;
$escolar="";
$op=0;
$pagina=0;
$max=5;
$empleado= new CEmpleado();
    if(isset($_POST["nombreE"])&&!empty($_POST["nombreE"])){
        $nom=$_POST["nombreE"];
    }
    else if(isset($_GET["nomb"])&&!empty($_GET["nomb"])){
        $nom=$_GET["nomb"];
    }
    if(isset($_POST["puestoE"])&&!empty($_POST["puestoE"])){
        if($_POST["puestoE"]==0){
            $puesto=$_POST["puestoE"];
        }
        else{
            $puesto=$_POST["puestoE"];
            $nompues=buscarElemento("tbpuestos",$_POST["puestoE"]);
        }
    }
    else if(isset($_GET["puesto"])&&!empty($_GET["puesto"])){
        if($_GET["puesto"]==0){
            $puesto=$_GET["puesto"];
        }
        else{
            $puesto=$_GET["puesto"];
            $nompues=buscarElemento("tbpuestos",$_GET["puesto"]);
        }
    }
    if((isset($_POST["grupo"]))){
        $genero=$_POST["grupo"];
    }
    else if(isset($_GET["grup"])&&!empty($_POST["grup"])){
        $genero=$_GET["grup"];
    }
    if(isset($_POST["paisN"])&&!empty($_POST["paisN"])){
        if($_POST["paisN"]==0){
            $pais=$_POST["paisN"];
        }
        $pais=$_POST["paisN"];
        $country=buscarPais($pais);
    }
    else if(isset($_GET["pai"])&&!empty($_GET["pai"])){
        if($_GET["pai"]==0){
            $pais=$_GET["pai"];
        }
        $pais=$_GET["pai"];
        $country=buscarPais($pais);
    }
    if(isset($_POST["nivelEs"])&&!empty($_POST["nivelEs"])){
        $nivel=$_POST["nivelEs"];
        $emple= new CEmpleado();
        $escolar=$emple->tieneNivel($nivel);
    }
    else if(isset($_GET["lvl"])&&!empty($_GET["lvl"])){
        $nivel=$_GET["lvl"];
        $emple= new CEmpleado();
        $escolar=$emple->tieneNivel($nivel);
    }
    if(isset($_POST["ordenar"])&&!empty($_POST["ordenar"])){
        $op=$_POST["ordenar"];
    }
    else if(isset($_GET["ord"])&&!empty($_GET["ord"])){
        $op=$_GET["ord"];
    }
    $total=$empleado->totalEmp($nom,$nompues,$genero,$country,$escolar,$op);
    $maximoPag=ceil($total/$max);

   if(isset($_GET["pg"])&&!empty($_GET["pg"])){
       if(($_GET["pg"]>=0)){
           $pagina=$_GET["pg"];
       }
       if(($_GET["pg"])>=$maximoPag){
           $pagina=$maximoPag-1;
       }
       
   }

    $trabajadores=$empleado->mostrarEmp($nom,$nompues,$genero,$country,$escolar,$op,$pagina,$max);

?>