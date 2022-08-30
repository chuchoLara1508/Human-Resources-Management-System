<?php 

    $error=0;
    if(isset($_REQUEST["entrar"])){
        if(
            (isset($_POST["usu"])&&!empty($_POST["usu"]))
            &&
            (isset($_POST["contra"])&&!empty($_POST["contra"]))
            &&
            (isset($_POST["textoDeImagen"])&&!empty($_POST["textoDeImagen"]))
        ){
            if(strtoupper($_POST["textoDeImagen"]) == $_SESSION["cadena"]){
                $usuario=new CUsuario();
                $usuarito=$_POST["usu"];
                $contrasena=md5($_POST["contra"]);
                if($usuario->login($usuarito,$contrasena)){
                    $_SESSION["user"]=$usuarito;//z2THf6fF
                    $_SESSION["pass"]=$contrasena;
                    $_SESSION["clvrol"]=buscarElementoClave("clave_rol","tbusuarios","contra",$_SESSION["pass"]);
                    $_SESSION["rol"]=buscarElementoClave("nombre","roles","clave",$_SESSION["clvrol"]);
              
                    header('location:?pag=2');
                }
                else{
                    $error=2;
                    include('vistas/vistSesion.php');
                }
            }
            else{
                $error=3;
                include('vistas/vistSesion.php');
            }    
        }
        else{
            $error=1;
            include('vistas/vistSesion.php');
        }
    }
else{
    include("vistas/vistNotFound.php");
}

?>