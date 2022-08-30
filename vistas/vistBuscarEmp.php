<?php 
 $arr1=guardarRolesPermisos($_SESSION["clvrol"]);//dar de alta
 $arr2=actualizarRolesPermisos($_SESSION["clvrol"]);//actualizar
 $arr3=eliminarRolesPermisos($_SESSION["clvrol"]);//eliminar
 if($arr1[4]==0){
?>
<div class="contenedor-principal">
            <h2 class="encabezado">Búsqueda</h2>
<form action="?pag=7" method="post" class="form-busqueda">
        <div class="input-busc">
          <label>Nombre: </label>
          <input type="text" name="nombreE">
        </div>
        <div class="input-busc">
          <label>Puesto: </label>
          <select name="puestoE">
              <option value="0">Todos</option>
              <?php
                                  $query='select * from tbpuestos';
                                  if($querySQL=mysqli_query(conecta(),$query)){
                                      $cont=1;
                                      while($res=mysqli_fetch_assoc($querySQL)){
                              ?>
                              <option value="<?php echo $cont; ?>"
                              <?php
              
                              ?>
                              ><?php echo $res["nombre"]; ?></option>
                              <?php
                                          $cont++;
                                      }
                                  }
                              ?>
          </select>
        </div>
    <div class="input-busc">
    <label>País: </label>
    <select name="paisN" id="">
        <option value="0">Todos</option>
    <?php
    
    $query='select * from pais';
                          if($querySQL=mysqli_query(conecta(),$query)){
                            while($res=mysqli_fetch_assoc($querySQL)){
                        ?>
                        <option value="<?php echo $res["id"]; ?>"><?php echo $res["paisnombre"]; ?></option>
                      <?php
                          }
                        }
                      ?>
    </select>  
  </div>
  <div class="input-busc">
    <label>Nivel escolar:</label>
    <select name="nivelEs">
      <option value="0">Todos</option>
      <option value="1">Universidad</option>
      <option value="2">Maestría</option>
      <option value="3">Doctorado</option>
    </select>
  </div>
  <div class="input-busc">
    <label>Ordenar: </label>
    <select name="ordenar" id="">
      <option value="0">Sin ordenar</option>
      <option value="1">A-Z(Nombre)</option>
      <option value="2">A-Z(Puesto)</option>
      <option value="3">A-Z(Nivel Escolar)</option>
      <option value="4">A-Z(Género)</option>
      <option value="5">A-Z(País de origen)</option>
      <option value="6">Z-A(Nombre)</option>
      <option value="7">Z-A(Puesto)</option>
      <option value="8">Z-A(Nivel Escolar)</option>
      <option value="9">Z-A(Género)</option>
      <option value="10">Z-A(País de origen)</option>
    </select>
  </div>
  <input type="submit" value="Buscar">
</form>

</div>

<?php

 }
 else{
   ?>
   <h2 class="encabezado">Búsqueda</h2>
<form action="?pag=7" method="post" class="form-busqueda">
        <div class="input-busc">
          <label>Nombre: </label>
          <input type="text" name="nombreE">
        </div>
        <div class="input-busc">
          <label>Puesto: </label>
          <select name="puestoE">
              <option value="0">Todos</option>
              <?php
                                  $query='select * from tbpuestos';
                                  if($querySQL=mysqli_query(conecta(),$query)){
                                      $cont=1;
                                      while($res=mysqli_fetch_assoc($querySQL)){
                              ?>
                              <option value="<?php echo $cont; ?>"
                              <?php
              
                              ?>
                              ><?php echo $res["nombre"]; ?></option>
                              <?php
                                          $cont++;
                                      }
                                  }
                              ?>
          </select>
        </div>
    <div class="input-busc">
    <label>País: </label>
    <select name="paisN" id="">
        <option value="0">Todos</option>
    <?php
    
    $query='select * from pais';
                          if($querySQL=mysqli_query(conecta(),$query)){
                            while($res=mysqli_fetch_assoc($querySQL)){
                        ?>
                        <option value="<?php echo $res["id"]; ?>"><?php echo $res["paisnombre"]; ?></option>
                      <?php
                          }
                        }
                      ?>
    </select>  
  </div>
  <div class="input-busc">
    <label>Nivel escolar:</label>
    <select name="nivelEs">
      <option value="0">Todos</option>
      <option value="1">Universidad</option>
      <option value="2">Maestría</option>
      <option value="3">Doctorado</option>
    </select>
  </div>
  <div class="input-busc">
    <label>Ordenar: </label>
    <select name="ordenar" id="">
      <option value="0">Sin ordenar</option>
      <option value="1">A-Z(Nombre)</option>
      <option value="2">A-Z(Puesto)</option>
      <option value="3">A-Z(Nivel Escolar)</option>
      <option value="4">A-Z(Género)</option>
      <option value="5">A-Z(País de origen)</option>
      <option value="6">Z-A(Nombre)</option>
      <option value="7">Z-A(Puesto)</option>
      <option value="8">Z-A(Nivel Escolar)</option>
      <option value="9">Z-A(Género)</option>
      <option value="10">Z-A(País de origen)</option>
    </select>
  </div>
  <input type="submit" value="Buscar">
</form>
   <?php
 }