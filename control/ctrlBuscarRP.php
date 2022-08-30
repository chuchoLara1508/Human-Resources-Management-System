<?php
   
    $nomrol="";
    $nomodu="";
    $clvrol="";
    $clvper="";
    $pagina=0;
    $max=5;
    $crolp= new CRolPermiso();
    if(isset($_POST["roles"])&&!empty($_POST["roles"])){
        if($_POST["roles"]>0){
            $nomrol=buscarElemento("roles",$_POST["roles"]);
            $clvrol=buscarElementoClave("clave","roles","nombre",$nomrol);
        }
    }
    else if(isset($_GET["roli"])&&!empty($_GET["roli"])){
        if($_GET["roli"]>0){
            $nomrol=buscarElemento("roles",$_GET["roli"]);
            $clvrol=buscarElementoClave("clave","roles","nombre",$nomrol);
        }
    }
    if(isset($_POST["modulos"])&&!empty($_POST["modulos"])){
        if($_POST["modulos"]>0){
            $nomodu=buscarElemento("modulos",$_POST["modulos"]);
            $clvper=buscarElementoClave("clave","modulos","nombre",$nomodu);
        }
    }
    else if(isset($_GET["modul"])&&!empty($_GET["modul"])){
        if($_GET["modul"]>0){
            $nomodu=buscarElemento("modulos",$_GET["modul"]);
            $clvper=buscarElementoClave("clave","modulos","nombre",$nomodu);
        }
    }
    $total=$crolp->totalRP($clvrol,$clvper);
    $maximoPag=ceil($total/$max);

   if(isset($_GET["pg"])&&!empty($_GET["pg"])){
       if(($_GET["pg"]>=0)){
           $pagina=$_GET["pg"];
       }
       if(($_GET["pg"])>=$maximoPag){
           $pagina=$maximoPag-1;
       }
       
   }

    $roles=$crolp->mostrarRP($clvrol,$clvper,$pagina,$max);

?>