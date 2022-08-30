<div class="contenedor-principal">
  <?php
  if(isset($_REQUEST["registroDepa"])){
    if($error==0){
      ?>
      <div class="msj_exito"><span>El departamento se registró correctamente</span></div>
      <?php
    }
    else if($error==1){
      ?>
      <div class="msj_error"><span>Por favor ingrese un nombre</span></div>
      <?php
    }
    else if($error==2){
      ?>
      <div class="msj_error"><span>Ocurrió un error al registrar</span></div>
      <?php
    }
    else if($error=3){
      ?>
      <div class="msj_error"><span>El departamento ya existe. Ingrese otro nombre</span></div>
      <?php
    }
  }

  if(isset($err)){
    if($err==0){
      ?>
          <div class="msj_exito"><span>Departamento eliminado</span></div>
      <?php
    }
    if($err==1){
      ?>
          <div class="msj_error"><span>Ocurrió un error al eliminar</span></div>
      <?php
    }
  }

  if(isset($_REQUEST["editarDepa"])){
    if($error==0){
      ?>
      <div class="msj_exito"><span>El departamento se editó con exito!</span></div>
      <?php
    }
    else if($error==1){
      ?>
      <div class="msj_error"><span>Por favor ingrese un nombre</span></div>
      <?php
    }
    else if($error==2){
      ?>
      <div class="msj_error"><span>Ocurrió un error al editar</span></div>
      <?php
    }
  }

  ?>
  
  <h2 class="encabezado">Gestión de departamentos</h2>
  <form action="?pag=3" method="post" class="form-inputs-muchos">
    <span class="nota-form">Nota: los campos marcados con * son obligatorios</span>
    <div class="container-inputs">
      <label for="">Nombre del departamento: *</label>
      <input type="text" onkeypress="return soloLetras(event);" maxlength="25" name="nombreDepa" value="<?php if(isset($_POST['nombreDepa'])){echo $_POST['nombreDepa'];}?>">
      <label>Descripción del departamento: </label>
      <textarea name="descDepa" maxlength="50"><?php if(isset($_POST['descDepa'])){echo $_POST['descDepa'];}?></textarea>
    </div>
    <div class="container-buttons">
      <input type="submit" name="registroDepa" value="Registrar departamento">
      <input type="reset" value="Limpiar formulario">
    </div>
  </form>
  <script src="js/soloNumerosLetras.js"></script>
</div>
