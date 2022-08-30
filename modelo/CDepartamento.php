<?php
    class CDepartamento{
        
        var $clave;
        var $nombre;
        var $descripcion;

        function CDepartamento(){
            $this->clave="";
        }

        function creaDepartamento(){
            $bandera=false;
            $query='insert into tbdepartamentos (clave,nombre,descripcion) values("'.$this->clave.'","'.$this->nombre.'","'.$this->descripcion.'")';
            if($querySQL=mysqli_query(conecta(),$query)){
                $bandera=true;
              }
              else{
                  $bandera=false;
              }
              return $bandera;
        }

        function editaDepartamento(){
            $bandera=false;
            $query='update tbdepartamentos set
             nombre="'.$this->nombre.'",descripcion="'.$this->descripcion.'" 
             where clave="'.$this->clave.'"';
            if($querySQL=mysqli_query(conecta(),$query)){
                $bandera=true;
              }
              else{
                  $bandera=false;
              }
              return $bandera;
        }

        function eliminarDepartamento(){
            $bandera=false;
            $query='delete from tbdepartamentos where clave="'.$this->clave.'"';
            if($querySQL=mysqli_query(conecta(),$query)){
                $bandera=true;
              }
              else{
                  $bandera=false;
              }
              return $bandera;
        } 
        function totalDeptos($name,$op){
            $total=0;
            $query='select count(*) as numero from tbdepartamentos';
            if($name!=""){
                $query.=' where nombre like ("%'.$name.'%") or descripcion like("%'.$name.'%")';
            }
            if($op>0){
                if($op==1){
                    $query.=' order by nombre ASC';
                }
                if($op==2){
                    $query.=' order by descripcion ASC';
                }
                if($op==3){
                    $query.=' order by nombre DESC';
                }
                if($op==4){
                    $query.=' order by descripcion DESC';
                }
            }
            if($sqlQuery=mysqli_query(conecta(),$query)){
                $res=mysqli_fetch_assoc($sqlQuery);
                $total=$res["numero"];
            }
            return $total;

        }
        function excelDepto(){
            $arreglo=array();
            $query='select * from tbdepartamentos';
            if($querySQL=mysqli_query(conecta(),$query)){
                $n=0;
                while($res=mysqli_fetch_assoc($querySQL)){
                    $arreglo[$n][0]=$res["clave"];
                    $arreglo[$n][1]=$res["nombre"];
                    $arreglo[$n][2]=$res["descripcion"];
                    $n++; 
                }
            }
            return $arreglo;
        }
        function mostrarDeptos($name,$op,$pagina,$maximo){
            $arreglo=array();
            $query='select * from tbdepartamentos';
            if($name!=""){
                $query.=' where nombre like ("%'.$name.'%") or descripcion like("%'.$name.'%")';
            }
            if($op>0){
                if($op==1){
                    $query.=' order by nombre ASC';
                }
                if($op==2){
                    $query.=' order by descripcion ASC';
                }
                if($op==3){
                    $query.=' order by nombre DESC';
                }
                if($op==4){
                    $query.=' order by descripcion DESC';
                }
            }
            $indice=$pagina*$maximo;
            $query.=' limit '.$indice.', '.$maximo;
            if($querySQL=mysqli_query(conecta(),$query)){
                $n=0;
                while($res=mysqli_fetch_assoc($querySQL)){
                    $arreglo[$n][0]=$res["clave"];
                    $arreglo[$n][1]=$res["nombre"];
                    $arreglo[$n][2]=$res["descripcion"];
                    $n++; 
                }
            }
            return $arreglo;
        }
    }
?>