<?php

    class CIncapacidad{
        var $clave;
        var $nombre;
        var $desc;

        function creaInc(){
            $bandera=false;
            $query='insert into tbincapacidades (clave,nombre,descuento) values("'.$this->clave.'","'.$this->nombre.'","'.$this->desc.'")';
            if($querySQL=mysqli_query(conecta(),$query)){
                $bandera=true;
              }
              else{
                  $bandera=false;
              }
              return $bandera;
        }

        function editaInc(){
            $bandera=false;
            $query='update tbincapacidades set
             nombre="'.$this->nombre.'",descuento="'.$this->desc.'" 
             where clave="'.$this->clave.'"';
            if($querySQL=mysqli_query(conecta(),$query)){
                $bandera=true;
              }
              else{
                  $bandera=false;
              }
              return $bandera;
        }

        function eliminaInc(){
            $bandera=false;
            $query='delete from tbincapacidades where clave="'.$this->clave.'"';
            if($querySQL=mysqli_query(conecta(),$query)){
                $bandera=true;
            }
            else{
                $bandera=false;
            }
            return $bandera;
        }

        function totalInc($palabra,$rango,$op){
            $total=0;
            $query='select count(*) as numero from tbincapacidades';
            if($palabra!=""||$rango>0){
                $query.=' where';
            }
            if($palabra!=""){
                $query.=' (nombre like("%'.$palabra.'%"))';
            }
            if($palabra!=""&&$rango>0){
                $query.=' and';
            }
            if($rango>0){
                if($rango==1){
                    $query.=' descuento<20';
                }
                if($rango==2){
                    $query.=' descuento>=20 and descuento<40';
                }
                if($rango==3){
                    $query.=' descuento>=40 and descuento<60';
                }
                if($rango==4){
                    $query.=' descuento>=60 and descuento<80';
                }
                if($rango==5){
                    $query.=' descuento>=80 and descuento<=100';
                }
            }
            if($op>0){
                if($op==1){
                    $query.=' order by nombre ASC';
                }
                if($op==2){
                    $query.=' order by descuento ASC';
                }
                if($op==3){
                    $query.=' order by nombre DESC';
                }
                if($op==4){
                    $query.=' order by descuento DESC';
                }
            }
            if($sqlQuery=mysqli_query(conecta(),$query)){
                $res=mysqli_fetch_assoc($sqlQuery);
                $total=$res["numero"];
            }
            return $total;
        }

        function excelInc(){
            $arreglo=array();
            $query='select * from tbincapacidades';
            if($querySQL=mysqli_query(conecta(),$query)){
                $n=0;
                while($res=mysqli_fetch_assoc($querySQL)){
                    $arreglo[$n][0]=$res["clave"];
                    $arreglo[$n][1]=$res["nombre"];
                    $arreglo[$n][2]=$res["descuento"];
                    $n++; 
                }
            }
            return $arreglo;
        }

        function mostrarInc($palabra,$rango,$op,$pagina,$maximo){
            $arreglo=array();
            $query='select * from tbincapacidades';
            if($palabra!=""||$rango>0){
                $query.=' where';
            }
            if($palabra!=""){
                $query.=' (nombre like("%'.$palabra.'%"))';
            }
            if($palabra!=""&&$rango>0){
                $query.=' and';
            }
            if($rango>0){
                if($rango==1){
                    $query.=' descuento<20';
                }
                if($rango==2){
                    $query.=' descuento>=20 and descuento<40';
                }
                if($rango==3){
                    $query.=' descuento>=40 and descuento<60';
                }
                if($rango==4){
                    $query.=' descuento>=60 and descuento<80';
                }
                if($rango==5){
                    $query.=' descuento>=80 and descuento<=100';
                }
            }
            if($op>0){
                if($op==1){
                    $query.=' order by nombre ASC';
                }
                if($op==2){
                    $query.=' order by descuento ASC';
                }
                if($op==3){
                    $query.=' order by nombre DESC';
                }
                if($op==4){
                    $query.=' order by descuento DESC';
                }
            }
            $indice=$pagina*$maximo;
            $query.=' limit '.$indice.', '.$maximo;
            if($querySQL=mysqli_query(conecta(),$query)){
                $n=0;
                while($res=mysqli_fetch_assoc($querySQL)){
                    $arreglo[$n][0]=$res["clave"];
                    $arreglo[$n][1]=$res["nombre"];
                    $arreglo[$n][2]=$res["descuento"];
                    $n++; 
                }
            }
            return $arreglo;
        }
    }

?>