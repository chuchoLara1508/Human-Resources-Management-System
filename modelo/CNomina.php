<?php 

class CNomina{

    var $claveN; 
    var $claveE;
    var $nombreE; 
    var $puesto; 
    var $fechaI; 
    var $fechaF;
    var $fechaPago;
    var $horas; 
    var $incapacidad;
    var $dias; 
    var $descuentoISR; 
    var $descuentoIMSS; 
    var $descuentoIncapacidad; 
    var $pagoDia; 
    var $pagoHora; 
    var $totalDescuentos; 
    var $totalHoras; 
    var $totalDias; 
    var $total;
    var $clvInc;
    
    function altaNomina(){
        $bandera=false;
        $query='insert into tbnominas (clave,clave_empleado,nombre
        ,puesto,fecha_inicio,fecha_fin,fecha_pago,horas,incapacidad,dias
        ,descISR,descIMSS,descInc,pago_dia,pago_hora,total_desc,total_horas
        ,total_dias,total) values("'.$this->claveN.'","'.$this->claveE.'"
        ,"'.$this->nombreE.'","'.$this->puesto.'","'.$this->fechaI.'","'.$this->fechaF.'"
        ,"'.$this->fechaPago.'","'.$this->horas.'","'.$this->incapacidad.'"
        ,"'.$this->dias.'","'.$this->descuentoISR.'","'.$this->descuentoIMSS.'"
        ,"'.$this->descuentoIncapacidad.'","'.$this->pagoDia.'","'.$this->pagoHora.'"
        ,"'.$this->totalDescuentos.'","'.$this->totalHoras.'","'.$this->totalDias.'"
        ,"'.$this->total.'")';
        $this->clvInc=$this->encuentraInc($this->incapacidad);
        if($querySQL=mysqli_query(conecta(),$query)){
            if($this->agregaEmpNom($this->claveE,$this->claveN)){
                if($this->agregaFechas($this->fechaI,$this->fechaF,$this->fechaPago,$this->claveN)){
                    if($this->agregadesc($this->descuentoISR,$this->descuentoIMSS,$this->descuentoIncapacidad,$this->claveN)){
                        if($this->agregaTotales($this->totalDescuentos,$this->totalHoras,$this->totalDias,$this->claveN)){
                            if($this->incNom($this->clvInc,$this->claveN)){
                                $bandera=true;
                            }
                        }
                    }
                }
            }
          }
          else{
              $bandera=false;
          }
          return $bandera;
    }

    function incNom($clvInc,$clvN){
        $bandera=false;
        $query='insert into tbincapacidadesnominas (clave_incapacidad,clave_nomina) values("'.$clvInc.'","'.$clvN.'")';
        if($querySQL=mysqli_query(conecta(),$query)){
            $bandera=true;
          }
          else{
              $bandera=false;
          }
        return $bandera;
    }

    function encuentraInc($inc){
        $clave="";
        $query='select clave as clv from tbincapacidades where nombre="'.$inc.'"';
        if($querySQL=mysqli_query(conecta(),$query)){
            $res=mysqli_fetch_assoc($querySQL);
            $clave=$res["clv"];
          }
          
        return $clave;
    }


    function agregaTotales($totaldesc,$totalh,$totald,$claven){
        $bandera=false;
        $query='insert into tbtotalesnominas(clave,total_desc,total_horas,total_dias,clave_nomina) values("'.palealea(5).'","'.$totaldesc.'","'.$totalh.'","'.$totald.'","'.$claven.'")';
        if($querySQL=mysqli_query(conecta(),$query)){
            $bandera=true;
          }
          else{
              $bandera=false;
          }
        return $bandera;
    }

    function agregadesc($descisr,$descimss,$descinc,$claven){
        $bandera=false;
        $query='insert into tbdescuentosnominas (clave,descISR,descIMSS,descInc,clave_nomina) values("'.palealea(5).'","'.$descisr.'","'.$descimss.'","'.$descinc.'","'.$claven.'")';
        if($querySQL=mysqli_query(conecta(),$query)){
            $bandera=true;
          }
          else{
              $bandera=false;
          }
        return $bandera;
    }

    function agregaFechas($fi,$ff,$fp,$claven){
        $bandera=false;
        $query='insert into tbfechasnominas (clave,fecha_inicio,fecha_fin,fecha_pago,clave_nomina) values ("'.palealea(5).'","'.$fi.'","'.$ff.'","'.$fp.'","'.$claven.'")';
        if($querySQL=mysqli_query(conecta(),$query)){
            $bandera=true;
          }
          else{
              $bandera=false;
          }
        return $bandera;
    }

    function agregaEmpNom($clvemp,$clvnomi){
        $bandera=false;
        $query='insert into tbempleadosnominas (clave_empleado,clave_nomina) values("'.$clvemp.'","'.$clvnomi.'")';
        if($querySQL=mysqli_query(conecta(),$query)){
            $bandera=true;
          }
          else{
              $bandera=false;
          }
        return $bandera;

    }


    function editaNomina(){
        $bandera=false;
            $query='update tbnominas set fecha_inicio="'.$this->fechaI.'"
            ,fecha_fin="'.$this->fechaF.'",fecha_pago="'.$this->fechaPago.'"
            ,horas="'.$this->horas.'",incapacidad="'.$this->incapacidad.'"
            ,dias="'.$this->dias.'",descISR="'.$this->descuentoISR.'"
            ,descIMSS="'.$this->descuentoIMSS.'",descInc="'.$this->descuentoIncapacidad.'"
            ,pago_dia="'.$this->pagoDia.'",pago_hora="'.$this->pagoHora.'"
            ,total_desc="'.$this->totalDescuentos.'",total_horas="'.$this->totalHoras.'"
            ,total_dias="'.$this->totalDias.'",total="'.$this->total.'" where clave="'.$this->claveN.'"';
            if($querySQL=mysqli_query(conecta(),$query)){
                $bandera=true;
              }
              else{
                  $bandera=false;
              }
              return $bandera;
    }
    function quitaNomina(){
        $bandera=false;
        $query='delete from tbnominas where clave="'.$this->clave.'"';
        if($querySQL=mysqli_query(conecta(),$query)){
            $bandera=true;
          }
          else{
              $bandera=false;
          }
          return $bandera;
    }

    function totalNominas($nombre,$puesto,$rango,$op){
        $total=0;
        $query='select count(*) as numero from tbnominas';
        if($nombre!=""||$puesto!=""||$rango>0){
            $query.=' where';
        }
        if($nombre!=""&&$puesto==""){
            $query.=' (nombre like("%'.$nombre.'%"))';
        }
        if($nombre!=""&&$puesto!=""){
            $query.=' (nombre like("%'.$nombre.'%")) and puesto="'.$puesto.'"';
        }
        if($nombre==""&&$puesto!=""){
            $query.=' puesto="'.$puesto.'"';
        }
        if($nombre!=""&&$puesto!=""&&$rango>0){
            $query.=' and';
        }
        if($nombre!=""&&$puesto==""&&$rango>0){
            $query.=' and';
        }
        if($rango>0){
            if($rango==1){
                $query.=' total_dias<15';
            }
            if($rango==2){
                $query.=' total_dias>=15 and total_dias<30';
            }
            if($rango==3){
                $query.=' total_dias>=30';
            }
        }
        if($op>0){
            if($op==1){
                $query.=' order by nombre ASC';
            }
            if($op==2){
                $query.=' order by puesto ASC';
            }
            if($op==3){
                $query.=' order by total ASC';
            }
            if($op==4){
                $query.=' order by nombre DESC';
            }
            if($op==5){
                $query.=' order by puesto DESC';
            }
            if($op==6){
                $query.=' order by total DESC';
            }
        }
        if($sqlQuery=mysqli_query(conecta(),$query)){
            $res=mysqli_fetch_assoc($sqlQuery);
            $total=$res["numero"];
        }
        return $total;
    }

    function mostrarNomina($nombre,$puesto,$rango,$op,$pagina,$maximo){
        $arreglo=array();
        $query='select * from tbnominas';
        if($nombre!=""||$puesto!=""||$rango>0){
            $query.=' where';
        }
        if($nombre!=""&&$puesto==""){
            $query.=' (nombre like("%'.$nombre.'%"))';
        }
        if($nombre!=""&&$puesto!=""){
            $query.=' (nombre like("%'.$nombre.'%")) and puesto="'.$puesto.'"';
        }
        if($nombre==""&&$puesto!=""){
            $query.=' puesto="'.$puesto.'"';
        }
        if($nombre!=""&&$puesto!=""&&$rango>0){
            $query.=' and';
        }
        if($nombre!=""&&$puesto==""&&$rango>0){
            $query.=' and';
        }
        if($rango>0){
            if($rango==1){
                $query.=' total_dias<15';
            }
            if($rango==2){
                $query.=' total_dias>=15 and total_dias<30';
            }
            if($rango==3){
                $query.=' total_dias>=30';
            }
        }
        if($op>0){
            if($op==1){
                $query.=' order by nombre ASC';
            }
            if($op==2){
                $query.=' order by puesto ASC';
            }
            if($op==3){
                $query.=' order by total ASC';
            }
            if($op==4){
                $query.=' order by nombre DESC';
            }
            if($op==5){
                $query.=' order by puesto DESC';
            }
            if($op==6){
                $query.=' order by total DESC';
            }
        }
        $indice=$pagina*$maximo;
        $query.=' limit '.$indice.', '.$maximo;
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
        }
        return $arreglo;
    }

}

?>