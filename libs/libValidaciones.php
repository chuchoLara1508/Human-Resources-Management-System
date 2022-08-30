<?php 

function noRepetirValor($valor,$tabla,$campo){//inicio funcion
    $bandera=true;
    $query='select count(*) as matching from '.$tabla.' where '.$campo.'="'.$valor.'"';
    if($sqlQuery=mysqli_query(conecta(),$query)){//inicio if
        $res=mysqli_fetch_assoc($sqlQuery);
        /*
        Esta funcion se encarga de validar que el correo ingresado por el usuario exista
        en caso de que ya este registrado en la base de datos entonces no se podrá registrar
        nuevamente
        */
        if($res["matching"]>=1){//inicio if
            $bandera=false;
        }//cierre if
    }//cierre if
    return $bandera;
}//cierre funcion

function validaCorExist($valor, $tabla, $campo){
    $bandera = true;
    $query =  'select count(*) as matching from '.$tabla.' where '.$campo.'="'.$valor.'"';
    if($sqlQuery = mysqli_query(conecta(), $query)){
        $res = mysqli_fetch_assoc($sqlQuery);
        if($res["matching"]==1){
            $bandera = false;
        }
    }
    return $bandera;
}

function validaClaveRol($valor,$tabla,$campo){
    $bandera=false;
    $query='select count(*) as matching from '.$tabla.' where '.$campo.'="'.$valor.'"';
    if($sqlQuery=mysqli_query(conecta(),$query)){
        $res=mysqli_fetch_assoc($sqlQuery);
        if($res["matching"]==6){
            $bandera=true;
        }
    }
    return $bandera;
}

function validaExisteRolModulo($valor,$tabla,$campo,$campo1,$valor1){
    $bandera=false;
    $query='select count(*) as matching from '.$tabla.' where '.$campo.'="'.$valor.'" and '.$valor1.'="'.$campo1.'"';
    if($sqlQuery=mysqli_query(conecta(),$query)){
        $res=mysqli_fetch_assoc($sqlQuery);
        if($res["matching"]==1){
            $bandera=true;
        }
    }
    return $bandera;
  }

  function validaNoExisteRegistro($tabla){
      $bandera=false;
    $query='select count(*) as total from '.$tabla.'';
    if($sqlQuery=mysqli_query(conecta(),$query)){
        $res=mysqli_fetch_assoc($sqlQuery);
        if($res["total"]==0){
          $bandera=true;
        }
    }
    return $bandera;
  }
?>