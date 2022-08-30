<?php

    $erro=0;
    if(isset($_REQUEST["editaRP"])){
        if(
            (isset($_POST["rol"])&&!empty($_POST["rol"])&&($_POST["rol"]>=1))
            &&
            (isset($_POST["modulo"])&&!empty($_POST["modulo"])&&($_POST["modulo"]>=1))
        ){
            $r= new CRolPermiso();
            $nombreRol=buscarElemento("roles",$_POST["rol"]);
            $r->claveRol=buscarElementoClave("clave","roles","nombre",$nombreRol);
            $nombreM=buscarElemento("modulos",$_POST["modulo"]);
            $r->clavePermiso=buscarElementoClave("clave","modulos","nombre",$nombreM);
            $r->clave=buscaClaveRP("clave","tbrolespermisos","clave_rol",$r->claveRol,"clave_modulo",$r->clavePermiso);
            if(isset($_POST["alta"])&&($_POST["alta"]==1)){
                $r->guardar=1;
            }
            else{
                $r->guardar=0;
            }
            if(isset($_POST["baja"])&&($_POST["baja"]==2)){
                $r->eliminar=1;
            }
            else{
                $r->eliminar=0;
            }
            if(isset($_POST["edita"])&&($_POST["edita"]==3)){
                $r->actualizar=1;
            }
            else{
                $r->actualizar=0;
            }
            
            if($r->editaPermisos()){
                 $erro=0;
            }
            else{
                $erro=2;
            }    
        }
        else{
            $erro=1;
        }
    }

?>