<div class="contenedor-principal">
  <?php
  if(isset($_REQUEST['buscarClv'])){
    if(!($error=="")){
      ?>
      <div class="msj_error"><span><?php echo $error; ?></span></div>
      <?php
    }
  }

  if(isset($err)){
    if($err==0){
      ?>
      <div class="msj_exito"><span>Nómina eliminada</span></div>
      <?php
    }
    if($err==1){
      ?>
      <div class="msj_error"><span>Ocurrió un error al eliminar</span></div>
      <?php
    }
  }

  if(isset($_REQUEST["edit"])){
    if($erro==0){
      ?>
      <div class="msj_exito"><span>La nómina se editó correctamente</span></div>
      <?php
    }
    else if($erro==1){
      ?>
      <div class="msj_error"><span>Error en uno o más datos</span></div>
      <?php
    }
    else if($erro==2){
      ?>
      <div class="msj_error"><span>Ocurrió un error al editar</span></div>
      <?php
    }
  
  }


  ?>
  <h2 class="encabezado">Gestión de nóminas</h2>
  <form action="?pag=11" method="post" class="form-inputs-muchos">
    <span class="nota-form">Nota: los campos marcados con * son obligatorios</span>
    <div class="container-inputs">
      <label>Ingresar clave de empleado: </label>
      <input type="text" name="clave" value="">
    </div>
    <div class="container-buttons">
      <input type="submit" name="buscarClv" value="Buscar">
    </div>
  </form>
  
</div>