<div class="contenedor-principal">
  <?php
  if(isset($_REQUEST["calNomina"])){
    if($error==0){
      ?>
      <div class="msj_exito"><span>La nómina se registró correctamente</span></div>
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
  
  }
  ?>
  
  <?php
  
  if(isset($_POST["clave"])&&!empty($_POST["clave"])){
      $query='select * from tbempleados where clave="'.$_POST["clave"].'"';
      $resultado=mysqli_query(conecta(),$query);
      while($mostrar=mysqli_fetch_assoc($resultado)){
          ?>
          <form action="?pag=12" method="post" class="form-inputs-muchos">
                  <span class="nota-form">Nota: los datos con * son obligatorios</span>
                  <div class="container-inputs">
                    <label>Clave: </label>
                    <input readonly type="text" value="<?php echo $mostrar["clave"]; ?>"name="clave">
                    <label>Nombre:</label>
                    <input readonly type="text" onkeypress=" return soloLetras(event)" name="nombre" value="<?php echo $mostrar["nombre"]; ?>">
                    <label>Fecha inicio nómina: *</label>
                    <input type="date" value="<?php if(isset($_POST["fechaI"])){echo $_POST["fechaI"];} ?>" name="fechaI">
                    <label>Fecha fin nómina: *</label>
                    <input type="date" value="<?php if(isset($_POST["fechaF"])){echo $_POST["fechaF"];} ?>" name="fechaF">
                    <label>Fecha de pago: *</label>
                    <input type="date" value="<?php if(isset($_POST["fechaP"])){echo $_POST["fechaP"];} ?>" name="fechaP">
                    <label>Horas trabajadas diaras: *</label>
                    <input type="number" value="<?php if(isset($_POST["horas"])){echo $_POST["horas"];} ?>" name="horas">
                    <label>Incapacidad: </label>
                    <select name="incapacidad">
                        <option value="0">Seleccione</option>
                        <?php 
                            $query='select * from tbincapacidades';
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
                    </select>*
                    <label>Días de incapacidad: *</label>
                    <input type="number" onkeypress="return soloNumeros(event)" value="<?php if(isset($_POST["dias"])){echo $_POST["dias"];} ?>" name="dias" min="0" max="5">
                    <label>Descuento ISR: *</label>
                    <input type="number" onkeypress="return soloNumeros(event)" value="<?php if(isset($_POST["descISR"])){echo $_POST["descISR"];} ?>" name="descISR" min="0" max="500" step="0.5">
                    <label>Descuento IMSS: *</label>
                    <input type="number" onkeypress="return soloNumeros(event)" name="descIMSS" value="<?php if(isset($_POST["descIMSS"])){echo $_POST["descIMSS"];} ?>" min="0" max="500" step="0.5">
                  </div>
                  <div class="container-buttons">
                    <input type="submit" name="calNomina" value="Calcular y guardar">
                  </div>
          </form>
          <?php
      }
  }
  else{
    include('vistas/vistNomina.php');
  }
  ?>
  <script src="js/soloNumerosLetras.js"></script>
</div>