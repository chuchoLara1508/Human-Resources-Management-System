<div class="contenedor-principal">
  <?php
  if(isset($_REQUEST["registroInc"])){
    if(!($error=="")){
    ?>
    <div class="msj_error"><span><?php echo $error; ?></span></div>
    <?php
    }
    else{
      if(!($registro=="")){
        ?>
        <div class="msj_exito"><span><?php echo $registro; ?></span></div>
        <?php
      }
    }
  }

  if(isset($err)){
    if($err==0){
      ?>
          <div class="msj_exito"><span>Incapacidad eliminada</span></div>
      <?php
    }
    if($err==1){
      ?>
          <div class="msj_error"><span>Ocurrió un error al eliminar</span></div>
      <?php
    }
  }

  if(isset($_REQUEST["editarInc"])){
    if($er==0){
      ?>
          <div class="msj_exito"><span>Incapacidad editada con éxito</span></div>
      <?php
    }
    if($er==1){
      ?>
          <div class="msj_error"><span>Por favor ingrese un nombre</span></div>
      <?php
    }
    if($er==2){
      ?>
          <div class="msj_error"><span>Ocurrió un error al editar</span></div>
      <?php
    }
}

  ?>
  
  <h2 class="encabezado">Gestión de incapacidad</h2>
  <form  action="?pag=9" method="post" class="form-inputs-muchos">
    <span class="nota-form">Nota: los campos marcados con * son obligatorios</span>
    <div class="container-inputs">
      <label>Nombre de la incpacidad: *</label>
      <input type="text" maxlength="25" onkeypress=" return soloLetras(event)" name="nombreInc" value="<?php if(isset($_POST['nombreInc'])){echo $_POST['nombreInc'];}?>">
      <label>Porcentaje de descuento: *</label>
      <input type="number" onkeypress="return soloNumeros(event)" min="0" max="100" name="descInc" value="<?php if(isset($_POST['descInc'])){echo $_POST['descInc'];}?>">
    </div>
    <div class="container-buttons">
      <input type="submit" name="registroInc" value="Registrar">
    </div>
  </form>
  
  <script src="js/soloNumerosLetras.js"></script>
</div>