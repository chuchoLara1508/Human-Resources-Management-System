<?php
    $nombre="";
    $usua="";
    $correo="";
    $op=0;
    $pagina=0;
    $max=5;
    $usuario= new CUsuario();
    if(isset($_POST["nom"])&&!empty($_POST["nom"])){
        $nombre=$_POST["nom"];
    }
    else if(isset($_GET["nomb"])&&!empty($_GET["nomb"])){
        $nombre=$_GET["nom"];
    }
    if(isset($_POST["usua"])&&!empty($_POST["usua"])){
        $usua=$_POST["usua"];
    }
    else if(isset($_GET["usuari"])&&!empty($_GET["usuari"])){
        $usua=$_GET["usuari"];
    }
    if(isset($_POST["corr"])&&!empty($_POST["corr"])){
        $correo=$_POST["corr"];
    }
    else if(isset($_GET["correito"])&&!empty($_GET["correito"])){
        $correo=$_GET["correito"];
    }
    if(isset($_POST["ordenar"])&&!empty($_POST["ordenar"])){
        $op=$_POST["ordenar"];
    }
    else if(isset($_GET["ord"])&&!empty($_GET["ord"])){
        $op=$_GET["ord"];
    }

    $total=$usuario->totalUsu($nombre,$usua,$correo,$op);
    $maximoPag=ceil($total/$max);

   if(isset($_GET["pg"])&&!empty($_GET["pg"])){
       if(($_GET["pg"]>=0)){
           $pagina=$_GET["pg"];
       }
       if(($_GET["pg"])>=$maximoPag){
           $pagina=$maximoPag-1;
       }
       
   }
    $usuarios= $usuario->mostrarUsu($nombre,$usua,$correo,$op,$pagina,$max);

?>