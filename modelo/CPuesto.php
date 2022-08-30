<?php
    class CPuesto{
        var $clave;
        var $nombre;
        var $descripcion;
        var $departamento;
        var $pago;
        var $claveDepto;

        function CPuesto(){
            $this->clave="";
        }
        function creaPuesto(){
            $bandera=false;
            $query='insert into tbpuestos (clave,nombre,descripcion,departamento,pago,clavedepto) values("'.$this->clave.'","'.$this->nombre.'","'.$this->descripcion.'","'.$this->departamento.'","'.$this->pago.'","'.$this->claveDepto.'")';
            if($querySQL=mysqli_query(conecta(),$query)){
                $bandera=true;
              }
              else{
                  $bandera=false;
              }
              return $bandera;
        }

        function editaPuesto(){
            $bandera=false;
             $query='update tbpuestos set
             nombre="'.$this->nombre.'",descripcion="'.$this->descripcion.'",departamento="'.$this->departamento.'",pago="'.$this->pago.'",clavedepto="'.$this->claveDepto.'" where clave="'.$this->clave.'"';
            if($querySQL=mysqli_query(conecta(),$query)){
                $bandera=true;
              }
              else{
                  $bandera=false;
              }
              return $bandera;
        }

        function eliminarPuesto(){
            $bandera=false;
            $query='delete from tbpuestos where clave="'.$this->clave.'"';
            if($querySQL=mysqli_query(conecta(),$query)){
                $bandera=true;
              }
              else{
                  $bandera=false;
              }
              return $bandera;
        }  

        function totalPuestos($palabra,$pago,$ordena){
            $total=0;
            $query='select count(*) as numero from tbpuestos';
            if($palabra!=""||$pago>0){
                $query.=" where";
            }
            if($palabra!=""){
                $query.=' (nombre like("%'.$palabra.'%") or descripcion like("%'.$palabra.'%") or departamento like("%'.$palabra.'%"))';
            }
            
            if($palabra!=""&&$pago>0){
                $query.=' and';
            }
            
            if($pago>0){
                if($pago==1){
                    $query.=' pago=20 and pago<40';
                }
                if($pago==2){
                    $query.=' pago>=40 and pago<60';
                }
                if($pago==3){
                    $query.=' pago>=60 and pago<80';
                }
                if($pago==4){
                    $query.=' pago>=80 and pago<=100';
                }
            }
            if($ordena>0){
                if($ordena==1){
                    $query.=' order by nombre ASC';
                }
                if($ordena==2){
                    $query.=' order by descripcion ASC';
                }
                if($ordena==3){
                    $query.=' order by departamento ASC';
                }
                if($ordena==4){
                    $query.=' order by pago ASC';
                }
                if($ordena==5){
                    $query.=' order by nombre DESC';
                }
                if($ordena==6){
                    $query.=' order by descripcion DESC';
                }
                if($ordena==7){
                    $query.=' order by departamento DESC';
                }
                if($ordena==8){
                    $query.=' order by pago DESC';
                }
            }
            if($sqlQuery=mysqli_query(conecta(),$query)){
                $res=mysqli_fetch_assoc($sqlQuery);
                $total=$res["numero"];
            }
            return $total;
        }

        function excelPuesto(){
            $arreglo=array();
            $query='select * from tbpuestos';
            if($querySQL=mysqli_query(conecta(),$query)){
                $n=0;
                while($res=mysqli_fetch_assoc($querySQL)){
                    $arreglo[$n][0]=$res["clave"];
                    $arreglo[$n][1]=$res["nombre"];
                    $arreglo[$n][2]=$res["descripcion"];
                    $arreglo[$n][3]=$res["departamento"];
                    $arreglo[$n][4]=$res["pago"];
                    $arreglo[$n][5]=$res["clavedepto"];
                    $n++; 
                }
            }
            return $arreglo;
        }

        function mostrarPuesto($palabra,$pago,$ordena,$pagina,$maximo){
            $arreglo=array();
            $query='select * from tbpuestos';
            if($palabra!=""||$pago>0){
                $query.=" where";
            }
            if($palabra!=""){
                $query.=' (nombre like("%'.$palabra.'%") or descripcion like("%'.$palabra.'%") or departamento like("%'.$palabra.'%"))';
            }
            
            if($palabra!=""&&$pago>0){
                $query.=' and';
            }
            
            if($pago>0){
                if($pago==1){
                    $query.=' pago=20 and pago<40';
                }
                if($pago==2){
                    $query.=' pago>=40 and pago<60';
                }
                if($pago==3){
                    $query.=' pago>=60 and pago<80';
                }
                if($pago==4){
                    $query.=' pago>=80 and pago<=100';
                }
            }
            if($ordena>0){
                if($ordena==1){
                    $query.=' order by nombre ASC';
                }
                if($ordena==2){
                    $query.=' order by descripcion ASC';
                }
                if($ordena==3){
                    $query.=' order by departamento ASC';
                }
                if($ordena==4){
                    $query.=' order by pago ASC';
                }
                if($ordena==5){
                    $query.=' order by nombre DESC';
                }
                if($ordena==6){
                    $query.=' order by descripcion DESC';
                }
                if($ordena==7){
                    $query.=' order by departamento DESC';
                }
                if($ordena==8){
                    $query.=' order by pago DESC';
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
                    $arreglo[$n][3]=$res["departamento"];
                    $arreglo[$n][4]=$res["pago"];
                    $arreglo[$n][5]=$res["clavedepto"];
                    $n++; 
                }
            }
            return $arreglo;
        }
    }

?>