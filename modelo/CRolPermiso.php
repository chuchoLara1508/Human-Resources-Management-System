<?php

class CRolPermiso{
    var $clave;
    var $claveRol;
    var $clavePermiso;
    var $guardar;
    var $actualizar;
    var $eliminar;

    function CRolPermiso(){

    }

    function altaPermisos(){
        $bandera=false;
        $query='insert into tbrolespermisos (clave,clave_rol,clave_modulo,guardar,actualizar,eliminar)
         values("'.$this->clave.'","'.$this->claveRol.'","'.$this->clavePermiso.'",'.$this->guardar.','.$this->actualizar.','.$this->eliminar.')';
        if($querySQL=mysqli_query(conecta(),$query)){
            $bandera=true;
        }
        else{
            $bandera=false;
        }
        return $bandera;
    }


    function editaPermisos(){
        $bandera=false;
        $query='update tbrolespermisos set guardar='.$this->guardar.',actualizar='.$this->actualizar.',eliminar='.$this->eliminar.' where clave_rol="'.$this->claveRol.'" and clave_modulo="'.$this->clavePermiso.'"';
        if($querySQL=mysqli_query(conecta(),$query)){
            $bandera=true;
        }
        else{
            $bandera=false;
        }
        return $bandera;
    }

    function totalRP($clvrol,$clvpermiso){
        $total=0;
        $query='select count(*) as numero from tbrolespermisos';
        if($clvrol!=""||$clvpermiso!=""){
            $query.=' where';
        }
        if($clvrol!=""&&$clvpermiso==""){
            $query.=' clave_rol="'.$clvrol.'"';
        }
        if($clvrol==""&&$clvpermiso!=""){
            $query.=' clave_modulo="'.$clvpermiso.'"';
        }
        if($clvrol!=""&&$clvpermiso!=""){
            $query.=' clave_rol="'.$clvrol.'" and clave_modulo="'.$clvpermiso.'"';
        }
        if($sqlQuery=mysqli_query(conecta(),$query)){
            $res=mysqli_fetch_assoc($sqlQuery);
            $total=$res["numero"];
        }
        return $total;
    }

    function mostrarRP($clvrol,$clvpermiso,$pagina,$maximo){
        $arreglo=array();
        $query='select * from tbrolespermisos';
        if($clvrol!=""||$clvpermiso!=""){
            $query.=' where';
        }
        if($clvrol!=""&&$clvpermiso==""){
            $query.=' clave_rol="'.$clvrol.'"';
        }
        if($clvrol==""&&$clvpermiso!=""){
            $query.=' clave_modulo="'.$clvpermiso.'"';
        }
        if($clvrol!=""&&$clvpermiso!=""){
            $query.=' clave_rol="'.$clvrol.'" and clave_modulo="'.$clvpermiso.'"';
        }
        $indice=$pagina*$maximo;
        $query.=' limit '.$indice.', '.$maximo;
        if($querySQL=mysqli_query(conecta(),$query)){
            $n=0;
            while($res=mysqli_fetch_assoc($querySQL)){
                $arreglo[$n][0]=$res["clave"];
                $arreglo[$n][1]=$res["clave_rol"];
                $arreglo[$n][2]=$res["clave_modulo"];
                $arreglo[$n][3]=$res["guardar"];
                $arreglo[$n][4]=$res["actualizar"];
                $arreglo[$n][5]=$res["eliminar"];
                $n++; 
            }
        }
        return $arreglo;
    }

}


?>