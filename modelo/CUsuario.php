<?php

class CUsuario{
    var $clave;
    var $correo;
    var $usuario;
    var $contra;
    var $rol;
    var $empleado;
    var $claverol;
    var $claveE;

    function creaUsuario(){
        $bandera=false;
        $query='insert into tbusuarios (clave,clave_rol,nombre,usuario,contra,correo,clave_empleado) values("'.$this->clave.'","'.$this->claverol.'","'.$this->empleado.'","'.$this->usuario.'","'.$this->contra.'","'.$this->correo.'","'.$this->claveE.'")';
        if($querySQL=mysqli_query(conecta(),$query)){
            $bandera=true;
        }
        else{
            $bandera=false;
        }
        return $bandera;
    }
    function login($usu,$pas){
        $bandera=false;
        $query='select * from tbusuarios where usuario="'.$usu.'" and contra="'.$pas.'"';
        if($sqlQuery=mysqli_query(conecta(),$query)){
            while($res=mysqli_fetch_assoc($sqlQuery)){
            if($res["usuario"]==$usu&&$res["contra"]==$pas){
                $bandera=true;
                break;
            }
        }
        }
        return $bandera;
    }
    function quitaUsuario() {
        $bandera=true;
        $query='delete from tbusuarios where clave="'.$this->clave.'"';
        if($querySQL=mysqli_query(conecta(),$query)){
            $bandera=true;
        }
        else{
            $bandera=false;
        }
        return $bandera;

    }

    function totalUsu($nombre,$usuario,$correo,$op){
        $total=0;
        $query='select count(*) as numero from tbusuarios';
        if($nombre!=""||$usuario!=""||$correo!=""){
            $query.=' where';
        }
        if($nombre!=""&&$usuario==""&&$correo==""){
            $query.=' (nombre like("%'.$nombre.'%"))';
        }
        if($nombre==""&&$usuario!=""&&$correo==""){
            $query.=' (usuario like("%'.strtoupper($usuario).'%"))';
        }
        if($nombre==""&&$usuario==""&&$correo!=""){
            $query.=' (correo like("%'.$correo.'%"))';
        }
        if($nombre!=""&&$usuario!=""&&$correo!=""){
            $query.=' (nombre like("%'.$nombre.'%")) and (usuario like("%'.strtoupper($usuario).'%")) and (correo like("%'.$correo.'%"))';
        }
        if($op>0){
            if($op==1){
                $query.=' order by nombre ASC';
            }
            if($op==2){
                $query.=' order by usuario ASC';
            }
            if($op==3){
                $query.=' order by nombre DESC';
            }
            if($op==4){
                $query.=' order by usuario DESC';
            }
        }
        if($sqlQuery=mysqli_query(conecta(),$query)){
            $res=mysqli_fetch_assoc($sqlQuery);
            $total=$res["numero"];
        }
        return $total;
    }

    function excelUsu(){
        $arreglo=array();
        $query='select * from tbusuarios';
        if($querySQL=mysqli_query(conecta(),$query)){
            $n=0;
            while($res=mysqli_fetch_assoc($querySQL)){
                $arreglo[$n][0]=$res["clave"];
                $arreglo[$n][1]=$res["clave_rol"];
                $arreglo[$n][2]=$res["nombre"];
                $arreglo[$n][3]=$res["usuario"];
                $arreglo[$n][4]=$res["contra"];
                $arreglo[$n][5]=$res["correo"];
                $arreglo[$n][6]=$res["clave_empleado"];
                $n++;
            }
        }
        return $arreglo;
    }

    function mostrarUsu($nombre,$usuario,$correo,$op,$pagina,$maximo){
        $arreglo=array();
        $query='select * from tbusuarios';
        if($nombre!=""||$usuario!=""||$correo!=""){
            $query.=' where';
        }
        if($nombre!=""&&$usuario==""&&$correo==""){
            $query.=' (nombre like("%'.$nombre.'%"))';
        }
        if($nombre==""&&$usuario!=""&&$correo==""){
            $query.=' (usuario like("%'.strtoupper($usuario).'%"))';
        }
        if($nombre==""&&$usuario==""&&$correo!=""){
            $query.=' (correo like("%'.$correo.'%"))';
        }
        if($nombre!=""&&$usuario!=""&&$correo!=""){
            $query.=' (nombre like("%'.$nombre.'%")) and (usuario like("%'.strtoupper($usuario).'%")) and (correo like("%'.$correo.'%"))';
        }
        if($op>0){
            if($op==1){
                $query.=' order by nombre ASC';
            }
            if($op==2){
                $query.=' order by usuario ASC';
            }
            if($op==3){
                $query.=' order by nombre DESC';
            }
            if($op==4){
                $query.=' order by usuario DESC';
            }
        }
        $indice=$pagina*$maximo;
        $query.=' limit '.$indice.', '.$maximo;
        if($querySQL=mysqli_query(conecta(),$query)){
            $n=0;
            while($res=mysqli_fetch_assoc($querySQL)){
                $arreglo[$n][0]=$res["clave"];
                $arreglo[$n][1]=$res["clave_rol"];
                $arreglo[$n][2]=$res["nombre"];
                $arreglo[$n][3]=$res["usuario"];
                $arreglo[$n][4]=$res["contra"];
                $arreglo[$n][5]=$res["correo"];
                $arreglo[$n][6]=$res["clave_empleado"];
                $n++;
            }
        }
        return $arreglo;
    }

    function recuperaCuenta($correo,$pass){
        $bandera=false;
        $query='update tbusuarios set contra="'.$pass.'" where correo="'.$correo.'"';
        if($querySQL=mysqli_query(conecta(),$query)){
            $bandera=true;
        }
        return $bandera;
    }

}


?>