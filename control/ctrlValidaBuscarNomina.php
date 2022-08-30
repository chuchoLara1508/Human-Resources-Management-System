<?php
    $nombre="";
    $pues=0;
    $nompuesto="";
    $dia=0;
    $op=0;
    $pagina=0;
    $max=5;
    $no=new CNomina();
    if(isset($_POST["nomb"])&&!empty($_POST["nomb"])){
        $nombre=$_POST["nomb"]; 
    }
    else if(isset($_GET["nom"])&&!empty($_GET["nom"])){
        $nombre=$_GET["nom"];
    }
    if(isset($_POST["puest"])&&!empty($_POST["puest"])){
        if($_POST["puest"]==0){
            $pues=$_POST["puest"];
        }
        else{
            $pues=$_POST["puest"];
            $nompuesto=buscarElemento("tbpuestos",$pues);
        }
    }
    else if(isset($_GET["pues"])&&!empty($_GET["pues"])){
        if($_GET["puesto"]==0){
            $pues=$_GET["puesto"];
        }
        else{
            $pues=$_GET["pues"];
            $nompuesto=buscarElemento("tbpuestos",$pues);
        }
    }
    if(isset($_POST["dia"])&&!empty($_POST["dia"])){
        $dia=$_POST["dia"];
    }
    else if(isset($_GET["di"])&&!empty($_GET["di"])){
        $dia=$_GET["di"];
    }
    if(isset($_POST["ordenar"])&&!empty($_POST["ordenar"])){
        $op=$_POST["ordenar"];
    }
    else if(isset($_GET["ordenar"])&&!empty($_GET["ord"])){
        $op=$_GET["ord"];
    }

    $total=$no->totalNominas($nombre,$nompuesto,$dia,$op);
    $maximoPag=ceil($total/$max);

   if(isset($_GET["pg"])&&!empty($_GET["pg"])){
       if(($_GET["pg"]>=0)){
           $pagina=$_GET["pg"];
       }
       if(($_GET["pg"])>=$maximoPag){
           $pagina=$maximoPag-1;
       }
       
   }

    $nominas=$no->mostrarNomina($nombre,$nompuesto,$dia,$op,$pagina,$max);

?>