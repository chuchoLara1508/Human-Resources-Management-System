<?php 
    $error=0;
    if(isset($_REQUEST["alta"])){
        if(
            (isset($_POST["empleado"])&&!empty($_POST["empleado"])&&($_POST["empleado"]>0))
            && 
            (isset($_POST["rol"])&&!empty($_POST["rol"])&&($_POST["rol"]>0))
            &&
            (isset($_POST["correo"])&&!empty($_POST["correo"]))
        ){
            $usu= new CUsuario();
            $usu->clave=palealea(5);
            $usu->correo=$_POST["correo"];
            $usu->contra=palealea(8);
            $encript=$usu->contra;
            $nombreRol=buscarElemento("roles",$_POST["rol"]);
            $usu->rol=$nombreRol;
            $usu->empleado=buscarElemento("tbempleados",$_POST["empleado"]);;
            $usu->claverol=buscarElementoClave("clave","roles","nombre",$nombreRol);
            $usu->claveE=buscarElementoClave("clave","tbempleados","nombre",$usu->empleado);
            $usu->usuario=creaNomUsu($usu->empleado,$usu->claveE);
            $cuerpo='<h2>Registro de usuarios</h2>';
            $cuerpo.='<p>Bienvenido a la empresa</p>';
            $cuerpo.='<p>Usuario de acceso: '.$usu->usuario.'</p>';
            $cuerpo.='<p>Contraseña: '.$usu->contra.'</p>';
            if(noRepetirValor($_POST["correo"],"tbusuarios","correo")){
                if(envio('admin@midominio.com','Registro de usuario',$_POST["correo"],$usu->empleado,'Registro de usuario',$cuerpo)){
                    $usu->contra=md5($encript);
                    if($usu->creaUsuario()){
                        $error=0;
                    }
                    else{
                        $error=2;
                    }
                }
                else{
                    $error=3;
                }
            }
            else{
                $error=4;
            }
        }
        else{
            $error=1;
        }
    }

?>