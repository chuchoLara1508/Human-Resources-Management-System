<?php
    define("usuari","root");
    define("passwd","");
    define("basenom","recursos_humanos");
    define("sernom","localhost");
    function conecta(){
        $bd=null;
        if($bd = mysqli_connect(sernom,usuari,passwd)){
            if(mysqli_select_db($bd,basenom)){
                return $bd;
            }
            else{
                echo "Error con la base de datos";
            }
        }
        else{
            echo "Error con la conexion";
        }
    }
?>