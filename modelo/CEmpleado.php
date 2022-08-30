<?php

class CEmpleado{

    var $clave;
    var $nombre;
    var $numero;
    var $curp;
    var $rfc;
    var $direccion;
    var $ncuenta;
    var $puesto;
    var $fecha;
    var $nivel;
    var $genero;
    var $pais;
    var $clavePuesto;
    var $clavePais;

    function CEmpleado(){

    }
    function tieneNivel($val){
        $nivel="";
        switch($val){
            case 1:
                $nivel="Universidad";
            break; 
            case 2:
                $nivel="Maestría";
            break; 
            case 3:
                $nivel="Doctorado";
            break;    
        }
        return $nivel;
    }
    function creaEmpleado(){
        $bandera=false;
        $query='insert into tbempleados (clave,nombre,numero,curp,rfc,direccion,numero_cuenta
        ,puesto,fecha,nivel_escolar,genero,pais,clavepuesto,clavepais)
         values("'.$this->clave.'","'.$this->nombre.'","'.$this->numero.'","'.$this->curp.'","'.$this->rfc.'",
         "'.$this->direccion.'","'.$this->ncuenta.'","'.$this->puesto.'","'.$this->fecha.'",
         "'.$this->nivel.'","'.$this->genero.'","'.$this->pais.'","'.$this->clavePuesto.'","'.$this->clavePais.'")';
        if($querySQL=mysqli_query(conecta(),$query)){
            if($this->detalleNomi($this->rfc,$this->ncuenta,$this->clave)){
                $bandera=true;
            }
          }
          else{
              $bandera=false;
          }
          return $bandera;
    }


    function detalleNomi($rfc,$ncuenta,$clv){
        $bandera=false;
        $query='insert into tbinformacionesfisempleados (clave,rfc,numero_cuenta,clave_empleado) values("'.palealea(5).'","'.$rfc.'","'.$ncuenta.'","'.$clv.'")';
        if($querySQL=mysqli_query(conecta(),$query)){
            $bandera=true;
          }
          else{
              $bandera=false;
          }
        return $bandera;
    }

    function editaEmpleado(){
        $bandera=false;
            $query='update tbempleados set
             nombre="'.$this->nombre.'",numero="'.$this->numero.'",curp="'.$this->curp.'",rfc="'.$this->rfc.'",numero_cuenta=
             "'.$this->ncuenta.'",puesto="'.$this->puesto.'",fecha="'.$this->fecha.'",clavepuesto="'.$this->clavePuesto.'" where clave="'.$this->clave.'"';
            if($querySQL=mysqli_query(conecta(),$query)){
                $bandera=true;
              }
              else{
                  $bandera=false;
              }
              return $bandera;
    }
    function eliminaEmpleado(){
        $bandera=false;
        $query='delete from tbempleados where clave="'.$this->clave.'"';
        if($querySQL=mysqli_query(conecta(),$query)){
            $bandera=true;
          }
          else{
              $bandera=false;
          }
          return $bandera;
    }  

    function totalEmp($nom,$nompues,$genero,$country,$escolar,$op){
        $total=0;
        $query='select count(*) as numero from tbempleados';
        if($nom!=""||$nompues!=""||$genero!=""||$country!=""||$escolar!=""){
            $query.=' where';
        }
        if($nom!=""&&$nompues!=""&&$genero!=""&&$country!=""&&$escolar!=""){//estan todos los campos llenos
            $query.=' (nombre like("%'.$nom.'%")) and puesto="'.$nompues.'" and genero="'.$genero.'" and pais="'.$country.'" and nivel_escolar="'.$escolar.'"';
        }
        if($nom!=""&&$nompues!=""&&$genero!=""&&$country!=""&&$escolar==""){//falta 1 campo
            $query.=' (nombre like("%'.$nom.'%")) and puesto="'.$nompues.'" and genero="'.$genero.'" and pais="'.$country.'"';
        }
        if($nom!=""&&$nompues!=""&&$genero!=""&&$country==""&&$escolar==""){
            $query.=' (nombre like("%'.$nom.'%")) and puesto="'.$nompues.'" and genero="'.$genero.'"';
        }
        if($nom!=""&&$nompues!=""&&$genero==""&&$country==""&&$escolar==""){
            $query.=' (nombre like("%'.$nom.'%")) and puesto="'.$nompues.'"';
        }
        if($nom!=""&&$nompues==""&&$genero==""&&$country==""&&$escolar==""){
            $query.=' (nombre like("%'.$nom.'%"))';
        }
        if($nom==""&&$nompues!=""&&$genero==""&&$country==""&&$escolar==""){
            $query.=' puesto="'.$nompues.'"';
        }
        if($nom==""&&$nompues==""&&$genero!=""&&$country==""&&$escolar==""){
            $query.=' genero="'.$genero.'"';
        }
        if($nom==""&&$nompues==""&&$genero==""&&$country!=""&&$escolar==""){
            $query.=' pais="'.$country.'"';
        }
        if($nom==""&&$nompues==""&&$genero==""&&$country==""&&$escolar!=""){
            $query.=' nivel_escolar="'.$escolar.'"';
        }
        if($nom!=""&&$nompues!=""&&$genero!=""&&$country==""&&$escolar!=""){
            $query.='(nombre like("%'.$nom.'%")) and puesto="'.$nompues.'" and genero="'.$genero.'" and nivel_escolar="'.$escolar.'"';
        }
        if($nom!=""&&$nompues!=""&&$genero==""&&$country!=""&&$escolar!=""){
            $query.='(nombre like("%'.$nom.'%")) and puesto="'.$nompues.'" and pais="'.$country.'" and nivel_escolar="'.$escolar.'"';
        }
        if($nom!=""&&$nompues==""&&$genero!=""&&$country!=""&&$escolar!=""){
            $query.='(nombre like("%'.$nom.'%")) and genero="'.$genero.'" and pais="'.$country.'" and nivel_escolar="'.$escolar.'"';
        }
        if($nom==""&&$nompues!=""&&$genero!=""&&$country!=""&&$escolar!=""){
            $query.=' puesto="'.$nompues.'" and genero="'.$genero.'" and pais="'.$country.'" and nivel_escolar="'.$escolar.'"';
        }
        if($nom!=""&&$nompues==""&&$genero!=""&&$country==""&&$escolar==""){
            $query.=' (nombre like("%'.$nom.'%")) and genero="'.$genero.'"';
        }
        if($nom!=""&&$nompues==""&&$genero==""&&$country!=""&&$escolar==""){
            $query.=' (nombre like("%'.$nom.'%")) and pais="'.$country.'"';
        }
        if($nom!=""&&$nompues==""&&$genero==""&&$country==""&&$escolar!=""){
            $query.=' (nombre like("%'.$nom.'%")) and nivel_escolar="'.$escolar.'"';
        }
        if($nom==""&&$nompues!=""&&$genero!=""&&$country==""&&$escolar==""){
            $query.=' puesto="'.$nompues.'" and genero="'.$genero.'"';
        }
        if($nom==""&&$nompues!=""&&$genero==""&&$country!=""&&$escolar==""){
            $query.=' puesto="'.$nompues.'" and pais="'.$country.'"';
        }
        if($nom==""&&$nompues!=""&&$genero==""&&$country==""&&$escolar!=""){
            $query.=' puesto="'.$nompues.'" and nivel_escolar="'.$escolar.'"';
        }
        if($nom==""&&$nompues==""&&$genero!=""&&$country!=""&&$escolar==""){
            $query.=' genero="'.$genero.'" and pais="'.$country.'"';
        }
        if($nom==""&&$nompues==""&&$genero!=""&&$country==""&&$escolar!=""){
            $query.=' genero="'.$genero.'" and nivel_escolar="'.$escolar.'"';
        }
        if($nom==""&&$nompues==""&&$genero==""&&$country!=""&&$escolar!=""){
            $query.=' pais="'.$country.'" and nivel_escolar="'.$escolar.'"';
        }
        if($op>0){
            if($op==1){
                $query.=' order by nombre ASC';
            }
            if($op==2){
                $query.=' order by puesto ASC';
            }
            if($op==3){
                $query.=' order by nivel_escolar ASC';
            }
            if($op==4){
                $query.=' order by genero ASC';
            }
            if($op==5){
                $query.=' order by pais ASC';
            }
            if($op==6){
                $query.=' order by nombre DESC';
            }
            if($op==7){
                $query.=' order by puesto DESC';
            }
            if($op==8){
                $query.=' order by nivel_escolar DESC';
            }
            if($op==9){
                $query.=' order by genero DESC';
            }
            if($op==10){
                $query.=' order by pais DESC';
            }
        }
        if($sqlQuery=mysqli_query(conecta(),$query)){
            $res=mysqli_fetch_assoc($sqlQuery);
            $total=$res["numero"];
        }
        return $total;
    }

    function excelEmp(){
        $arreglo=array();
        $query='select * from tbempleados';
        if($querySQL=mysqli_query(conecta(),$query)){
            $n=0;
            while($res=mysqli_fetch_assoc($querySQL)){
                $arreglo[$n][0]=$res["clave"];
                $arreglo[$n][1]=$res["nombre"];
                $arreglo[$n][2]=$res["numero"];
                $arreglo[$n][3]=$res["curp"];
                $arreglo[$n][4]=$res["rfc"];
                $arreglo[$n][5]=$res["direccion"];
                $arreglo[$n][6]=$res["numero_cuenta"];
                $arreglo[$n][7]=$res["puesto"];
                $arreglo[$n][8]=$res["fecha"];
                $arreglo[$n][9]=$res["nivel_escolar"];
                $arreglo[$n][10]=$res["genero"];
                $arreglo[$n][11]=$res["pais"];
                $arreglo[$n][12]=$res["clavepuesto"];
                $arreglo[$n][13]=$res["clavepais"];
                $n++; 
            }
        }

        return $arreglo;
    }

    function mostrarEmp($nom,$nompues,$genero,$country,$escolar,$op,$pagina,$maximo){
        $arreglo=array();
        $query='select * from tbempleados';
        if($nom!=""||$nompues!=""||$genero!=""||$country!=""||$escolar!=""){
            $query.=' where';
        }
        if($nom!=""&&$nompues!=""&&$genero!=""&&$country!=""&&$escolar!=""){//estan todos los campos llenos
            $query.=' (nombre like("%'.$nom.'%")) and puesto="'.$nompues.'" and genero="'.$genero.'" and pais="'.$country.'" and nivel_escolar="'.$escolar.'"';
        }
        if($nom!=""&&$nompues!=""&&$genero!=""&&$country!=""&&$escolar==""){//falta 1 campo
            $query.=' (nombre like("%'.$nom.'%")) and puesto="'.$nompues.'" and genero="'.$genero.'" and pais="'.$country.'"';
        }
        if($nom!=""&&$nompues!=""&&$genero!=""&&$country==""&&$escolar==""){
            $query.=' (nombre like("%'.$nom.'%")) and puesto="'.$nompues.'" and genero="'.$genero.'"';
        }
        if($nom!=""&&$nompues!=""&&$genero==""&&$country==""&&$escolar==""){
            $query.=' (nombre like("%'.$nom.'%")) and puesto="'.$nompues.'"';
        }
        if($nom!=""&&$nompues==""&&$genero==""&&$country==""&&$escolar==""){
            $query.=' (nombre like("%'.$nom.'%"))';
        }
        if($nom==""&&$nompues!=""&&$genero==""&&$country==""&&$escolar==""){
            $query.=' puesto="'.$nompues.'"';
        }
        if($nom==""&&$nompues==""&&$genero!=""&&$country==""&&$escolar==""){
            $query.=' genero="'.$genero.'"';
        }
        if($nom==""&&$nompues==""&&$genero==""&&$country!=""&&$escolar==""){
            $query.=' pais="'.$country.'"';
        }
        if($nom==""&&$nompues==""&&$genero==""&&$country==""&&$escolar!=""){
            $query.=' nivel_escolar="'.$escolar.'"';
        }
        if($nom!=""&&$nompues!=""&&$genero!=""&&$country==""&&$escolar!=""){
            $query.='(nombre like("%'.$nom.'%")) and puesto="'.$nompues.'" and genero="'.$genero.'" and nivel_escolar="'.$escolar.'"';
        }
        if($nom!=""&&$nompues!=""&&$genero==""&&$country!=""&&$escolar!=""){
            $query.='(nombre like("%'.$nom.'%")) and puesto="'.$nompues.'" and pais="'.$country.'" and nivel_escolar="'.$escolar.'"';
        }
        if($nom!=""&&$nompues==""&&$genero!=""&&$country!=""&&$escolar!=""){
            $query.='(nombre like("%'.$nom.'%")) and genero="'.$genero.'" and pais="'.$country.'" and nivel_escolar="'.$escolar.'"';
        }
        if($nom==""&&$nompues!=""&&$genero!=""&&$country!=""&&$escolar!=""){
            $query.=' puesto="'.$nompues.'" and genero="'.$genero.'" and pais="'.$country.'" and nivel_escolar="'.$escolar.'"';
        }
        if($nom!=""&&$nompues==""&&$genero!=""&&$country==""&&$escolar==""){
            $query.=' (nombre like("%'.$nom.'%")) and genero="'.$genero.'"';
        }
        if($nom!=""&&$nompues==""&&$genero==""&&$country!=""&&$escolar==""){
            $query.=' (nombre like("%'.$nom.'%")) and pais="'.$country.'"';
        }
        if($nom!=""&&$nompues==""&&$genero==""&&$country==""&&$escolar!=""){
            $query.=' (nombre like("%'.$nom.'%")) and nivel_escolar="'.$escolar.'"';
        }
        if($nom==""&&$nompues!=""&&$genero!=""&&$country==""&&$escolar==""){
            $query.=' puesto="'.$nompues.'" and genero="'.$genero.'"';
        }
        if($nom==""&&$nompues!=""&&$genero==""&&$country!=""&&$escolar==""){
            $query.=' puesto="'.$nompues.'" and pais="'.$country.'"';
        }
        if($nom==""&&$nompues!=""&&$genero==""&&$country==""&&$escolar!=""){
            $query.=' puesto="'.$nompues.'" and nivel_escolar="'.$escolar.'"';
        }
        if($nom==""&&$nompues==""&&$genero!=""&&$country!=""&&$escolar==""){
            $query.=' genero="'.$genero.'" and pais="'.$country.'"';
        }
        if($nom==""&&$nompues==""&&$genero!=""&&$country==""&&$escolar!=""){
            $query.=' genero="'.$genero.'" and nivel_escolar="'.$escolar.'"';
        }
        if($nom==""&&$nompues==""&&$genero==""&&$country!=""&&$escolar!=""){
            $query.=' pais="'.$country.'" and nivel_escolar="'.$escolar.'"';
        }
        if($op>0){
            if($op==1){
                $query.=' order by nombre ASC';
            }
            if($op==2){
                $query.=' order by puesto ASC';
            }
            if($op==3){
                $query.=' order by nivel_escolar ASC';
            }
            if($op==4){
                $query.=' order by genero ASC';
            }
            if($op==5){
                $query.=' order by pais ASC';
            }
            if($op==6){
                $query.=' order by nombre DESC';
            }
            if($op==7){
                $query.=' order by puesto DESC';
            }
            if($op==8){
                $query.=' order by nivel_escolar DESC';
            }
            if($op==9){
                $query.=' order by genero DESC';
            }
            if($op==10){
                $query.=' order by pais DESC';
            }
        }
        $indice=$pagina*$maximo;
            $query.=' limit '.$indice.', '.$maximo;
        if($querySQL=mysqli_query(conecta(),$query)){
            $n=0;
            while($res=mysqli_fetch_assoc($querySQL)){
                $arreglo[$n][0]=$res["clave"];
                $arreglo[$n][1]=$res["nombre"];
                $arreglo[$n][2]=$res["numero"];
                $arreglo[$n][3]=$res["curp"];
                $arreglo[$n][4]=$res["rfc"];
                $arreglo[$n][5]=$res["direccion"];
                $arreglo[$n][6]=$res["numero_cuenta"];
                $arreglo[$n][7]=$res["puesto"];
                $arreglo[$n][8]=$res["fecha"];
                $arreglo[$n][9]=$res["nivel_escolar"];
                $arreglo[$n][10]=$res["genero"];
                $arreglo[$n][11]=$res["pais"];
                $arreglo[$n][12]=$res["clavepuesto"];
                $arreglo[$n][13]=$res["clavepais"];
                $n++; 
            }
        }

        return $arreglo;
    }
}

?>