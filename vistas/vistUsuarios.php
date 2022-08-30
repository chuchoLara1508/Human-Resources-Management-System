
<div class="contenedor-principal">
  <?php
  
  if(isset($_REQUEST["alta"])){
    if($error==0){
      ?>
      <div class="msj_exito"><span>El usuario se registró correctamente</span></div>
      <?php
    }
    else if($error==1){
      ?>
      <div class="msj_error"><span>Uno o más datos faltantes o incorrectos</span></div>
      <?php
    }
    else if($error==2){
      ?>
      <div class="msj_error"><span>Ocurrió un error al registrar</span></div>
      <?php
    }
    else if($error==3){
      ?>
      <div class="msj_error"><span>No se pudo registrar al usuario</span></div>
      <?php
    }
    else if($error==4){
      ?>
      <div class="msj_error"><span>El correo electrónico ya existe</span></div>
      <?php
    }
  }
  
  if(isset($err)){
    if($err==0){
      ?>
          <div class="msj_exito"><span>Usuario eliminado</span></div>
      <?php
    }
    if($err==1){
      ?>
          <div class="msj_error"><span>Ocurrió un error al eliminar</span></div>
      <?php
    }
  }

  ?>
  
  
  <h2 class="encabezado">Gestión de usuarios</h2>
  <form action="?pag=16" method="post" class="form-inputs-muchos">
    <span class="nota-form">Nota: los campos marcados con * son obligatorios</span>
    <div class="container-inputs">
      <label>Empleado: </label>
      <select name="empleado">
      <option value="0">Seleccione</option>
      <?php
          $query='select clave,nombre from tbempleados';
          if($querySQL=mysqli_query(conecta(),$query)){
            $cont=1;
            while($res=mysqli_fetch_assoc($querySQL)){
              ?>
              <option value="<?php echo $cont; ?>"
              <?php
                
              ?>
              ><?php echo $res["clave"]." | ".$res["nombre"]; ?></option>
              <?php
              $cont++;
            }
          }
        ?>
      </select>
      <label>Rol: </label>
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
      <label>Correo electronico: </label>
      <input type="email" name="correo" value="">
    </div>
    <div class="container-buttons">
      <input type="submit" name="alta" value="Dar de alta">
    </div>
  </form>
</div>
