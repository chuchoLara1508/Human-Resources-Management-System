<?php 

function menu($op){
  if((isset($_SESSION["user"])&& isset($_SESSION["pass"])||isset($_SESSION["rol"]))
  &&
  (!empty($_SESSION["user"])&&!empty($_SESSION["pass"])||!empty($_SESSION["rol"]))
){
  $arr1=guardarRolesPermisos($_SESSION["clvrol"]);//dar de alta
  $arr2=actualizarRolesPermisos($_SESSION["clvrol"]);//actualizar
  $arr3=eliminarRolesPermisos($_SESSION["clvrol"]);//eliminar
}
    switch($op){
        case 1:
          include('control/ctrlValidaSes.php');
        break;
        case 2:
            include('vistas/vistMenu.php');
            include('vistas/vistPrincipal.php');
        break;    
        //inicio departamentos
        case 3:
            include('vistas/vistMenu.php');
            
            if($arr3[2]==1){
          if(isset($_GET["clv"])&&!empty($_GET["clv"])){
            include('control/ctrlValidaQuitarDepto.php');
          }
        }
          if($arr1[2]==1){//me quede en incapacidad
          include('control/ctrlValidaDepto.php');
          include('vistas/vistDepartamento.php');
          }
          if(validaNoExisteRegistro("tbdepartamentos")){
            ?>
            <div class="msj_error"><span>No hay departamentos registrados</span></div>
            <?php
          }
          else{
            include('control/ctrlBuscarDepto.php');
            include('vistas/vistBuscarDepto.php');
            include('vistas/vistPaginadorDepto.php');
            include('vistas/vistTablaDepto.php');
          }
        break;

        case 4:
          include('vistas/vistMenu.php');
          if($arr2[2]==1){
            include('control/ctrlValidaEditarDepto.php');
            if(isset($_GET["clv"])&&!empty($_GET["clv"])){
              include('vistas/vistEditDepto.php');
            }
            if(!isset($_GET["clv"])||empty($_GET["clv"])){
              include('control/ctrlValidaDepto.php');
              include('vistas/vistDepartamento.php');
            }
          }
          if(validaNoExisteRegistro("tbdepartamentos")){
            ?>
            <div class="msj_error"><span>No hay departamentos registrados</span></div>
            <?php
          }
          else{
            include('control/ctrlBuscarDepto.php');
            include('vistas/vistBuscarDepto.php');
            include('vistas/vistPaginadorDepto.php');
            include('vistas/vistTablaDepto.php');
          }
        break;
          //fin departamentos
          //inicio puestos
        case 5:
            include('vistas/vistMenu.php');
            if($arr3[0]==1){
              if(isset($_GET["clv"])&&!empty($_GET["clv"])){
                include('control/ctrlValidaQuitarPuesto.php');
              }
            }
          
            if($arr1[0]==1){
              include('control/ctrlValidaPuesto.php');
              include("vistas/vistPuesto.php");
            }
          if(validaNoExisteRegistro("tbpuestos")){
            ?>
            <div class="msj_error"><span>No hay puestos registrados</span></div>
            <?php
          }else{
            include('control/ctrlValidaBuscarPuesto.php');
            include('vistas/vistBuscarPuesto.php');
            include('vistas/vistPaginadorPuesto.php');
            include('vistas/vistTablaPuesto.php');
          }
        break;

        case 6:
            include('vistas/vistMenu.php');
            if(isset($arr2)){
              if($arr2[0]==1){
                include('control/ctrlValidaEditarPuesto.php');
                if(isset($_GET["clv"])&&!empty($_GET["clv"])){
                  include('vistas/vistEditPuesto.php');
                }
                if(!isset($_GET["clv"])||empty($_GET["clv"])){
                  include('control/ctrlValidaPuesto.php');
                  include('vistas/vistPuesto.php');
                }
              }
            }
          if(validaNoExisteRegistro("tbpuestos")){
            ?>
            <div class="msj_error"><span>No hay puestos registrados</span></div>
            <?php
          }
          else{
            include('control/ctrlValidaBuscarPuesto.php');
            include('vistas/vistBuscarPuesto.php');
            include('vistas/vistPaginadorPuesto.php');
            include('vistas/vistTablaPuesto.php');
          }
        break;
          //fin puestos
          //inicio empleados
        case 7:
            include('vistas/vistMenu.php');
            if($arr3[4]==1){
            if(isset($_GET["clv"])&&!empty($_GET["clv"])){
              include('control/ctrlValidaQuitarEmp.php');
            }
        }
          if($arr1[4]==1){
            include('control/ctrlValidaEmpleado.php');
            include('vistas/vistEmpleado.php');
          }
          if(validaNoExisteRegistro("tbempleados")){
            ?>
            <div class="msj_error"><span>No hay empleados registrados</span></div>
            <?php
          }
          else{
            include('control/ctrlValidaBuscarEmp.php');
            include('vistas/vistBuscarEmp.php');
            include('vistas/vistPaginadorEmp.php');
            include('vistas/vistTablaEmp.php');
          }
        break;

        case 8:
            include('vistas/vistMenu.php');
            if($arr2[4]==1){
              include('control/ctrlEditaEmpleado.php');
              if(isset($_GET["clv"])&&!empty($_GET["clv"])){
                include('vistas/vistEditaEmpleado.php');
              }
              if(!isset($_GET["clv"])||empty($_GET["clv"])){
                include('control/ctrlValidaEmpleado.php');
                include('vistas/vistEmpleado.php');
              }
            }
          if(validaNoExisteRegistro("tbempleados")){
            ?>
            <div class="msj_error"><span>No hay empleados registrados</span></div>
            <?php
          }
          else{
            include('control/ctrlValidaBuscarEmp.php');
            include('vistas/vistBuscarEmp.php');
            include('vistas/vistPaginadorEmp.php');
            include('vistas/vistTablaEmp.php');
          }
        break;  
          //fin empleados
          //inicio incapacidad
        case 9:
            include('vistas/vistMenu.php');
            if($arr3[5]==1){
          if(isset($_GET["clv"])&&!empty($_GET["clv"])){
            include('control/ctrlValidaQuitarInc.php');
          }
        }
          if($arr1[5]==1){
          include('control/ctrlValidaIncapacidad.php');
          include('vistas/vistIncapacidad.php');
          }
          if(validaNoExisteRegistro("tbincapacidades")){
            ?>
            <div class="msj_error"><span>No hay incapacidades registradas</span></div>
            <?php
          }
          else{
            include('control/ctrlBuscarInc.php');
            include('vistas/vistBuscarInc.php');
            include('vistas/vistPaginadorInc.php');
          include('vistas/vistTablaInc.php');
          }
        break;
        
        case 10:
            include('vistas/vistMenu.php');
            if($arr2[1]==1){
              include('control/ctrlValidaEditInc.php');
              if(isset($_GET["clv"])&&!empty($_GET["clv"])){
                include('vistas/vistEditInc.php');
              }
              if(!isset($_GET["clv"])||empty($_GET["clv"])){
                  include('control/ctrlValidaIncapacidad.php');
                  include('vistas/vistIncapacidad.php');
              }
            }
            if(validaNoExisteRegistro("tbincapacidades")){
              ?>
              <div class="msj_error"><span>No hay incapacidades registradas</span></div>
              <?php
            }
            else{
              include('control/ctrlBuscarInc.php');
              include('vistas/vistBuscarInc.php');
              include('vistas/vistPaginadorInc.php');
            include('vistas/vistTablaInc.php');
            }
        break;  
            //fin incapacidades
            //inicio nominas
        case 11:
            include('vistas/vistMenu.php');
            if($arr3[1]==1){
          if(isset($_GET["clv"])&&!empty($_GET["clv"])){
            include('control/ctrlValidaQuitarNomina.php');
          }
        }
          if($arr1[1]==1){
            include('control/ctrlValidaNomina.php');
          }
          
          if(validaNoExisteRegistro("tbnominas")){
            ?>
            <div class="msj_error"><span>No hay nóminas registradas</span></div>
            <?php
          }
          else{
            include('control/ctrlValidaBuscarNomina.php');
            include('vistas/vistBuscarNomina.php');
            include('vistas/vistPaginadorNomina.php');
            include('vistas/vistTablaNomina.php');
          }
         
        break;
        case 12:
            include('vistas/vistMenu.php');
            if($arr1[1]==1){
          include('control/ctrlRegistro.php');
            }
          if(validaNoExisteRegistro("tbnominas")){
            ?>
            <div class="msj_error"><span>No hay nóminas registradas</span></div>
            <?php
          }
          else{
            include('control/ctrlValidaBuscarNomina.php');
            include('vistas/vistBuscarNomina.php');
            include('vistas/vistPaginadorNomina.php');
            include('vistas/vistTablaNomina.php');
          }
            
        break; 
          case 13:
            include('vistas/vistMenu.php');
            if($arr2[1]==1){
              include('control/ctrlValidaEditNomina.php');
              if(isset($_GET["clv"])&&!empty($_GET["clv"])){
                include('vistas/vistEditNomina.php');
              }
              if(!isset($_GET["clv"])||empty($_GET["clv"])){
                include('control/ctrlValidaNomina.php');
                include('vistas/vistNomina.php');
              }
            }
          if(validaNoExisteRegistro("tbnominas")){
            ?>
            <div class="msj_error"><span>No hay nóminas registradas</span></div>
            <?php
          }
          else{
            include('control/ctrlValidaBuscarNomina.php');
            include('vistas/vistBuscarNomina.php');
            include('vistas/vistPaginadorNomina.php');
            include('vistas/vistTablaNomina.php');
          }
           //fin nominas
           //inicio rolpermiso
        break;  
        case 14:
            include('vistas/vistMenu.php');
            if(isset($_SESSION["rol"])&&!empty($_SESSION["rol"])){
              if($_SESSION["rol"]=="SuperAdministrador de RH"){
              include('control/ctrlValidaRolPermiso.php');
              include('vistas/vistRolPermiso.php');
              if(validaNoExisteRegistro("tbrolespermisos")){
              ?>
                <div class="msj_error"><span>No hay roles-permisos registrados</span></div>
              <?php
            }
            else{
              include('control/ctrlBuscarRP.php');
              include('vistas/vistBuscarRP.php');
              include('vistas/vistPaginadorRP.php');
              include('vistas/vistTablaRP.php');
            }
          }
          else{
            include('vistas/vistNotFound.php');
          }
        }
        break;
        
        case 15:
            include('vistas/vistMenu.php');
            if(isset($_SESSION["rol"])&&!empty($_SESSION["rol"])){
              if($_SESSION["rol"]=="SuperAdministrador de RH"){
                include('control/ctrlValidaEditRP.php');
                include('vistas/vistEditRP.php');
                if(validaNoExisteRegistro("tbrolespermisos")){
                  ?>
                    <div class="msj_error"><span>No hay roles-permisos registrados</span></div>
                  <?php
                }
                else{
                  include('control/ctrlBuscarRP.php');
                  include('vistas/vistBuscarRP.php');
                  include('vistas/vistPaginadorRP.php');
                  include('vistas/vistTablaRP.php');
                }
              }
              else{
                include('vistas/vistNotFound.php');
              }
            }
        break;
          //fin rolpermiso
          //inicio usuarios
        case 16:
          if($arr3[3]==1){
            if(isset($_GET["clv"])&&!empty($_GET["clv"])){
              include('control/ctrlValidaQuitarUsu.php');
            }
          }
            include('vistas/vistMenu.php');
            if($arr1[3]==1){
              include('control/ctrlValidaUsuario.php');
              include('vistas/vistUsuarios.php');
            }
            if(validaNoExisteRegistro("tbusuarios")){
              ?>
              <div class="msj_error"><span>No hay usuarios registrados</span></div>
              <?php
            }
            else{//agregacion nomina con empleado,puesto,cdepartamento
              include('control/ctrlBuscarUsu.php');
              include('vistas/vistBuscarUsu.php');
              include('vistas/vistPaginadorUsu.php');
              include('vistas/vistTablaUsu.php');
            }
        break; 
        //fin usuarios
        case 17:
          if((isset($_SESSION["user"])&&!empty($_SESSION["user"]))
            &&
            (isset($_SESSION["pass"])&&!empty($_SESSION["pass"]))
          ){
            unset($_SESSION["user"]);
            unset($_SESSION["pass"]);
            session_destroy();
            header('location:?');
          }
        break;

        default:
        include('vistas/vistMenu.php');
        include('vistas/vistNotFound.php');
      }
}

?>