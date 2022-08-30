<?php


function buscarElemento($tabla,$valor){
    $elementos=array();
    $encontrado="";
    $query='select * from '.$tabla.'';
    if($querySQL=mysqli_query(conecta(),$query)){
        $cont=0;
        while($res=mysqli_fetch_assoc($querySQL)){
            $elementos[$cont]=$res["nombre"];
            if($valor==$cont+1){
                $encontrado=$elementos[$cont];
                break;
            }
            $cont++;
        }
    }
    return $encontrado;
}

function buscarElementoClave($obj,$tabla,$col,$campo){
    $encontrado="";
    $query='select '.$obj.' from '.$tabla.' where '.$col.'="'.$campo.'"';
    if($querySQL=mysqli_query(conecta(),$query)){
        while($res=mysqli_fetch_assoc($querySQL)){
            $encontrado=$res[$obj];
        }
    }
    return $encontrado;
}

function cuentaElementosTabla($tabla){
    $arreglo=array();
        $query='select * from '.$tabla.'';
        if($querySQL=mysqli_query(conecta(),$query)){
            $n=0;
            while($res=mysqli_fetch_assoc($querySQL)){
                $arreglo[$n]=$res["nombre"];
                $n++;
            }
        }
        return $arreglo;
}

function buscarElementoValor($tabla,$valor,$elemento){
    $elementos=array();
    $encontrado="";
    $query='select '.$elemento.' from '.$tabla.'';
    if($querySQL=mysqli_query(conecta(),$query)){
        $cont=0;
        while($res=mysqli_fetch_assoc($querySQL)){
            $elementos[$cont]=$res[$elemento];
            if($valor==$cont+1){
                $encontrado=$elementos[$cont];
                break;
            }
            $cont++;
        }
    }
    return $encontrado;
}

function buscaClaveRP($obj,$tabla,$col,$campo,$col2,$campo2){
    $encontrado="";
      $query='select '.$obj.' from '.$tabla.' where '.$col.'="'.$campo.'" and '.$col2.'="'.$campo2.'"';
      if($querySQL=mysqli_query(conecta(),$query)){
          while($res=mysqli_fetch_assoc($querySQL)){
              $encontrado=$res[$obj];
          }
      }
      return $encontrado;
  }

function guardarRolesPermisos($clvrol){
    $arreglo=array();
    $query='select guardar from tbrolespermisos where clave_rol="'.$clvrol.'" order by clave_modulo ASC';
    if($querySQL=mysqli_query(conecta(),$query)){
        $n=0;
        while($res=mysqli_fetch_assoc($querySQL)){
            $arreglo[$n]=$res["guardar"];
            $n++;
        }
    }
    return $arreglo;
}
function actualizarRolesPermisos($clvrol){
    $arreglo=array();
    $query='select actualizar from tbrolespermisos where clave_rol="'.$clvrol.'" order by clave_modulo ASC';
    if($querySQL=mysqli_query(conecta(),$query)){
        $n=0;
        while($res=mysqli_fetch_assoc($querySQL)){
            $arreglo[$n]=$res["actualizar"];
            $n++;
        }
    }
    return $arreglo;
}
function eliminarRolesPermisos($clvrol){
    $arreglo=array();
    $query='select eliminar from tbrolespermisos where clave_rol="'.$clvrol.'" order by clave_modulo ASC';
    if($querySQL=mysqli_query(conecta(),$query)){
        $n=0;
        while($res=mysqli_fetch_assoc($querySQL)){
            $arreglo[$n]=$res["eliminar"];
            $n++;
        }
    }
    return $arreglo;
}

function buscarPais($val){
    $pais="";
    $query='select * from pais where id='.$val.'';
    if($querySQL=mysqli_query(conecta(),$query)){
        while($res=mysqli_fetch_assoc($querySQL)){
            if($res['id']==$val){
                $pais=$res["paisnombre"];
            }
        }
    }
    return $pais;
}

function obtenerInfo($clave){
    $arreglo=array();
    if($clave!=""){
        $query='select * from tbnominas where clave="'.$clave.'"';
    }
    else{
        $query='select * from tbnominas';
    }
    if($querySQL=mysqli_query(conecta(),$query)){
        $n=0;
        while($res=mysqli_fetch_assoc($querySQL)){
                $arreglo[$n][0]=$res["clave"];
                $arreglo[$n][1]=$res["clave_empleado"];
                $arreglo[$n][2]=$res["nombre"];
                $arreglo[$n][3]=$res["puesto"];
                $arreglo[$n][4]=$res["fecha_inicio"];
                $arreglo[$n][5]=$res["fecha_fin"];
                $arreglo[$n][6]=$res["fecha_pago"];
                $arreglo[$n][7]=$res["horas"];
                $arreglo[$n][8]=$res["incapacidad"];
                $arreglo[$n][9]=$res["dias"];
                $arreglo[$n][10]=$res["descISR"];
                $arreglo[$n][11]=$res["descIMSS"];
                $arreglo[$n][12]=$res["descInc"];
                $arreglo[$n][13]=$res["pago_dia"];
                $arreglo[$n][14]=$res["pago_hora"];
                $arreglo[$n][15]=$res["total_desc"];
                $arreglo[$n][16]=$res["total_horas"];
                $arreglo[$n][17]=$res["total_dias"];
                $arreglo[$n][18]=$res["total"];
                $n++;
        }
        return $arreglo;
    }
}

?>