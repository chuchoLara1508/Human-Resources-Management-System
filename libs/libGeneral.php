<?php
    function palealea($longiutd){//inicio funcion
        $palabra="";
        $caracte="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_.!$";
        $letra=0;
        while($letra<$longiutd){//inicio while
            /*
            Se recorre en el ciclo toda la longitud ingresada
            entonces a la variable cadena se le concatena, alguna letra en una posicion aleatoria
            de la misma, para luego continuar hasta que letra sea igual que longitud y el ciclo termina
            */
            $palabra.=substr($caracte,rand(0,strlen($caracte)-1),1);
            $letra++;
        }//cierre while
        return $palabra;
    }//cierre funcion

    function creaNomUsu($nombre,$clave){
        $usua=array();
        $usuario="";
        $usua=explode(" ",$nombre);
        $cant=count($usua);
        if($cant==2){
            $usuario=strtoupper(substr($usua[0],0,3))."".strtoupper(substr($usua[1],0,3))."".strtoupper(substr($clave,0,3));
        }
        if($cant>=3){
            $usuario=strtoupper(substr($usua[0],0,3))."".strtoupper(substr($usua[1],0,3))."".strtoupper(substr($usua[2],0,2))."".strtoupper(substr($clave,0,1));
        }
        return $usuario;
    }
    function formatoFecha($vfecha)
    {
        $fch=explode("-",$vfecha);
        $tfecha=$fch[2]."-".$fch[1]."-".$fch[0];
        return $tfecha;
    }
?>