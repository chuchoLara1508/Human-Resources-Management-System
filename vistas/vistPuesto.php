<div class="contenedor-principal">
  <?php
  if(isset($_REQUEST["regPuesto"])){
    if($error==0){
      ?>
      <div class="msj_exito"><span>El puesto se registró correctamente</span></div>
      <?php
    }
    else if($error==1){
      ?>
      <div class="msj_error"><span>Faltan datos por llenar</span></div>
      <?php
    }
    else if($error==2){
      ?>
      <div class="msj_error"><span>Ocurrió un error al registrar</span></div>
      <?php
    }
    else if($error==3){
      ?>
      <div class="msj_error"><span>Ya existe un puesto con este nombre.</span></div>
      <?php
    }
  }

  if(isset($err)){
    if($err==0){
      ?>
          <div class="msj_exito"><span>Puesto eliminado</span></div>
      <?php
    }
    if($err==1){
      ?>
          <div class="msj_error"><span>Ocurrió un error al eliminar</span></div>
      <?php
    }
  }

  if(isset($_REQUEST["editaPuesto"])){
    if($error==0){
      ?>
      <div class="msj_exito"><span>El puesto se editó con exito!</span></div>
      <?php
    }
    else if($error==1){
      ?>
      <div class="msj_error"><span>Ingrese todos los datos</span></div>
      <?php
    }
    else if($error==2){
      ?>
      <div class="msj_error"><span>Ocurrió un error al editar</span></div>
      <?php
    }
  }


  ?>
  <h2 class="encabezado">Gestión de puestos</h2>
  <form  action="?pag=5" method="post" class="form-inputs-muchos">
    <span class="nota-form">Nota: los campos marcados con * son obligatorios</span>
    <div class="container-inputs">
      <label>Nombre del puesto: * </label>
      <input type="text" maxlength="25" onkeypress="return soloLetras(event);" name="nombrePuesto" value="<?php if(isset($_POST['nombrePuesto'])){echo $_POST['nombrePuesto'];}?>">
      <label>Descripción del puesto: *</label>
      <textarea name="descPuesto" maxlength="25"><?php if(isset($_POST['descPuesto'])){echo $_POST['descPuesto'];}?></textarea>
      <label>Departamento al que pertenece:* </label>
      <select class="" name="deptoPuesto">
        <option value="0">Seleccione</option>
        <?php
          $query='select * from tbdepartamentos';
          if($querySQL=mysqli_query(conecta(),$query)){
            $cont=1;
            while($res=mysqli_fetch_assoc($querySQL)){
              ?>
              <option value="<?php echo $cont; ?>"
              <?php
                if(isset($_POST["deptoPuesto"])&&($cont)==$_POST["deptoPuesto"]){
                  echo 'selected';
                }
              ?>
              ><?php echo $res["nombre"]; ?></option>
              <?php
              $cont++;
            }
          }
        ?>
      </select>
      <label>Pago por hora:* </label>
      <input type="number" onkeypress="return soloNumeros(event);" name="pagoPuesto" min="20" max="100" step="0.5" value="<?php if(isset($_POST['pagoPuesto'])){echo $_POST['pagoPuesto'];}?>">
    </div>
    <div class="container-buttons">
      <input type="submit" name="regPuesto" value="Registrar puesto">
    </div>
  </form>
  <script src="js/soloNumerosLetras.js"></script>
</div>
