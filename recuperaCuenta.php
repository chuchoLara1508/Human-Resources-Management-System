<?php

    include('libs/libConexion.php');

    include('libs/libValidaciones.php');

    include('libs/libEnvioMail.php');

    include('libs/libGeneral.php');

    include('modelo/CUsuario.php');


    $error=0;
    if(isset($_POST["correito"])&&!empty($_POST["correito"])){
        if(!validaCorExist($_POST["correito"],"tbusuarios","correo")){
            $usuari= new CUsuario();
            $usuari->correo=$_POST["correito"];
            $usuari->contra=palealea(8);
            $cuerpo='<h2>Aviso de recuperación de cuenta</h2>';
            $cuerpo.='<p>Tu solicitud de recuperación de cuenta fue ejecutada con éxito!</p>';
            $cuerpo.='<p>Por lo tanto la nueva contraseña con la que ingresarás es: <em>'.$usuari->contra.'</em></p>';
            $cuerpo.='<h5>Saludos Cordiales. Atte: Administración de Recursos Humanos</h5>';
            if(envio('admin@midominio.com',utf8_decode('Recuperación de cuenta'),$_POST["correito"],utf8_decode('A quién corresponda'),utf8_decode('Recuperación'),$cuerpo)){
                if($usuari->recuperaCuenta($_POST["correito"],md5($usuari->contra))){
                    $error=0;
                }
                else{
                    $error=3;
                }
            }
            else{
                $error=2;
            }
        }
        else{
            $error=4;
        }
    }
    else{
        $error=1;
    }

?>