<div class="contenedor-principal">
  <?php
  
  if(isset($_REQUEST["registrar"])){
    if($error==0){
      ?>
      <div class="msj_exito"><span>Permisos registrados</span></div>
      <?php
    }
    else if($error==1){
      ?>
      <div class="msj_error"><span>Por favor seleccione un módulo y tipo de usuario</span></div>
      <?php
    }
    else if($error==2){
      ?>
      <div class="msj_error"><span>Ocurrió un error al registrar</span></div>
      <?php
    }
    else if($error==3){
      ?>
      <div class="msj_error"><span>Ya han sido registrados todos los permisos para este rol</span></div>
      <?php
    }
    else if($error==4){
      ?>
      <div class="msj_error"><span>Ya existe el permiso y rol</span></div>
      <?php
    }
  }
  
  ?>
  
  <h2 class="encabezado">Gestión de roles y permisos</h2>
  <form action="?pag=14" method="post" class="form-inputs-muchos">
    <span class="nota-form">Nota: los campos marcados con * son obligatorios</span>
    <div class="container-inputs">
      <label>Seleccione un rol: </label>
      <select class="" name="rol">
      <option value="0">Seleccione</option>
      <?php
          $query='select * from roles';
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
      <label>Seleccione un módulo: </label>
      <select class="" name="modulo">
        <option value="0">Seleccione</option>
      <?php
          $query='select * from modulos';
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
      <div class="emple-button-box">
            <span class="tit-button">Permisos: * </span> 
            <div class="checkbox">
                <div>
                    <input type="checkbox" id="alta" name="alta" value="1">
                    <label for="alta">Dar de alta</label>
                </div>
                <div>
                    <input type="checkbox" id="baja" name="baja" value="2">
                    <label for="baja">Dar de baja</label>
                </div>
                <div>
                    <input type="checkbox" id="edita" name="edita" value="3">
                    <label for="edita">Actualizar informacion</label>
                </div>
            </div>
        </div>
    </div>
    <div class="container-buttons">
      <input type="submit" name="registrar" value="Registrar permisos">
    </div>
  </form>
</div>
